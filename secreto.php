
<?php
session_start();
require 'config.php';
require 'usuario.class.php';

// verifica se o usuario ta logado na SESSION , se não ele o retorna para o login 
if (!isset($_SESSION['logado'])) {

	header("Location: login.php");
	exit;

}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

// verifica se o usuario logado tem permissao SECRET , caso nao tenha ele e redirecioando para o index.php

if ($usuarios->temPermissao("SECRET") == false) {
	header("Location: index.php");
	exit;
}

?>

<h1>SECRETO</h1>