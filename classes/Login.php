<?php
	require_once 'DB.php'; 
	class Login {

		public function checkLogin() {
			if(empty($_SESSION['id']) == false && ($_SESSION['status']) == 'admin') {
		    	
			}  elseif (empty($_SESSION['id']) == false && ($_SESSION['status']) == 'customer') {
				header("Location: loja.php");
				die();
			} else {
				header("Location: login.php");
				die();
			}
		}

		public function logar($email, $senha) {
			$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':senha', $senha);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$dados = $stmt->fetch();
				$_SESSION['id'] = $dados->id;
				$_SESSION['status'] = $dados->status;
				header("Location: index.php");
				die();
			} else {
				echo 'Email ou senha incorreta';
			}
		}

		public function deslogar() {
			session_destroy();
			header("Location: index.php");
			die();
		}
	};