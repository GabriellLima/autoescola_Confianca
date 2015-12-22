<?php

if (!isset($_SESSION)) session_start();

// Verifica se n�o h� a vari�vel da sess�o que identifica o usu�rio
if (!isset($_SESSION['UsuarioID'])) {
	// Destr�i a sess�o por seguran�a
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: ../index.php"); exit;
}
	require '../conexao/database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( null==$id ) {
		header("Location: ../Usuario.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors

		$placaError = null;


		// keep track post values

		$placa = $_POST['placa'];

		// validate input
		$valid = true;

		if (empty($placa)) {
			$loginError = 'Por favor digite uma placa';
			$valid = false;
		}



		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE veiculo set placa = ? WHERE cod_veiculo = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($placa,$id));
			Database::disconnect();
			header("Location: ../veiculo.php");
		}
	} else{
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM veiculo where cod_veiculo = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$placa = $data['placa'];
		Database::disconnect();
		}
?>


<!DOCTYPE html>
<html>
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
		    			<h3>Atualizar Veículo</h3> <br>
		    		</div>

	    			<form class="form-horizontal" action="atualizar_veiculo.php?id=<?php echo $id?>" method="post">

						<div class="control-group <?php echo !empty($placaError)?'error':'';?>">
					    <label class="control-label">Placa:</label>
					    <div class="controls">
					      	<input name="placa" type="text"  placeholder="" value="<?php echo !empty($placa)?$placa:'';?>">
					      	<?php if (!empty($placaError)): ?>
					      		<span class="help-inline"><?php echo $placaError;?></span>
					      	<?php endif; ?>
					    </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Atualizar</button>
						  <a class="btn" href="../veiculo.php">Voltar</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
