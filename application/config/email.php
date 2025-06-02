<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_port'] = 587;
$config['smtp_user'] = ''; // dirección de correo
$config['smtp_pass'] = ''; // contraseña de correo
$config['mailtype'] = 'html'; 
$config['charset'] = 'utf8mb4';
$config['newline'] = "\r\n"; 
$config['smtp_crypto'] = 'tls'; 