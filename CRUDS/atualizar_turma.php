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
		header("Location: ../turma.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors

		
		$nomeError = null;
		$nascimentoError = null;
		$cpfError = null;
		$TELEFONEError = null;
		$ENDERECOError = null;


		// keep track post values

		$instrutor = $_POST['instrutor'];
		$aluno = $_POST['aluno'];
		$situacao = $_POST['situacao'];

	

		// validate input
		$valid = true;
			
		if (empty($instrutor)) {
			$nomeError = 'Por favor digite um Instrutor';
			$valid = false;
		}
			if (empty($aluno)) {
			$nascimentoError = 'Por favor digite um Aluno';
			$valid = false;
		}
			if (empty($situacao)) {
			$cpfError = 'Por favor digite uma Situaão';
			$valid = false;
		}

		// update data
		if ($valid) {
			try{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE turma set instrutor_cod_instrutor = ?, aluno_cod_aluno = ?,situacao = ? WHERE cod_turma = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($instrutor,$aluno,$situacao,$id));
			echo $sql;
			Database::disconnect();
			header("Location: ../turma.php");
			}catch(PDOException $e)
        {
          die($e->getMessage());
		  echo $sql;
        }
		
		}
	} else{
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT turma.*, instrutor.nome as nomeInstrutor, aluno.nome as nomeAluno
FROM turma
inner join instrutor on instrutor.cod_instrutor = turma.instrutor_cod_instrutor
								inner join aluno on aluno.cod_aluno = turma.aluno_cod_aluno
								where turma.cod_turma = ?
						ORDER BY cod_turma ASC";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		
		$cod_instrutor = $data['instrutor_cod_instrutor'];
		$cod_aluno = $data['aluno_cod_aluno'];
		$instrutor = $data['nomeInstrutor'];
		$aluno =$data['nomeAluno'];
		Database::disconnect();
		}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<?php	//require '../conexao/database.php'; ?>
</head>

<body>
<center><h1>Atualizar Turma</h1></center>
<div class="form_cadastrar_turma">

	<!--label é #alinhar e input é #form_usuario-->
	<form id="" action ="atualizar_turma.php?id=<?php echo $id;?>" method="post" >

		<div class="control-group?>">
			<label class="control-label">Instrutor</label>
			<div class="controls">
				<select name = "instrutor"  required="required" class = "select bradius" id="nome">
					<option value="<?php echo $cod_instrutor;?>" selected style='display:none;'><?php echo $instrutor;?></option>
					<?php
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$resultado = "SELECT * FROM instrutor where cod_instrutor <> '$cod_instrutor'";
					Database::disconnect();

					if(count($resultado)){
						foreach ($pdo->query($resultado) as $res) {
							?>
							<option  value="<?php echo $res['cod_instrutor'];?>" ><?php echo $res['nome'];?></option>
							<?php
						}
					}
					?>
				</select>
				<br><br>

			</div>
			<div class="control-group?>">
				<label class="control-label">Aluno</label>
				<div class="controls">
					<select name = "aluno"  required="required" class = "select bradius" >
						<option value="<?php echo $cod_aluno;?>" selected style='display:none;'><?php echo $aluno;?></option>
						<?php
						$pdo = Database::connect();
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$resultado = "SELECT * FROM aluno where cod_aluno <> '$cod_aluno'";
						Database::disconnect();

						if(count($resultado)){
							foreach ($pdo->query($resultado) as $res) {
								?>
								<option  value="<?php echo $res['cod_aluno'];?>" ><?php echo $res['nome'];?></option>
								<?php
							}
						}
						?>
					</select>
					<br><br>

				</div>
				<label id="alinhar">Status:</label><br>
				<select name="situacao">
					<option value="concluido">Concluído</option>
					<option value="em_andamento">Em andamento</option>
					<option value="aberto">Aberto</option>
				</select>
				<br>
				<br>
				<center>
					<input type="submit" id="botao" name="cadastrar" value="Atualizar"/>
					<input type="button" id="botao" onClick="history.go(-1)" name="voltar" value="Voltar"/>
				</center>

	</form>

</div>
</body>
</html>
