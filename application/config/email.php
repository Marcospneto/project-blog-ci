<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'sandbox.smtp.mailtrap.io';
$config['smtp_port'] = '2525';
$config['smtp_user'] = '9cfa9a410e564f';
$config['smtp_pass'] = '50bf845fc9dc81';
$config['smtp_crypto'] = 'tls'; // Ou 'ssl', dependendo da configuração do seu servidor
$config['mailtype'] = 'html';
$config['crlf'] = "\r\n";
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
