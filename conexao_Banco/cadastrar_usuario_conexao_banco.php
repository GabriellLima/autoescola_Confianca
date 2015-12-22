<?php

require '../conexao/database.php';



if ( !empty($_POST)) {


	$login= $_POST['login'];
	$senha = $_POST['senha'];



	$valid = true;

	// insert data
	if ($valid) {
		try{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO usuario (login,senha) values(?,?)";
			$q = $pdo->prepare($sql);

			$q->execute(array($login,$senha));

			echo "<script>
			alert('Cadastro salvo com Sucesso!');
			window.location.href = '../usuario.php';
			</script>";

		} catch (PDOException $e) {
			//die($e->getMessage());
			echo "<script>
			alert('ERRO');
			window.location.href = '../CRUDS/Cadastrar_usuario.php';
			</script>";
		}

		Database::disconnect();

	}
}


?>
