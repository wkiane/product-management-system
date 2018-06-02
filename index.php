<?php 
	session_start();
	require_once 'config.php';
	function __autoload($class_name) {
    	require_once 'classes/' . $class_name . '.php';
    }
    $db = new DB();
    
	$login = new Login();
	$login->checkLogin();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Loja</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
 	<?php require_once 'templates/nav.php'; ?>
 	<?php
 	$produto = new Produto();
	if(isset($_POST['editar_produto']) && !empty($_POST['categoria_id'])) :
			$br = '<br>';
		    $id = $_POST['id'];
		    $nome = $_POST['nome'];
		    $preco = $_POST['preco'];
		    $descricao = $_POST['descricao'];
		    $categoria_id = $_POST['categoria_id'];
		    array_key_exists('gender', $_POST);
		    $produto->editarProduto($nome, $preco, $descricao, $categoria_id, $id);
	endif;
	?>	
 	<div class="container">
 		<?php if (!isset($_POST['editar_link'])): ?>
 			<div class="form-adcionar" action="index.php">
	 			<br>
	 			<?php
	 				$produto = new Produto();
	 				$categoria = new Categoria();
	 				if(isset($_POST['adicionar']) && !empty($_POST['categoria_id'])) {
	            		$nome = $_POST['nome'];
	            		$preco = $_POST['preco'];
	            		$descricao = $_POST['descricao'];
	            		$categoria_id = $_POST['categoria_id'];
	            		$produto->addProduto($nome, $preco, $descricao, $categoria_id);
	 				}
	 			?>
	 			<h1 class="font-weight-light">Adicionar Produto</h1>
	 			<form method="POST" class="form">
	 				Nome: <input class="form-control my-1" type="text" name="nome">
	 				Preco: <input class="form-control my-1" type="number" name="preco">
	 				Descrição: <textarea class="form-control my-1" name="descricao"></textarea>
	 				<?php foreach($categoria->findAll() as $categorias => $categoria) : ?>
						<input type="radio" name="categoria_id" value="<?=$categoria->id?>">
						<?=$categoria->nome;?><br>
					<?php endforeach; ?>
	 				<input type="submit" name="adicionar" value="Adicionar" class="btn btn-info my-3 btn-lg">
	 			</form>
 			</div>
 		<?php endif ?>

 		<?php
 			if(isset($_GET['added']) && $_GET['added'] == 'true') {
				echo '<p class="alert alert-success">Produto adicionado!</p>';
			}

			if(isset($_GET['removido']) && $_GET['removido'] == 'true') {
				echo '<p class="alert alert-success">Produto removido!</p>';
			}
		?>

 		<div class="listar-prdutos">
 			<?php
        		if(isset($_POST['apagar'])) :
        			$id = (int)$_POST['id'];
        			$produto->delete($id);
        			header("Location: index.php?removido=true");
        			die();
        		endif;
    		?>

    		<?php
    			$produto = new Produto();
    			$categoria = new Categoria();
	        	if(isset($_POST['editar_link'])) :
	            $id = (int)$_POST['id'];
            	$result = $produto->find($id);
    		?>
    			<br>
	    		<h1 class="font-weight-light">Editar</h1>
	 			<form method="POST" class="form">
	 				Nome: <input class="form-control my-1" type="text" name="nome" value="<?= $result->nome; ?>">
	 				Preco: <input class="form-control my-1" type="number" name="preco" value="<?= $result->preco; ?>">
	 				Descrição: <textarea class="form-control my-1" name="descricao"><?= $result->descricao; ?></textarea>
	 				<input type="hidden" name="id" value="<?= $result->id; ?>">
	 				<?php foreach($categoria->findAll() as $categorias => $categoria) : ?>
						<input type="radio" name="categoria_id" value="<?=$categoria->id?>">
						<?=$categoria->nome;?><br>
					<?php endforeach; ?>
	 				<input type="submit" name="editar_produto" value="Editar" class="my-3 btn btn-info btn-lg">
	 			</form>
    		<?php endif; ?>

 			<table class="table">
			  <thead>
			    <tr>
					<th scope="col">ID</th>
			    	<th scope="col">Produto</th>
			    	<th scope="col">Preço</th>
			    	<th scope="col">Descrição</th>
			    	<th scope="col">Categoria</th>
			    	<th scope="col">Editar</th>
			    	<th scope="col">Deletar</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php foreach ($produto->findAll() as $key => $value): ?>
			    	<tr>
			    		<td><?= $value->id; ?></td>
			    		<td><?= $value->nome; ?></td>
			    		<td>R$ <?= $value->preco; ?></td>
						<td>
							<?php
								if(strlen($value->descricao) >= 45) {
									echo substr($value->descricao, 0, 45). '...';
								} else {
									echo $value->descricao;
								};
							?>
						</td>
						<td><?= $value->categoria_nome; ?></td>
			    		<td class="padding-l">
			    			<form action="" method="POST">
			    				<input type="hidden" name="id" value="<?=$value->id?>">
			    				<button class="btn btn-link text-secondary" name="editar_link"><i class="fas fa-edit"></i></button>
			    			</form>
			    		</td>
			    		<td>
			    			<form action="" method="POST">
								<input type="hidden" name="id" value="<?=$value->id;?>">
								<button class="btn btn-link text-secondary" name="apagar"><i class="far fa-trash-alt"></i></button>
							</form>
			    		</td>
			    	</tr>
			    <?php endforeach ?>
			  </tbody>
			</table>
 		</div>
 	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 	<script src="js/main.js"></script>
 </body>
 </html>