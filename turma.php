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
			<h3>Turmas</h3><br>
		</div>
		<div class="row">
			<p>
				<a href="CRUDS/cadastrar_turma.php" class="btn btn-success">Novo</a>
			</p>
			<div id="Layer1" style="position:relative; width:800px; height:400px; z-index:1; overflow: auto">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Aluno</th>
							<th>Instrutor</th>
							<th>Situação</th>			
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'conexao/database.php';
						$pdo = Database::connect();
						$sql = 'SELECT turma.*, instrutor.nome as nomeInstrutor, aluno.nome as nomeAluno FROM turma inner join instrutor on instrutor.cod_instrutor = turma.instrutor_cod_instrutor 
								inner join aluno on aluno.cod_aluno = turma.aluno_cod_aluno
						ORDER BY cod_turma ASC';
						foreach ($pdo->query($sql) as $row) {
							echo '<tr>';
							echo '<td>'. $row['nomeAluno'] . '</td>';
							echo '<td>'. $row['nomeInstrutor'] . '</td>';
							echo '<td>'. $row['situacao'] . '</td>';
							echo '<td>';
							echo '<a class="btn" href="conexao_Banco/Visualizar_Turma.php?id='.$row['cod_turma'].'">Visualizar</a>';
							echo '&nbsp;';
							echo '<a class="btn btn-success" href="CRUDS/atualizar_turma.php?id='.$row['cod_turma'].'">Atualizar</a>';
							echo '&nbsp;';
							echo '<a class="btn btn-danger" href="conexao_Banco/Excluir_Turma.php?id='.$row['cod_turma'].'">Apagar</a>';
							echo '</td>';
						}
							echo '</tr>';
						Database::disconnect();
						?>
					</tbody>
				</table>
			</div>
		</body>
		</html>
