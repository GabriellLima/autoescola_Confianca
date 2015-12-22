<?php

require '../conexao/database.php';



	if ( !empty($_POST)) {


		$nome= $_POST['nome'];
		$cpf = $_POST['cpf'];
		$telefone= $_POST['telefone'];
		$nascimento = $_POST['nascimento'];
		$endereco = $_POST['endereco'];



		$valid = true;

		// insert data
		if ($valid) {
			try{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO instrutor (nome,cpf,telefone,nascimento,endereco) values(?,?,?,?,?)";
			$q = $pdo->prepare($sql);

			$q->execute(array($nome,$cpf,$telefone,$nascimento,$endereco));

			echo "<script>
					alert('Cadastro salvo com Sucesso!');
					window.location.href = '../instrutor.php';
					</script>";

		} catch (PDOException $e) {
			//die($e->getMessage());
			echo "<script>
					alert('ERRO');
					window.location.href = '../CRUDS/Cadastrar_instrutor.php';
					</script>";
		}

			Database::disconnect();

		}
	}


?>
