<?php 
$user = $_SESSION["user"];
$perfil = isset($_GET['perfil']) ? $_GET['perfil'] : "$user" ;
$meusamigos = $user."_amigos";
$ppost = $perfil."_postagens";
?>