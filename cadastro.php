<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
   
    <section>
   
        <form action="redirect.php" method="post" class='formulario'>
        <h1 style='text-align:center; font-size:36px;'>Cadastro</h1>
            <input type="text" placeholder="Insira seu nome" name="nome" required>
            <input type="email" placeholder="Insira seu email" name="email" required>
            <input type="password" placeholder="Insira sua senha" name="senha" id="senha" required>
            <input type="password" placeholder="Confirme sua senha" name="ConfirmSenha" id="confirmsenha" required>
            <div class="btns">
            <input type="submit" value="Registrar" onclick="validatePassword()">
            <input type="reset" value="Resetar">
            </div>
        
        </form>


    </section>
</body>
</html>
<style>
        body {
            background-color: #222;
            color: #fff;
            font-family:Sans-serif;
        }
        h1 {
            color: #fff;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"],
        input[type="reset"] {
            background-color: #444;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            outline:none;            
            margin-bottom: 1rem;
            padding: 0.5rem;
            width: 100%;
        }
        input[type="submit"],
        input[type="reset"] {
            cursor: pointer;
            margin:10px;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #555;
        }
        .btns {
            display: flex;
            justify-content: space-between;
        }
        button{margin:20px;}
        .formulario {
            background-color: #333;
            border-radius: 10px;
            margin: 200px auto;
            max-width: 500px;
            padding: 2rem;

        }
    </style>

<script>
   var password = document.getElementById("senha")
  , confirm_password = document.getElementById("confirmsenha");
function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Senhas diferentes!");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>


