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
		header("Location: ../instrutor.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors

		
		$nomeError = null;
		$nascimentoError = null;
		$cpfError = null;
		$TELEFONEError = null;
		$ENDERECOError = null;


		// keep track post values

		$nome = $_POST['nome'];
		$nascimento = $_POST['nascimento'];
		$cpf = $_POST['cpf'];
		$TELEFONE = $_POST['telefone'];
		$ENDERECO = $_POST['endereco'];
	
	

		// validate input
		$valid = true;
			
		if (empty($nome)) {
			$nomeError = 'Por favor digite um login';
			$valid = false;
		}
			if (empty($nascimento)) {
			$nascimentoError = 'Por favor digite um login';
			$valid = false;
		}
			if (empty($cpf)) {
			$cpfError = 'Por favor digite um login';
			$valid = false;
		}
			if (empty($TELEFONE)) {
			$TELEFONEError = 'Por favor digite um login';
			$valid = false;
		}
			if (empty($ENDERECO)) {
			$ENDERECOError = 'Por favor digite um login';
			$valid = false;
		}

		// update data
		if ($valid) {
			try{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE instrutor set nome = ?, nascimento = ?,cpf = ?, telefone = ?, endereco = ? WHERE cod_instrutor = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($nome,$nascimento,$cpf,$TELEFONE,$ENDERECO,$id));
			echo $sql;
			Database::disconnect();
			header("Location: ../instrutor.php");
			}catch(PDOException $e)
        {
          die($e->getMessage());
		  echo $sql;
        }
		
		}
	} else{
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM instrutor where cod_instrutor = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		
		$nome = $data['nome'];
		$nascimento = $data['NASCIMENTO'];
		$cpf = $data['cpf'];
		$TELEFONE =$data['TELEFONE'];
		$ENDERECO = $data['endereco'];
		Database::disconnect();
		}
?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
   
</head>

<body>
    <div class="container">

    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Atualizar Aluno</h3> <br>
		    		</div>

	    			<form class="form-horizontal" action="Atualizar_instrutor.php?id=<?php echo $id?>" method="post">

						<div class="control-group <?php echo !empty($nomeError)?'error':'';?>">
					    <label class="control-label">Nome:</label>
					    <div class="controls">
					      	<input name="nome" type="text"  placeholder="nome" value="<?php echo !empty($nome)?$nome:'';?>">
					      	<?php if (!empty($nomeError)): ?>
					      		<span class="help-inline"><?php echo $nomeError;?></span>
					      	<?php endif; ?>
					    </div>
						
						<div class="control-group <?php echo !empty($nascimentoError)?'error':'';?>">
					    <label class="control-label">Data de Nascimento:</label>
					    <div class="controls">
					      	<input name="nascimento" type="date"  placeholder="" value="<?php echo !empty($nascimento)?$nascimento:'';?>">
					      	<?php if (!empty($nascimentoError)): ?>
					      		<span class="help-inline"><?php echo $nascimentoError;?></span>
					      	<?php endif; ?>
					    </div>
						
						<div class="control-group <?php echo !empty($cpfError)?'error':'';?>">
					    <label class="control-label">CPF:</label>
					    <div class="controls">
					      	<input name="cpf" type="number"  placeholder="" value="<?php echo !empty($cpf)?$cpf:'';?>">
					      	<?php if (!empty($cpfError)): ?>
					      		<span class="help-inline"><?php echo $cpfError;?></span>
					      	<?php endif; ?>
					    </div>
						
						<div class="control-group <?php echo !empty($telefoneError)?'error':'';?>">
					    <label class="control-label">Telefone:</label>
					    <div class="controls">
					      	<input name="telefone" type="number"  placeholder="" value="<?php echo !empty($TELEFONE)?$TELEFONE:'';?>">
					      	<?php if (!empty($telefoneError)): ?>
					      		<span class="help-inline"><?php echo $telefoneError;?></span>
					      	<?php endif; ?>
					    </div>

						<div class="control-group <?php echo !empty($ENDERECOError)?'error':'';?>">
					    <label class="control-label">Endereço:</label>
					    <div class="controls">
					      	<input name="endereco" type="text"  placeholder="" value="<?php echo !empty($ENDERECO)?$ENDERECO:'';?>">
					      	<?php if (!empty($ENDERECOError)): ?>
					      		<span class="help-inline"><?php echo $ENDERECOError;?></span>
					      	<?php endif; ?>
					    </div>		
					

					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Atualizar</button>
						  <a class="btn" href="../instrutor.php">Voltar</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
