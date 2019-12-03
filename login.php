<?php
session_start();
require 'config.php';
require 'usuario.class.php';

if (!empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);
	$usuarios = new Usuarios($pdo);

	if ($usuarios->fazerLogin($email,$senha)) {
		header("Location: index.php");
	}else {
		echo "Usuários ou Senha estão errados";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body style=" background-image: url(assets/imagens/caio.jpg);
background-size:100%;
background-repeat: no-repeat;background-position: center;">

<div class="container ">
	<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5 mx-auto">
				<div class="card-body ">
					<div class="class d-flex justify-content-center">
						<img src="assets/imagens/responsive.png" style="margin-bottom: 15px; width: 100px;">
					</div>

					<form class="form-signin" method="POST" action="">

						<div class="form-label-group">
							<input type="text"  class="form-control" placeholder="Usuário" required autofocus name="email">

						</div><br>

						<div class="form-label-group">
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="senha">

						</div>

						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" id="customCheck1"><br>
							<label class="custom-control-label" for="customCheck1">Lembrar password</label>
						</div><br>

						<button class="btn btn-lg btn-info btn-block text-uppercase" type="submit">ENTRAR</button>
						<hr class="my-4">

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>




<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>