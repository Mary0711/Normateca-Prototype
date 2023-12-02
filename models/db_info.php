<?php $titulo = "";


$servername = 'localhost';
$dbname = 'normateca';
$username = 'root';
$password = '';

$dbc = new mysqli($servername, $username, $password, $dbname);
if ($dbc->connect_error) {
    die("<p>La conexion al servidor fallo. Error: " . $dbc->connect_error . " </p>");
}
$dbc->query("SET NAMES 'utf8'");
