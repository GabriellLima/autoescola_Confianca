<?php

if (!isset($_SESSION)) session_start();

// Verifica se n�o h� a vari�vel da sess�o que identifica o usu�rio
if (!isset($_SESSION['UsuarioID'])) {
  // Destr�i a sess�o por seguran�a
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: index.php"); exit;
}

require '../conexao/database.php';
$id = null;
if ( !empty($_GET['id'])) {
  $id = $_REQUEST['id'];
}

if ( null==$id ) {
  header("Location: ../index.php");
} else {
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT *,instrutor.nome as instrutor,aluno.nome as aluno FROM turma
INNER JOIN instrutor on turma.instrutor_cod_instrutor=instrutor.cod_instrutor
INNER JOIN aluno on turma.aluno_cod_aluno=aluno.cod_aluno
where cod_turma = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;"/>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <link   href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>

  <center><div class="logo">
    <img src="../css/img/slogan.png" width="500" height="150" alt="Logo Auto-Escola Confianca"></div>
  </center>
  <div class="container">

    <div class="span10 offset1">
      <div class="row">
        <h3>Descrição  da Turma</h3>
      </div>
      <div class="form-actions">

        <label class="control-label">Codigo da Turma:</label>
        <div class="controls">
          <label class="checkbox">
            <?php echo $data['cod_turma'];?>
          </label>
        </div>


        <label class="control-label">Codigo do Instrutor:</label>
        <div class="controls">
          <label class="checkbox">
            <?php echo $data['instrutor'];?>
          </label>
        </div>

        <label class="control-label">Codigo do Aluno:</label>
        <div class="controls">
          <label class="checkbox">
            <?php echo $data['aluno'];?>
          </label>

        </div>
        <label class="control-label">Situação:</label>
        <div class="controls">
          <label class="checkbox">
            <?php echo $data['situacao'];?>
          </label>

          <center>
            <div class="">
              <a class="btn" href="../turma.php">Voltar</a>
            </div>
          </center>

        </div> <!-- /container -->
      </body>
      </html>
