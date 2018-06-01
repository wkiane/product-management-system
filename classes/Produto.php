<?php 	
	require_once 'Crud.php';
	class Produto extends Crud
	{
		protected $table = 'produtos';
		private $nome;
		private $preco;

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function setPreco($preco) {
			$this->preco = $preco;
		}

		public function insert() {
			$sql = "INSERT INTO $this->table (nome, preco) VALUES (:nome, :preco)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':preco', $this->preco);
			return $stmt->execute();
		}

		public function update($id) {
			$sql = "UPDATE $this->table SET nome = :nome, preco = :preco WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':preco', $this->preco);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		}
	};