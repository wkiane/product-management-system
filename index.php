<?php 
	session_start();
	require_once 'config.php';
	function __autoload($class_name) {
    	require_once 'classes/' . $class_name . '.php';
    }
    
	$login = new Login();
	$login->checkLogin();
    $db = new DB();
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
	if(isset($_GET['editar_produto'])) :
			$br = '<br>';
		    $id = $_GET['id'];
		    $nome = $_GET['nome'];
		    $preco = $_GET['preco'];

		    $produto->setNome($nome);
		    $produto->setPreco($preco);
		    $produto->update($id);
	endif;
	?>	
 	<div class="container">
 		<?php if (!isset($_GET['acao']) || $_GET['acao'] !== 'editar'): ?>
 			<div class="form-adcionar" method="GET" action="index.php">
	 			<br>
	 			<?php
	 				$produto = new Produto();
	 				if(isset($_GET['adicionar'])) {
	 					// $id = $_POST['id'];
	            		$nome = $_GET['nome'];
	            		$preco = $_GET['preco'];

	            		$produto->setNome($nome);
	            		$produto->setPreco($preco);
	            		if($produto->insert()) {
	            			echo '<script>
	            					alert("Seu produto foi adcionado com sucesso!");
	            				</script>';
	            		};
	 				}
	 			?>
	 			<h1 class="font-weight-light">Adicionar Produto</h1>
	 			<form method="" class="form">
	 				Nome: <input class="form-control my-1" type="text" name="nome">
	 				Preco: <input class="form-control my-1" type="number" name="preco">
	 				<input type="submit" name="adicionar" value="Adicionar" class="btn btn-info my-3 btn-lg">
	 			</form>
 			</div>
 		<?php endif ?>

 		<div class="listar-prdutos">
 			<?php
        		if(isset($_GET['acao']) && $_GET['acao'] == 'apagar') :
            	$id = (int)$_GET['id'];
            	$produto->delete($id);
        		endif;
    		?>

    		<?php
    			$produto = new Produto();
	        	if(isset($_GET['acao']) && $_GET['acao'] == 'editar') :
	            $id = (int)$_GET['id'];
            	$result = $produto->find($id);
    		?>
    			<br>
	    		<h1>Editar</h1>
	 			<form method="GET" class="form">
	 				Nome: <input class="form-control my-1" type="text" name="nome" value="<?= $result->nome; ?>">
	 				Preco: <input class="form-control my-1" type="number" name="preco" value="<?= $result->preco; ?>">
	 				<input type="hidden" name="id" value="<?= $result->id; ?>">
	 				<input type="submit" name="editar_produto" value="Editar" class="my-3 btn btn-info btn-lg">
	 			</form>
    		<?php endif; ?>

 			<table class="table">
			  <thead>
			    <tr>
					<th scope="col">ID</th>
			    	<th scope="col">Produto</th>
			    	<th scope="col">Preço</th>
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
			    		<td class="padding-l"><a href="<?= 'index.php?acao=editar&id='.$value->id; ?>" class="link-color"><i class="fas fa-edit"></i></a></td>
			    		<td class="padding-l"><a  href="<?= 'index.php?acao=apagar&id='.$value->id; ?>" class="link-color"><i class="far fa-trash-alt"></i></a></td>
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