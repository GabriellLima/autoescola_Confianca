<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>

<body>
<center><h1>Cadastrar Turma</h1></center>
<div class="form_cadastrar_turma">

<!--label é #alinhar e input é #form_usuario-->
<form id="" action ="#" method="post" >

<label id="alinhar">Instrutor:</label><br>
<select class="label2" id="formulario" >
<option >Selecione...</option>
<option value="I">Ingrid</option>
<option value="J">Jessica</option>
<option value="G">Gabriel</option>
</select>
<br>
 <label id="alinhar">Turno:</label><br>
 <input class="label2" id="formulario" name="turno" maxlength="10" type="text" required placeholder="Informe o Turno" value="">
 <br>
 <label id="alinhar">Status:</label><br>
 <select>
 <option value="concluido">Concluído</option>
 <option value="em_andamento">Em andamento</option>
 <option value="aberto">Aberto</option>
 
 </select>

<br>
<br>
    <center> <input type="submit" id="botao" name="cadastrar" value="Cadastrar"/>
	 <input type="submit" id="botao" onClick="history.go(-1)"  name="voltar" value="Voltar"/></center>
 
</form>

</div>
</body>
</html>