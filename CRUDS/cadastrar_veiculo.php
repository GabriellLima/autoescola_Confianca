<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<body>
  <center><h1>Cadastrar Veículo</h1></center>
  <div class="form_cadastrar_veiculo">

    <!--label é #alinhar e input é #form_usuario-->
    <form id="" action ="../conexao_Banco/Cadastrar_veiculo_conexao_banco.php" method="post" >

      <label id="alinhar">Placa:</label><br>
      <input class="label2" id="formulario" name="placa" type="varchar" required placeholder="Informe a Placa" value="">
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
