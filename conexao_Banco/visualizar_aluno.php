<?php

if (!isset($_SESSION)) session_start();

// Verifica se n�o h� a vari�vel da sess�o que identifica o usu�rio
if (!isset($_SESSION['UsuarioID'])) {
    // Destr�i a sess�o por seguran�a
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php"); exit;
}

    require '../conexao/database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: ../index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM aluno where cod_aluno = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>

<center><div class="logo"><img src="../css/img/slogan.png" width="500" height="150" alt="Logo Auto-Escola Confianca"></div></center>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Descrição  do Aluno</h3>
                    </div>
                     <div class="form-actions">
                   
                        <label class="control-label">Nome:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nome'];?>
                            </label>
                        </div>
						
						<label class="control-label">Data de Nascimento:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nascimento'];?>
                            </label>
                        </div>
						
				
						
						<label class="control-label">CPF:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['cpf'];?>
                            </label>
                        
						
						</div>
						<label class="control-label">Telefone:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['TELEFONE'];?>
                            </label>
                      
						
						</div>
                     <label class="control-label">Endereço:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['ENDERECO'];?>
                            </label>
                     
						
						</div>
                     <label class="control-label">Turno:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['TURNO'];?>
                            </label>
                      
						
						</div>
                     <label class="control-label">Tipo da Categoria:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['categoria'];?>
                            </label>
                        
						
						</div>
                     <label class="control-label">Situação:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['SITUACAO'];?>
                            </label>
                        </div>
						
						</div>
                     
                     
				
                       <center>  <div class="">
                          <a class="btn" href="../aluno.php">Voltar</a>
                       </div></center>



              
	
    </div> <!-- /container -->
  </body>
</html>
