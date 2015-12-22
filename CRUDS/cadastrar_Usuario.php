<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<body>
  <center><h1>Cadastrar Novo Usuário</h1></center>
  <div class="form_usuario">

    <!--label é #alinhar e input é #form_usuario-->
    <form id="" action ="../conexao_Banco/Cadastrar_usuario_conexao_banco.php"  method="post" >

      <label id="alinhar">Login:</label><br>
      <input class="label2" id="formulario"name="login" type="text" required placeholder="Login" value="">
      <br>
      <label id="alinhar">Senha:</label><br>
      <input class="label2" id="formulario" name="senha"  type="password" required placeholder="Digite sua senha" value="">
      <br>
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
