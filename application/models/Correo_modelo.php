<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Correo_modelo extends CI_Model
{
    public function enviar_cancelacion($email, $nombre, $espectaculo)
    {
        $this->load->library('email');

        $this->email->from('no-reply@eventosba.com', 'Eventos Buenos Aires');
        $this->email->to($email);
        $this->email->subject('Cancelación de espectáculo');

        $mensaje = "Hola $nombre,\n\nLamentamos informarte que el espectáculo \"$espectaculo\" ha sido cancelado. 
        Si realizaste una compra, te contactaremos para gestionar la devolución del dinero.\n\nGracias por tu comprensión.";

        $this->email->message($mensaje);
        return $this->email->send();
    }
}

?>;
