<?php
// Conecta-se ao banco de dados
include 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura as informações do usuário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmSenha = $_POST["ConfirmSenha"];
    
    // Valida as informações do usuário
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit;
    }
    
    // Insere os dados do usuário no banco de dados
    if($senha == $confirmSenha){
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Erro ao inserir os dados: " . mysqli_error($conn);
            exit;
        } else {

            echo '<section style="text-align:center;">
            <div> 
            </br>
            </br>
          
             <p class="msg"> Olá '. $nome.' seu cadastro foi realizado com sucesso!</p>
             </br>
             </br>
             <p class="msg"> Confirme seu cadastro no '.$email.' para verificar sua conta</p>
             <a href="login.php">Clique aqui para voltar a pagina inicial</a>
           </div>
           </section> <style>body{background:black;}
           section {
            background-color: #333333;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
            padding: 40px;
            margin:250px auto;
            max-width: 600px;
          }
          
          .container {
            max-width: 600px;
            margin: 400px auto;
          }
          
          .msg {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 10px;
          }
          a{text-decoration:none;
        color:white; 
    font-size:18px; font-weight:600;}
          </style>';


        }
    } else {
        echo "As senhas não coincidem.";
        exit;
    }
}

       

?>

