
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_modelo extends CI_Model 
{
    public function obtener_cliente($usuario_id)
    {
        $this->db->where('usuario_id', $usuario_id);
        $query = $this->db->get('clientes');
        return $query->row_array();
    }

    public function crear_cliente($usuario_id)
    {
        $data = array('usuario_id' => $usuario_id);
        return $this->db->insert('clientes', $data);
    }

    public function obtener_clientes_por_usuario()
    {
        $this->db->select('clientes.id_cliente, clientes.usuario_id, usuarios.nombre, usuarios.dni, usuarios.telefono');
        $this->db->from('clientes');
        $this->db->join('usuarios', 'clientes.usuario_id = usuarios.id_usuario');
        $this->db->where('clientes.usuario_id IS NOT NULL');
        $query = $this->db->get();
        return $query->result_array();
    }
}
