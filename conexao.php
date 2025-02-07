<?php
$usuario = 'root';
$senha = '';
$database = 'usuario';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);
if($mysqli->error){
    die('Deu erro no programa');
}