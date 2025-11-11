<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller 
{
    public function index() 
    {
        // Cargar la vista 'usuario'
        $this->load->view('vista_comienzo_2');
        $this->load->view('vista_usuario');
        $this->load->view('footer');
    }
}
?>