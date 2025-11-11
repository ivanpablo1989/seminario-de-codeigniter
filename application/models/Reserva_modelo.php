<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_modelo extends CI_Model 
{
    public function __construct() 
    {
        $this->load->database();
        $this->load->library('session'); // Cargar la librería de sesión
    }

    public function crear_reserva($id_espectaculo,$cantidad_entradas,$fecha_reserva,$usuario,$monto_total) 
    {
        // Consultar las entradas disponibles
        $this->db->select('disponibles');
        $this->db->where('id_espectaculo', $id_espectaculo);

        $espectaculo = $this->db->get('espectaculos')->row();
    
        // Verificar si hay suficientes entradas disponibles
        if ($espectaculo && $espectaculo->disponibles >= $cantidad_entradas)
        {
            // Insertar la reserva en la tabla "reservas"
            $reserva_data = array
            (
                'espectaculo_id' => $id_espectaculo,
                'cantidad' => $cantidad_entradas,
                'fecha_reserva' => $fecha_reserva, // Guardar la fecha de reserva
                'usuario_id' => $usuario,
                'monto_total' => $monto_total
            );
                
            $this->db->insert('reservas', $reserva_data);
    
            // Restar las entradas disponibles
            $this->db->set('disponibles', 'disponibles -' . (int)$cantidad_entradas, FALSE);
            $this->db->where('id_espectaculo', $id_espectaculo);

            return $this->db->update('espectaculos');
        }
    
        return FALSE; // No hay suficientes entradas
    }

    public function obtener_espectaculo_por_id($id_espectaculo) 
    {
        // Obtener un espectáculo por su ID

        $this->db->where('id_espectaculo', $id_espectaculo);
        return $this->db->get('espectaculos')->row_array();
    }

    public function obtener_reservas($id_usuario) 
    {
        $this->db->select('*'); // Selecciona todas las columnas relevantes.
        $this->db->from('reservas'); // Cambia 'reservas' por el nombre de tu tabla.
        $this->db->where('usuario_id', $id_usuario); // Filtra por el ID del usuario.
        $query = $this->db->get();

        return $query->result_array(); // Devuelve las reservas como un array.
    }
}    

?>
