<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Usuario_modelo');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('formularios/formulario_registro');
        $this->load->view('footer');
    }

    public function registrar_usuario()
    {
        if ($this->validar_usuario()) 
		{
            // Si las validaciones son correctas se toma el email y dni
            $email = $this->input->post('nombre_usuario');
            $dni = $this->input->post('dni');

            // se pregunta si son iguales a alguno existente
            if ($this->Usuario_modelo->verificar_usuario_existente($email, $dni))
			{
                $data['error'] = 'El usuario con este email o DNI ya está registrado.';

                $this->load->view('formularios/formulario_registro', $data);
            }
			else
			{
                // Si no son iguales, se guarda el resto de la info, se incluye el previo email y dni
                $data = array
                (
                    'nombre' => $this->input->post('nombre'),
                    'apellido' => $this->input->post('apellido'),
                    'dni' => $dni,
                    'telefono' => $this->input->post('telefono'),
                    'nombre_usuario' => $email,
                    'palabra_clave' => $this->input->post('palabra_clave'),
                    'rol_id' => 1,
                );

                // Registro exitoso, redirigir a la página de bienvenida
                $this->Usuario_modelo->registrar_usuario($data);

                $this->load->view('header');
                $this->load->view('post_registro');
                $this->load->view('footer');
            } 
        }
        else
        {
            printf('faltan datos a completar');
            $this->load->view('formularios/formulario_registro');
        }
    }
    
    public function validar_usuario()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('dni', 'DNI', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
        $this->form_validation->set_rules('nombre_usuario','Email','required');
        $this->form_validation->set_rules('palabra_clave', 'Password', 'required');

        return $this->form_validation->run();
    }
}

?>