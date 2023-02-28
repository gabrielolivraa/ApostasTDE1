<nav>
  <ul>
    <li><a id="abrir-modal" style='cursor:pointer;'>Gerar resultado</a></li>
    <li><a href="cadastroAnimais.php">Cadastrar animais</a></li>
    
  </ul>
</nav>
<form action="logout.php" method="post" style='display:flex; justify-content:flex-end; margin:15px;'>
    <input type="submit" name="logout" value="Sair" style='background-color:white; width:80px; height:30px; border:none; cursor:pointer; font-weight:600; border-radius:5px; font-size:14px;'>
</form>

<div id="modal" class="modal">
  <div class="modal-conteudo">
    <h2 style='text-align:center; color:black;'>Gerar resultado</h2>
    <p style='color:black;'>Apostas</p>
    <div class='btn'>
    <button id="fechar-modal">Fechar Modal</button>
    </div>
  </div>
</div>
<h1 style='text-align:center; color:white;'>Apostas - Admin</h1>
<h2 style='text-align:center; color:white;'>Usuarios</h2>


<?php
$host = 'localhost';
$dbname = 'apostas';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Selecionar todos os usuários da tabela
$sql = "SELECT * FROM usuarios";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql1 = "SELECT * FROM animais";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute();
$animais= $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Exibir a tabela de usuários -->
<table style='background-color: #222; color: #fff;'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo $usuario['senha']; ?></td>
            <td>
                <a href="remover_usuario.php?id=<?php echo $usuario['id']; ?>" style='background:#c00;'>Remover</a>
                <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>" style='background:#f60;'>Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h2 style='text-align:center; color:white;'>Animais</h2>
<table style='background-color: #222; color: #fff;'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Animal</th>
            <th>Numero</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($animais as $animal): ?>
        <tr>
            <td><?php echo $animal['animais_id']; ?></td>
            <td><?php echo $animal['nome']; ?></td>
            <td><?php echo $animal['numero']; ?></td>
            <td>
                <a href="remover_animais.php?id=<?php echo $animal['animais_id']; ?>" style='background:#c00;'>Remover</a>
                <a href="editar_animais.php?id=<?php echo $animal['animais_id']; ?>" style='background:#f60;'>Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table> 

<style>
    html {
        margin: 0;
        padding: 0;
        font-family: Arial;
    }

    body {
        background-color: #1c1c1c;
        color: #fff;
    }

    table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
        color: #fff;
    }

    td,
    th {
        border: 1px solid #222;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #333;
    }

    th {
        background-color: #333;
        color: white;
    }

    td a {
        display: inline-block;
        margin-right: 10px;
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border-radius: 3px;
        text-decoration: none;
    }

    td a:hover {
        background-color: #3e8e41;
    }

    nav {
        background-color: #333;
        color: #fff;
        font-size: 18px;
        padding: 10px;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    nav li {
        display: inline-block;
        margin-right: 20px;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
    }

    nav a:hover {
        background-color: white;
        color: black;
    }

    .modal {
  display: none; /* Esconde o modal por padrão */
  position: fixed; /* Mantém o modal fixo na tela */
  z-index: 1; /* Define a ordem em que os elementos são exibidos */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.4); /* Define um fundo preto com transparência */
}

.modal-conteudo {
  background-color: #fefefe;
  margin: 15% auto; /* Centraliza o modal verticalmente e deixa uma margem em cima e embaixo */
  padding: 20px;
  border: 1px solid #888;
  width: 60%; /* Define a largura do modal */
}

/* Estilo do botão de fechar */
#fechar-modal {
  
  margin-top: 20px;
  padding: 10px;
  background-color: #ccc;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;


}

</style>

<script>
    // Obtém o botão de abrir o modal e o modal em si
var botaoAbrirModal = document.getElementById("abrir-modal");
var modal = document.getElementById("modal");

// Obtém o botão de fechar o modal
var botaoFecharModal = document.getElementById("fechar-modal");

// Quando o usuário clicar no botão de abrir o modal, exibe o modal
botaoAbrirModal.onclick = function() {
  modal.style.display = "block";
}

// Quando o usuário clicar no botão de fechar o modal, esconde o modal
botaoFecharModal.onclick = function() {
  modal.style.display = "none";
}

// Quando o usuário clicar fora do modal, também esconde o modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


</script>


