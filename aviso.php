<?php 
require_once ("db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();

?>