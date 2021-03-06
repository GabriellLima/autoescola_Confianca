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

		$loginError = null;


		// keep track post values

		$login = $_POST['login'];
	

		// validate input
		$valid = true;

		if (empty($login)) {
			$loginError = 'Por favor digite um login';
			$valid = false;
		}



		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE usuario set login = ? WHERE cod_usuario = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($login,$id));
			Database::disconnect();
			header("Location: ../Usuario.php");
		}
	} else{
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM usuario where cod_usuario = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$login = $data['login'];
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
		    			<h3>Atualizar Usuário</h3> <br>
		    		</div>

	    			<form class="form-horizontal" action="Atualizar_Usuario.php?id=<?php echo $id?>" method="post">

						<div class="control-group <?php echo !empty($loginError)?'error':'';?>">
					    <label class="control-label">Login</label>
					    <div class="controls">
					      	<input name="login" type="text"  placeholder="Login" value="<?php echo !empty($login)?$login:'';?>">
					      	<?php if (!empty($loginError)): ?>
					      		<span class="help-inline"><?php echo $loginError;?></span>
					      	<?php endif; ?>
					    </div>

					

					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Atualizar</button>
						  <a class="btn" href="../Usuario.php">Voltar</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
