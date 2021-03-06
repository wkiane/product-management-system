<?php 
	session_start();
	require_once 'config.php';
	function __autoload($class_name) {
    	require_once 'classes/' . $class_name . '.php';
    }	
	if(isset($_POST['acao'])) {
		$email = $_POST['email'];
		$senha = md5($_POST['senha']);

		$login = new Login();
		$login->logar($email, $senha);
	}
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Loja - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="login">
    <div class="container">
    	<br>
		<h2 class="font-weight-light my-2">Entrar em sua conta</h2>
	    <form action="" method="POST">
			<div class="form-group">
	        	<input class="form-control" type="text" name="email" placeholder="Email">
			</div>
			<div class="form-group">
	        	<input class="form-control" type="password" name="senha" placeholder="Senha">
	        </div>
	        <a class="btn btn-outline-info btn-lg float-left" href="register.php">Criar sua conta</a>
	        <input class="btn btn-info btn-lg float-right" type="submit" value="Entrar" name="acao">
		</form>
    </div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 	<script src="js/main.js"></script>
    <script src="js/main.js"></script>
</body>
</html>