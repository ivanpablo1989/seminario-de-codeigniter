<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.example.com', // Cambia al host SMTP de tu proveedor
    'smtp_port' => 587,               // Puerto SMTP (587 o 465 generalmente)
    'smtp_user' => 'ivaninfonet@gmail.com', // Tu correo
    'smtp_pass' => '1234',        // Tu contraseña
    'mailtype' => 'html',
    'charset' => 'utf-8',
    'wordwrap' => true
);
$this->load->library('email', $config);

?>