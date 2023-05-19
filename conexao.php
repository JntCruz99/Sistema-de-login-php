<?php
define('HOST', 'ns840.hostgator.com.br');
define('USUARIO', 'jntcru25_jntcruz');
define('SENHA', '@Fpb2021');
define('DB', 'jntcru25_Sistema_escolar');

$conn = new mysqli(HOST, USUARIO, SENHA, DB);

if ($conn->connect_error) {
    die('Não foi possível conectar ao banco de dados: ' . $conn->connect_error);
}
?>