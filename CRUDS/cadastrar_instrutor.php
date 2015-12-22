<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<body>
  <center><h1>Cadastrar Instrutor</h1></center>
  <div class="form_cadastrar_turma">

    <!--label é #alinhar e input é #form_usuario-->
    <form id="" action ="../conexao_Banco/cadastrar_instrutor_conexao_banco.php" method="post" >

      <label id="alinhar">Nome:</label><br>
      <input class="label2" id="formulario" name="nome" type="varchar" required placeholder="Nome">
      <br>
      <label id="alinhar">CPF:</label><br>
      <input class="label2" id="formulario" name="cpf" type="integer" required placeholder="Cpf" value="">
      <br>
      <label id="alinhar">Telefone:</label><br>
      <input class="label2" id="formulario" name="telefone" type="integer" required placeholder="Informe o telefone" value="">
      <br>
      <label id="alinhar">Data de Nascimento:</label><br>
      <input class="label2" id="formulario" name="nascimento" type="date" required>
      <br>
      <label id="alinhar">Endereço:</label><br>
      <input class="label2" id="formulario" name="endereco" type="varchar" required>
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
