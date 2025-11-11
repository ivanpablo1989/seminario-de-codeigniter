<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_compras extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();

        $this->load->model('Usuario_comprador'); // Cargar el modelo
        $this->load->library('session'); // Cargar la sesión
        $this->load->model('Reserva_modelo');
        $this->load->model('Usuario_modelo');
    }

    // Mostrar las reservas del usuario logueado
    public function mis_reservas() 
    {
        $id_usuario = $this->session->userdata('usuario_id');
        $data['reservas'] = $this->Reserva_modelo->obtener_reservas_usuario($id_usuario);
    
        $this->load->view('vista_reservas', $data);
    }
}

?>
