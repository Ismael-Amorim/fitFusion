<?php

if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    die("Você não pode acessar essa página pois não está logado.  <br><a href='index.php' target='_self'><span>Voltar</span></a>");
}