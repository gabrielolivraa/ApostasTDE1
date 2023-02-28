

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<div class="logo">
       
</div>
<form action="valida.php" method="post" class='formulario'>
<h1 style='text-align:center;'>Apostas</h1>
    <input type="text" placeholder="Insira seu email" name="email" required>
    <input type="password" placeholder="Insira sua senha" name="senha" required>
    <button class="login">Login</button>
    <p class="p-link" style='font-size:14px;'>Não tem uma conta?<span><a href="cadastro.php" class="link" style='color:green;'>   CADASTRE-SE</span></a></p>
</form>
</body>
</html>

<style>
    .formulario {
  background-color: #2b2b2b;
  color: #fff;
  padding: 20px;
  max-width: 500px;
  margin:200px auto;
  border-radius:10px;
}
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family:Sans-serif;
        }
        .logo img {
            width: 100px;
            height: 100px;
            background-color: #333;
        }
        input[type=text], input[type=password] {
            background-color: #2b2b2b;
            color: #fff;
            border: none;
            padding: 10px;
            margin-bottom: 30px;
            outline:none;            
            width: 98%;
        }
        .login {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px;
            width: 99%;
        }
        .login:hover {
            background-color: #555;
            cursor: pointer;
        }
        .p-link {
            font-size: 12px;
            text-align: center;
            margin-top: 10px;
        }
        .link {
            color: #fff;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
