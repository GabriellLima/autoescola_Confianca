<?php

require '../conexao/database.php';



	if ( !empty($_POST)) {


		$placa = $_POST['placa'];


		$valid = true;

		// insert data
		if ($valid) {
			try{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO veiculo (placa)
	values(?)";
			$q = $pdo->prepare($sql);

			$q->execute(array($placa));

			echo "<script>
					alert('Cadastro salvo com Sucesso!');
					window.location.href = '../veiculo.php';
					</script>";

		} catch (PDOException $e) {
			//die($e->getMessage());
			echo "<script>
					alert('ERRO');
					window.location.href = '../CRUDS/Cadastrar_veiculo.php';
					</script>";
		}

			Database::disconnect();

		}
	}


?>
