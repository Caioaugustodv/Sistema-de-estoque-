<?php
session_start();
require 'config.php';
require 'usuario.class.php';
require 'documentos.class.php';


if (!isset($_SESSION['logado'])) {

	header("Location: login.php");

}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);
$documentos = new Documentos($pdo);
$lista = $documentos->getDocumentos();

?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
</head>

<body>
	<div class="container">
		<div class="principal">
		<div class="row">
			<div class="col">

				<h1 class="text-center">SISTEMA DE PERMISSÃO</h1>
				
			</div>

		</div>
		<div class="row">
			<div class="col">
				
					



					<?php if ($usuarios->temPermissao('ADD')): ?>

						<a href="" class="btn btn-success">Adicionar Documento </a> <br><br>
					<?php endif;?>

					<?php if ($usuarios->temPermissao('SECRET')): ?>

						<a href="secreto.php" class="btn btn-success">Página secreta</a>

					<?php endif;?>





				</div>

		
			

		</div>
		<br>

		<div class="row">
			<div class="col">

				<table border="2" width="100%" class="table table-bordered">
					<tr class="thead-dark">
						<th>NOME DO ARQUIVO</th>
						<th>AÇÕES</th>
					</tr>
					<?php foreach($lista as $item): ?>
						<tr>
							<td> <?php echo utf8_encode( $item['titulo']); ?></td>
							<td>

								<?php if ($usuarios->temPermissao('EDIT')): ?>

									<a href="" class="btn btn-success">Editar</a>


								<?php endif;?>	

								<?php if ($usuarios->temPermissao('DEL')): ?>

									<a href="" class="btn btn-danger" >Excluir</a>

								<?php endif;?>

							</td>


						</tr>
					<?php endforeach; ?>



				</table>



			</div>
			
		</div>
	</div>

	</div>


</div>
</body>

<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</html>