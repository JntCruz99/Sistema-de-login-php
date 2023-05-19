<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'Sistema_escolar');

$conn = new mysqli(HOST, USUARIO, SENHA, DB);

if ($conn->connect_error) {
    die('Não foi possível conectar ao banco de dados: ' . $conn->connect_error);
}
?>
