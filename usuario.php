<!DOCTYPE html>
<html lang="pt-br">
<head>

	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css"  href="css/menu_style.css" />
	<link rel="stylesheet" type="text/css"  href="css/style.css" />
    <link   href="css/bootstrap.min.css" rel="stylesheet">

    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<?php include("cabecalho.php"); ?>
    <div class="container">
        <br><br>
    		<div class="row">

    			<h3>Usuários</h3><br>
    		</div>
			<div class="row">
				<p>

					<a href="CRUDS/Cadastrar_Usuario.php" class="btn btn-success">Novo</a>
				</p>
				<div id="Layer1" style="position:relative; width:800px; height:400px; z-index:1; overflow: auto">
				<table class="table table-bordered">
		              <thead>
		                <tr>
		                  <th>login</th>
										  <th>Açao</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php
					   include 'conexao/database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM usuario ORDER BY cod_usuario DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['login'] . '</td>';
							   	echo '<td>';
							   	
							   	echo '<a class="btn btn-success" href="CRUDS/Atualizar_usuario.php?id='.$row['cod_usuario'].'">Atualizar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="conexao_Banco/Excluir_Usuario.php?id='.$row['cod_usuario'].'">Apagar</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
					</div>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
