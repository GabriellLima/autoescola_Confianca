<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>

<body>
<center><h1 id="h1_form">Excluir Instrutor</center></h1>
<div class="form_cadastrar_aluno">

<!--label é #alinhar e input é #form_usuario-->
	<form class="form-horizontal" action="apagar_aluno.php" method="post">
	    			  <input type="hidden" name="id" value="18"/>
					  <p class="alert alert-error">Tem certeza em excluir este instrutor?</p>
					  <div class="form-actions">
						  
						  
						  <script>
						function funcao1()
							{
								alert("Instrutor excluido com sucesso!");
							}
						</script>
  
	 <button type="submit" onclick="funcao1()" value="Exibir Alert"> <a href="../instrutor.php">Sim</a></button> 
						  
						 <button> <a class="botao_nao" href="../instrutor.php">Não</a></button>
						</div>
					</form>

</div>
</body>
</html>