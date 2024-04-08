<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die("Você nâo pode acessar esta página porque não está logado. <p> href=\"index.php\">Entrar</a><p>");
}

?>