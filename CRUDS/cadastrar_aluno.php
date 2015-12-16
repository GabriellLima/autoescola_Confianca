<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>

<body>
<center><h1>Cadastrar Aluno</h1></center>
<div class="form_cadastrar_aluno">

<!--label é #alinhar e input é #form_usuario-->
<form id="" action ="#" method="post" >

<label id="alinhar">Nome:</label><br>
<input class="label2" id="formulario" name="name" maxlength="100" type="text" required placeholder="Nome">
<br>
<label id="alinhar">Data de Nascimento:</label><br>
<input class="label2" id="formulario" name="dt_nascimento" maxlength="10" type="date" required>
<br>
<label id="alinhar">CPF:</label><br>
<input class="label2" id="formulario" type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required placeholder="CPF" value="">
<br>
 <label id="alinhar">Telefone:</label><br>
 <input class="label2" id="formulario"type="tel" name="mobile" required maxlength="13" OnKeyPress="formatar('## #####-####', this)" placeholder="Telefone" value="">
<br>
<label id="alinhar">Endereço:</label><br>
<input class="label2" id="formulario" name="endereco" maxlength="100" type="text" required placeholder="Endereco">
<br>
<label id="alinhar">Turno:</label><br>
<input class="label2" id="formulario"name="turno" type="text" maxlength="20" required placeholder="Turno" value="">
<br>
<label id="alinhar">Tipo da Categoria:</label><br>
<select class="label2" id="formulario" >
<option >Selecione...</option>
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
</select>
 <br>
 <label id="alinhar">Situação:</label><br>
<select class="label2" id="formulario" >
<option >Selecione...</option>
<option value="a">Em aula</option>
<option value="b">Aprovado</option>
<option value="c">Reprovado</option>
</select>
 <br>
 <br>
    <center> <input type="submit" id="botao" name="cadastrar" value="Cadastrar"/>
	 <button type="submit"><a href="../aluno.php"> Voltar</a></button></center>
	
 
</form>

</div>
</body>
</html>