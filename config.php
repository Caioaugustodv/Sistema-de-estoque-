<?php
try {

	$pdo =  new PDO("mysql:dbname=log_permissao;host=localhost;","root","");
	
} catch (PDOException $e) {

	echo "ERRO".$e->getMessage();
	exit;

	
}


?>