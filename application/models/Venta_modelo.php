<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta_modelo extends CI_Model 
{
    public function crear_venta($usuario, $id_espectaculo, $monto_total, $fecha)
    {
        $data = array
        (
            'usuario_id' => $usuario,
            'espectaculo_id' => $id_espectaculo,
            'monto_total' => $monto_total,
            'fecha_venta' => $fecha
        );

        return $this->db->insert('ventas', $data);
    }

    public function obtener_ventas()
    {
        $query = $this->db->get('ventas'); // Asume que la tabla de ventas se llama 'ventas'

        if ($query->num_rows() > 0) 
        {
            return $query->result_array(); // Devuelve los resultados como un array
        } 
        else 
        {
            return false; // Retorna false si no hay datos disponibles
        }
    }

}

?>;