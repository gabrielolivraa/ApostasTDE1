<?php 
session_start();
include 'conexao.php';   
if((($_POST['email'])) && (($_POST['senha']))){
    $usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        
    //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
    $result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' and senha ='$senha'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);
    
    //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
    if(isset($resultado)){
        $_SESSION['nome'] = $resultado['nome'];
        $_SESSION['email'] = $resultado['email'];
        $_SESSION['senha'] = $resultado['senha'];
        
        
          if($_SESSION['email'] == 'root' && $_SESSION['senha'] == $resultado['senha']){
            header("Location: ./admin/admin.php");

        }
        elseif($_SESSION['email'] == $resultado['email'] && $_SESSION['senha'] == $resultado['senha']) {
            header("Location: ./autenticado/user.php");
            
        }
        else{
            header("Location: login.php");
        }
    //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
    //redireciona o usuario para a página de login
    }else{    
        //Váriavel global recebendo a mensagem de erro
       $_SESSION['loginErro'] = "<p>Usuário ou senha Inválido</p>";
        
        header("Location: login.php");
        
    }
//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
}else{
    $_SESSION['loginErro'] =  "<p class='user'>Usuário ou senha inválido</p>";
    
    header("Location: login.php");
}


    
?>