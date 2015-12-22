<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<body>
  <center><h1 id="h1_form">Excluir Turma</center></h1>
  <div class="form_cadastrar_aluno">

    <!--label é #alinhar e input é #form_usuario-->
    <form class="form-horizontal" action="apagar_aluno.php" method="post">
      <input type="hidden" name="id" value="18"/>
      <p class="alert alert-error">Tem certeza em excluir esta turma?</p>
      <div class="form-actions">


        <script>
        function funcao1()
        {
          alert("Turma excluida com sucesso!");
        }
        </script>

        <button type="submit" onclick="funcao1()" value="Exibir Alert"> <a href="../turma.php">Sim</a></button>

        <button> <a class="botao_nao" href="../turma.php">Não</a></button>
      </div>
    </form>

  </div>
</body>
</html>
