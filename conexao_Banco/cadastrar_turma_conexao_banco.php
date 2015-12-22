<?php

require '../conexao/database.php';



	if ( !empty($_POST)) {


		$instrutor = $_POST['instrutor'];
		$aluno = $_POST['aluno'];
		$situacao = $_POST['situacao'];



		$valid = true;

		// insert data
		if ($valid) {
			try{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO turma (instrutor_cod_instrutor,aluno_cod_aluno,situacao)
	values(?,?,?)";
			$q = $pdo->prepare($sql);

			$q->execute(array($instrutor,$aluno,$situacao));

			echo "<script>
					alert('Cadastro salvo com Sucesso!');
					window.location.href = '../turma.php';
					</script>";

		} catch (PDOException $e) {
			//die($e->getMessage());
			echo "<script>
					alert('ERRO:');
					window.location.href = '../CRUDS/Cadastrar_turma.php';
					</script>";
		}

			Database::disconnect();

		}
	}


?>
