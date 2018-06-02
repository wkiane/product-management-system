<?php 	
	require_once 'Crud.php';
	class Produto extends Crud
	{
		protected $table = 'produtos';
		private $nome;
		private $preco;
		private $descricao;
		private $categoria_id;

		// funcoes ligadas ao bd

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function setPreco($preco) {
			$this->preco = $preco;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}

		public function setCategoria($categoria_id) {
			$this->categoria_id = $categoria_id;
		}

		public function insert() {
			$sql = "INSERT INTO $this->table (nome, preco, descricao, categoria_id) VALUES (:nome, :preco, :descricao, :categoria_id)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':preco', $this->preco);
			$stmt->bindParam(':descricao', $this->descricao);
			$stmt->bindParam(':categoria_id', $this->categoria_id);
			return $stmt->execute();
		}

		public function update($id) {
			$sql = "UPDATE $this->table SET nome = :nome, preco = :preco, descricao = :descricao, categoria_id = :categoria_id WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':preco', $this->preco);
			$stmt->bindParam(':descricao', $this->descricao);
			$stmt->bindParam(':categoria_id', $this->categoria_id);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		}

		 public function findAll() {
           	$sql = "SELECT p.*, c.nome as categoria_nome FROM $this->table as p join categorias as c on c.id=p.categoria_id ORDER BY p.id ASC";
          	$stmt = DB::prepare($sql);
            $stmt->execute();
          	return $stmt->fetchAll();
        }
		
		// funcoes ligadas a interface
		public function editarProduto($nome, $preco, $descricao, $categoria_id, $id) {
			$this->setNome($nome);
		    $this->setPreco($preco);
		    $this->setDescricao($descricao);
		    $this->setCategoria($categoria_id);
		    $this->update($id);
		}

		public function addProduto($nome, $preco, $descricao, $categoria_id) {
			$this->setNome($nome);
	        $this->setPreco($preco);
	        $this->setDescricao($descricao);
	        $this->setCategoria($categoria_id);
	        if($this->insert()) {
	            header("Location: index.php?added=true");
	        };
		}
	};