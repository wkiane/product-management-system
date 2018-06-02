<?php
	require_once 'DB.php'; 
	class Register {

		public function registrar($nome, $email, $senha) {
			$sql = "SELECT * FROM usuarios WHERE email = :email";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				echo 'Esse e-mail já está sendo usado';
			} else {
				$sql = 'INSERT INTO usuarios (nome_completo, email, senha) VALUES (:nome, :email, :senha)';
			    $sql = DB::prepare($sql);
			    $sql->bindParam(':nome', $nome);
			    $sql->bindParam(':email', $email);
			    $sql->bindParam(':senha', $senha);
			    header("Location: login.php");
			    return $sql->execute();
			};
		}
	}