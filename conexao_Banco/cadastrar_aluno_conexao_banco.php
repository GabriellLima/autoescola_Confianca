<?php

require '../conexao/database.php';



	if ( !empty($_POST)) {


		$nome = $_POST['nome'];
		$nascimento = $_POST['nascimento'];
		$cpf = $_POST['cpf'];
		$telefone = $_POST['telefone'];
		$endereco = $_POST['endereco'];
		$turno = $_POST['turno'];
		$categoria = $_POST['categoria'];
		$situacao = $_POST['situacao'];


		$valid = true;

		// insert data
		if ($valid) {
			try{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO aluno (nome,nascimento,cpf,TELEFONE,ENDERECO,TURNO,categoria,SITUACAO)
	values(?,?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);

			$q->execute(array($nome,$nascimento,$cpf,$telefone,$endereco,$turno,$categoria,$situacao));

			echo "<script>
					alert('Cadastro salvo com Sucesso!');
					window.location.href = '../aluno.php';
					</script>";

		} catch (PDOException $e) {
			//die($e->getMessage());
			echo "<script>
					alert('ERRO: ');
					window.location.href = '../CRUDS/Cadastrar_aluno.php';
					</script>";
		}

			Database::disconnect();

		}
	}


?>
