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
<form id="" action ="#" method="post" >

 <label id="alinhar">Placa:</label><br>
 <input class="label2" id="formulario" name="placa" maxlength="10" type="varchar" required placeholder="Informe a Placa" value="">
 <br>
 <label id="alinhar">Quantidade:</label><br>
 <input class="label2" id="formulario" name="quantidade" maxlength="10" type="number" required>
 <br>
 <br>
    <center> <input type="submit" id="botao" name="cadastrar" value="Cadastrar"/>
	 <input type="submit" id="botao" onClick="history.go(-1)"  name="voltar" value="Voltar"/></center></center>
 
</form>

</div>
</body>
</html>