<?php

if (!isset($_SESSION)) session_start();

// Verifica se n�o h� a vari�vel da sess�o que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
	// Destr�i a sess�o por seguran�a
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: index.php"); exit;
}

	require '../conexao/database.php';
	$id = 0;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];

		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM veiculo  WHERE cod_veiculo = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: ../veiculo.php");

	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Excluir Veículo</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="Excluir_veiculo.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">Tem certeza em excluir este veiculo?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Sim</button>
						  <a class="btn" href="../veiculo.php">Não</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
