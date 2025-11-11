
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_compra extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->database(); // Cargar la base de datos
    }

    // Obtener reservas realizadas por el usuario logueado
    public function obtener_reservas_usuario($id_usuario) 
    {
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->where('usuario_id', $id_usuario);
        $this->db->join('espectaculos', 'reservas.espectaculo_id = espectaculos.id_espectaculo');

        $query = $this->db->get();

        if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        } 
        else 
        {
            return [];
        }
    }
}