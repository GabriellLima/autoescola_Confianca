
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

    			<h3>Alunos</h3><br>
    		</div>
			<div class="row">
				<p>

					<a href="CRUDS/Cadastrar_aluno.php" class="btn btn-success">Novo</a>
				</p>
				<div id="Layer1" style="position:relative; width:800px; height:400px; z-index:1; overflow: auto">
				<table class="table table-bordered">
		              <thead>
		                <tr>
		                  <th>Nome</th>
						    <th>CPF</th>
							 <th>Categoria</th>
							 <th>Situação</th>
							<th>Ação</th>
		                </tr>
		              </thead>
		              <tbody>
		             <?php
					   include 'conexao/database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM aluno ORDER BY cod_aluno DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['nome'] . '</td>';
									echo '<td>'. $row['cpf'] . '</td>';
										echo '<td>'. $row['categoria'] . '</td>';
										echo '<td>'. $row['SITUACAO'] . '</td>';
							   	echo '<td>';
							   	echo '<a class="btn" href="conexao_Banco/Visualizar_aluno.php?id='.$row['cod_aluno'].'">Visualizar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="cruds/Atualizar_aluno.php?id='.$row['cod_aluno'].'">Atualizar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="conexao_Banco/Excluir_aluno.php?id='.$row['cod_aluno'].'">Apagar</a>';
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
