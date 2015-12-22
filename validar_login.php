<?php
    $login = $_POST['login'];
    $entrar = $_POST['entrar'];
    $senha = $_POST ["senha"];
    $connect = @mysql_connect('localhost','root','');
    $db = mysql_select_db('autoescola');
        if (isset($entrar)) {

            $verifica = mysql_query("SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
           // echo $verifica;
                if (mysql_num_rows($verifica)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../index.php';</script>";
                    die();
                }else{
                    // Salva os dados encontados na variável $resultado
                    $resultado = mysql_fetch_assoc($verifica);

                    //setcookie("login",$login);

                    // Se a sessão não existir, inicia uma
                    if (!isset($_SESSION)) session_start();

                    // Salva os dados encontrados na sessão
                    $_SESSION['UsuarioID'] = $resultado['cod_usuario'];
                    $_SESSION['UsuarioNome'] = $resultado['name'];
                    $_SESSION['UsuarioAcesso'] = $resultado['acesso'];



                    //Direciona para a página principal
                    header("Location:menu.php"); exit;


                }
        }
?>
