<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->library('session');
        $this->load->helper('url_helper');
    }
    
    public function index() 
    {
        $this->load->view('vista_comienzo_2');
        $this->load->view('formularios/formulario_login');
        $this->load->view('footer');
    }

    public function autenticar()
    {
        $nombre_usuario = $this->input->post('nombre_usuario');
        $palabra_clave = $this->input->post('palabra_clave');

        // Aquí validas las credenciales con tu modelo de usuario
        $usuario = $this->Usuario_modelo->obtener_usuario($nombre_usuario, $palabra_clave);
        $id_usuario = $this->Usuario_modelo->obtener_id_usuario($nombre_usuario);

        // Guardar el id_usuario en la sesión
        $this->session->set_userdata('id_usuario', $id_usuario);

        if ($usuario) 
        {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('rol_id', $usuario->rol_id);
    
            if ($usuario->rol_id === '2') 
            {
                $this->load->view('vista_comienzo_2');
                $this->load->view('vista_administrador'); // Redirigir a la vista del administrador
                 $this->load->view('footer');
            } 
            else 
            {
                $this->load->view('vista_comienzo_2');
                $this->load->view('vista_usuario');// Redirigir a la vista del usuario
                $this->load->view('footer');
            }
        }    
        else 
        {
            $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
            printf("error usuario o contraseña incorrecta");
            $this->load->view('formularios/formulario_login'); // redirigir a formulario login
        }
    }
    
    public function logout() 
    {
        // Destruye la sesión activa
        $this->session->sess_destroy();

        // Redirige al inicio de sesión
        $this->load->view('header');
        $this->load->view('cerrar_sesion');
        $this->load->view('footer');
    }
}
    
?>
