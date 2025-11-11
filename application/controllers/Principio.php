<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principio extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->model('Usuario_modelo');
		$this->load->model('Espectaculo_modelo');
	}

	public function index()
	{
		$this->load->view('vista_comienzo');

		$data['espectaculos'] = $this->Espectaculo_modelo->obtener_espectaculos();

        $this->load->view('espectaculos/index_sin_loguear', $data);
		$this->load->view('footer');
	}
}

?>