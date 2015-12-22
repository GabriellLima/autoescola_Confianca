<?php
if (!isset($_SESSION)) session_start();

// Verifica se n?o h? a vari?vel da sess?o que identifica o usu?rio
if (!isset($_SESSION['UsuarioID'])) {
    // Destr?i a sess?o por seguran?a
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: ../index.php"); exit;
}

?>

<HTML>

<head>

    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
   


<TITLE>Relatorio de Alunos</TITLE>

    <script>
        function imprimir(){
            window.print();
        }
    </script>

</head>

<STYLE>

BODY{
    font-size: 14pt;
    -webkit-print-color-adjust: exact;
	
}

Table{
    font-family: sans-serif;
    font-size:12pt;
	align:center;
}

TH {
    background-color: #538CD3;
    color: #FFF;
}

.linhaTrue{
    background-color: #D8E5F1;
}
        
.numeroLegenda{
    font-size:7pt;
}

.vertical-rotate{
    transform: rotate(270deg);
    -webkit-transform: rotate(270deg);
    -moz-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
}

</STYLE>

<style media="print">
    .botao {
        display: none;
    }
</style>

<BODY scroll=yes>
<table cellspacing=0 align=center width=100% bordercolor=\"#AAAAAA\">
    <tr align="center" color=#99CCFF>
        <td cellpadding=5>
		<br>
		<br>
            <font size=6><b>Relatorio de Alunos</b></font>
        </td>
    </tr>
    <tr align="right">
        <td cellpadding=5>
            <img src="../css/img/print_printer.png" onclick="imprimir()" style="width: 30px" class="botao">
        </td>
    </tr>


</table>

<BR>
<BR>
<BR>

<table cellspacing=0 align=center width='1000' border='1' bordercolor='#AAAAAA'>

<TR>
	<TH>Nome</TH>
    <TH>CPF</TH>
    <TH>Turno</TH>
    <TH>Categoria</TH>
	<TH>Situacao</TH>
</TR>
    <?php
    include '../conexao/database.php';
    $pdo = Database::connect();

    $sql = "select aluno.nome, aluno.cpf, aluno.TURNO, aluno.categoria, aluno.SITUACAO from aluno";
  
    foreach ($pdo->query($sql) as $row) {
        echo '<tr>';
        echo '<td align="center"> '. $row['nome'] . '</td>';
        echo '<td align="center"> '. $row['cpf']. '</td>';
        echo '<td align="center"> '.$row['TURNO']. '</td>';
        echo '<td align="center"> '. $row['categoria']. '</td>';
        echo '<td align="center"> '. $row['SITUACAO']. '</td>';
        echo '</tr>';
    }
    Database::disconnect();
    ?>
        
  
</TABLE>

</BODY>
</HTML>