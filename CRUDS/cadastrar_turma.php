<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <?php
require '../conexao/database.php';
  ?>
</head>

<body>
  <center><h1>Cadastrar Turma</h1></center>
  <div class="form_cadastrar_turma">

    <!--label é #alinhar e input é #form_usuario-->
    <form id="" action ="../conexao_Banco/cadastrar_turma_conexao_banco.php" method="post" >

      <div class="control-group?>">
        <label class="control-label">Instrutor</label>
        <div class="controls">
        <select name = "instrutor"  required="required" class = "select bradius" id="nome">
          <option value=""disabled selected style='display:none;'>Selecione o Instrutor</option>
          <?php
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $resultado = "SELECT * FROM instrutor";
          Database::disconnect();

          if(count($resultado)){
            foreach ($pdo->query($resultado) as $res) {
              ?>
              <option  value="<?php echo $res['cod_instrutor'];?>" ><?php echo $res['nome'];?></option>
              <?php
            }
          }
          ?>
        </select>
        <br><br>

        </div>
        <div class="control-group?>">
          <label class="control-label">Aluno</label>
          <div class="controls">
          <select name = "aluno"  required="required" class = "select bradius" >
            <option value=""disabled selected style='display:none;'>Selecione o aluno</option>
            <?php
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = "SELECT * FROM aluno";
            Database::disconnect();

            if(count($resultado)){
              foreach ($pdo->query($resultado) as $res) {
                ?>
                <option  value="<?php echo $res['cod_aluno'];?>" ><?php echo $res['nome'];?></option>
                <?php
              }
            }
            ?>
          </select>
          <br><br>

          </div>
      <label id="alinhar">Status:</label><br>
      <select name="situacao">
        <option value="concluido">Concluído</option>
        <option value="em_andamento">Em andamento</option>
        <option value="aberto">Aberto</option>
      </select>
      <br>
      <br>
      <center>
        <input type="submit" id="botao" name="cadastrar" value="Cadastrar"/>
        <input type="button" id="botao" onClick="history.go(-1)" name="voltar" value="Voltar"/>
      </center>

    </form>

  </div>
</body>
</html>
