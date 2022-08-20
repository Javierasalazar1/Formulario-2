<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "reserva";

$con = mysqli_connect($server, $user, $pass, $db);

if (!$con) {
    die("Error en la conexion: " . mysqli_connect_error());
}
