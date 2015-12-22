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
		<div class="row"><br><br><br><br><br>

			<h3>Instrutores</h3>
		</div>
		<div class="row"><br><br>
			<p>
				<a href="CRUDS/cadastrar_instrutor.php" class="btn btn-success">Novo</a>
			</p>
			<div id="Layer1" style="position:relative; width:800px; height:400px; z-index:1; overflow: auto">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Telefone</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'conexao/database.php';
						$pdo = Database::connect();
						$sql = 'SELECT * FROM instrutor ORDER BY cod_instrutor DESC';
						foreach ($pdo->query($sql) as $row) {
							echo '<tr>';
							echo '<td>'. $row['nome'] . '</td>';
							echo '<td>'. $row['TELEFONE'] . '</td>';

							echo '<td>';
							echo '<a class="btn" href="conexao_Banco/Visualizar_instrutor.php?id='.$row['cod_instrutor'].'">Visualizar</a>';
							echo '&nbsp;';
							echo '<a class="btn btn-success" href="CRUDS/atualizar_instrutor.php?id='.$row['cod_instrutor'].'">Atualizar</a>';
							echo '&nbsp;';
							echo '<a class="btn btn-danger" href="conexao_Banco/Excluir_Instrutor.php?id='.$row['cod_instrutor'].'">Apagar</a>';
							echo '</td>';
							echo '</tr>';
						}
						Database::disconnect();
						?>
					</tbody>
				</table>
			</div>




		</body>
		</html>
