<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ismael";
$port = 3306;

$mysqli = new mysqli($host, $user, $pass, $dbname, $port);

if($mysqli->error){
    die("Falha ao conectar ao banco de dados" . $mysqli->error);
}