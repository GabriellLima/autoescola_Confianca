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
  <center><h1>Cadastrar Aluno</h1></center>
  <div class="form_cadastrar_aluno">

    <!--label é #alinhar e input é #form_usuario-->
    <form id="" action ="../conexao_Banco/Cadastrar_aluno_conexao_banco.php" method="post" >

      <label id="alinhar">Nome:</label><br>
      <input class="label2" id="formulario" name="nome" type="text" required placeholder="Nome">
      <br>
      <label id="alinhar">Data de Nascimento:</label><br>
      <input class="label2" id="formulario" name="nascimento" type="date" required>
      <br>
      <label id="alinhar">CPF:</label><br>
      <input class="label2" id="formulario" type="text" name="cpf"  required placeholder="CPF" value="">
      <br>
      <label id="alinhar">Telefone:</label><br>
      <input class="label2" id="formulario"type="telefone" name="telefone"  required placeholder="Telefone" value="">
      <br>
      <label id="alinhar">Endereço:</label><br>
      <input class="label2" id="formulario" name="endereco" type="text" required placeholder="Endereco">
      <br>
      <br>

      
        <label  id="alinhar" class="control-label">Turno:</label>
        <select name = "turno"  class="label2"  required="required" class = "select bradius" >
          <option value=""disabled selected style='display:none;'>Selecione o Turno</option>
          <option value="Matutino">Matutino</option>
          <option value="Vespertino">Vespertino</option>
          <option value="Noturno">Noturno</option>
        </select>
        <br><br>

        <label  id="alinhar" class="control-label">Categoria:</label>
        <div class="controls">
        <select name = "categoria"  class="label2" required="required" class = "select bradius" >
          <option value=""disabled selected style='display:none;'>Selecione a Categoria</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="A/B">A/B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>

        </select>
      <br><br>
     
        <label id="alinhar" class="control-label"> Situação:</label>
        <div class="controls">
        <select name = "situacao"  class="label2" required="required" class = "select bradius" >
          <option value=""disabled selected style='display:none;'>Selecione a Situação</option>
          <option value="em_aula">Em aula</option>
          <option value="aprovado">Aprovado</option>
          <option value="reprovado">Reprovado</option>
        </select>
        <br><br>

      </div>
      <br>
      <br>
      <center>
        <input type="submit" id="botao" name="cadastrar" value="Cadastrar"/>
        <input type="button" id="botao" onClick="history.go(-1)" name="voltar" value="Voltar"/>
      </center>

    </div>
    </form>

</body>
</html>
