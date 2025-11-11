<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espectaculos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->model('Reserva_modelo');
        $this->load->model('Venta_modelo');
        $this->load->helper('url'); 
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    private function cargar_vista($vista, $data = [])
    {
        $this->load->view('vista_comienzo_2');
        $this->load->view($vista, $data);
        $this->load->view('footer');
    }

    public function index()               
    {
        $this->mostrar_lista('espectaculos/index');
    }

    public function index_administrador()
    { 
        $this->mostrar_lista('espectaculos/administrador'); 
    }

    public function index_sin_loguear()  
    { 
        $this->mostrar_lista('espectaculos/index_sin_loguear'); 
    }

    private function mostrar_lista($vista)
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();
        
        foreach ($espectaculos as &$e) 
        {
            $e->detalles_habilitados = $e->fecha >= date('Y-m-d') && $e->disponibles > 0;
            $e->aviso = $this->generar_aviso($e);
        }

        $this->cargar_vista($vista, compact('espectaculos'));
    }

    private function generar_aviso($e)
    {
        $ahora = new DateTime();
        $evento = new DateTime("{$e->fecha} {$e->hora}");

        if ($evento < $ahora) 
        {    
            return 'Este espectáculo ya ha pasado.';
        }
        
        $horas = $ahora->diff($evento)->days * 24 + $ahora->diff($evento)->h;

        if ($horas <= 48 && $e->disponibles > 0) 
        {
            return '¡Queda poco tiempo!';
        } 
        else 
        {
            return 'Todavía falta tiempo.';
        }
    }

    public function ver_espectaculo($id)               
    { 
        $this->ver_detalle('espectaculos/ver_espectaculo', $id); 
    }

    public function espectaculo_sin_loguear($id)       
    { 
        $this->ver_detalle('espectaculos/espectaculo_sin_loguear', $id); 
    }

    private function ver_detalle($vista, $id)
    {
        $data = 
        [
            'espectaculo' => $this->Reserva_modelo->obtener_espectaculo_por_id($id),
            'mensaje'     => $this->session->flashdata('mensaje')
        ];

        $this->cargar_vista($vista, $data);
    }

    public function crear()
    {
        $this->cargar_vista('formularios/crear_espectaculo');
    }

    public function guardar()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('fecha', 'Fecha', 'required|callback_validar_fecha');
        $this->form_validation->set_rules('hora', 'Hora', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
        $this->form_validation->set_rules('disponibles', 'Disponibles', 'required|integer');

        if ($this->form_validation->run() === FALSE) 
        {
            $this->session->set_flashdata('mensaje', validation_errors());
            redirect('espectaculos/crear');
            return;
        }

        $imagen = $this->subir_imagen();
        
        if ($imagen === false) 
        {   
            return;
        }    

        $data = 
        [
            'nombre'      => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'fecha'       => $this->input->post('fecha'),
            'hora'        => $this->input->post('hora'),
            'precio'      => $this->input->post('precio'),
            'disponibles' => $this->input->post('disponibles'),
            'imagen'      => $imagen
        ];

        if ($this->Espectaculo_modelo->agregar_espectaculo($data)) 
        {
            $msg = 'Espectáculo agregado correctamente.';
        } 
        else 
        {
            $msg = 'Error al agregar el espectáculo.';
        }

        $this->session->set_flashdata('mensaje', $msg);
        redirect('administrador');
    }

    public function validar_fecha($fecha)
    {
        if ($fecha < date('Y-m-d')) 
        {
            $this->form_validation->set_message('validar_fecha', 'La fecha debe ser igual o posterior a hoy.');
            return FALSE;
        }
        else 
        {
            return TRUE;
        }
    }

    public function editar($id)
    {
        $data['espectaculo'] = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if ($data['espectaculo']) 
        {
            $this->cargar_vista('espectaculos/editar_espectaculo', $data);
        }
    }

    public function actualizar()
    {
        $id = $this->input->post('id_espectaculo');
       
        $upload_path = './activos/imagenes/';

        if (!is_dir($upload_path)) 
        {
            mkdir($upload_path, 0755, true);
        }

        if (!is_writable($upload_path)) 
        {
            chmod($upload_path, 0755);
        }

        $imagen = $this->subir_imagen($upload_path, $this->input->post('imagen_actual'));
        
        if ($imagen === false) 
        {
            return;
        }

        $data = 
        [
            'nombre'      => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'fecha'       => $this->input->post('fecha'),
            'hora'        => $this->input->post('hora'),
            'precio'      => $this->input->post('precio'),
            'disponibles' => $this->input->post('disponibles'),
            'direccion'   => $this->input->post('direccion'),
            'imagen'      => $imagen
        ];

        if ($this->Espectaculo_modelo->actualizar_espectaculo($id, $data)) 
        {
            $msg = 'Espectáculo actualizado correctamente.';
        } 
        else 
        {
            $msg = 'Error al actualizar el espectáculo.';
        }

        $this->session->set_flashdata('mensaje', $msg);
        redirect('administrador');
    }

    private function subir_imagen($path = './activos/imagenes/', $imagen_actual = null)
    {
        if (empty($_FILES['imagen']['name'])) 
        {
            return $imagen_actual;
        }

        $config = 
        [
            'upload_path'   => $path,
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'      => 2048,
            'encrypt_name'  => TRUE
        ];
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('imagen')) 
        {
            $error = strip_tags($this->upload->display_errors());
            $this->session->set_flashdata('mensaje', 'Error al subir la imagen: ' . $error);
            redirect(current_url());
            return false;
        }

        $upload_data = $this->upload->data();

        if ($imagen_actual && file_exists($path . $imagen_actual)) 
        {
            unlink($path . $imagen_actual);
        }

        return $upload_data['file_name'];
    }

    public function eliminar($id)
    {
        $reservas = $this->db->select('usuario_id, espectaculo_id')
                            ->from('reservas')
                            ->where('espectaculo_id', $id)
                            ->get()->result_array();

        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        foreach ($reservas as $r) 
        {
            $cliente = $this->db->get_where('clientes', ['id_usuario' => $r['usuario_id']])->row_array();
            
            if ($cliente) 
            {
                $this->Correo_modelo->enviar_cancelacion($cliente['email'], $cliente['nombre'], $espectaculo['nombre']);
            }
        }

        $ok = $this->Espectaculo_modelo->eliminar_espectaculo_completo($id);

        $msg = $ok ? 'Espectáculo y datos asociados eliminados correctamente.' : 'Error al eliminar el espectáculo.';
        
        $this->session->set_flashdata('mensaje', $msg);
       
        redirect('espectaculos/index_administrador');
    }

}

?>