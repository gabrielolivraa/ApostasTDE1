<?php
// Conectar ao banco de dados
$host = 'localhost';
$dbname = 'apostas';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Verificar se o ID do usuário foi enviado via GET
if (!isset($_GET['id'])) {
    header('Location: admin.php');
    exit();
}

// Selecionar o usuário correspondente ao ID
$id = $_GET['id'];
$sql = "SELECT * FROM animais WHERE animais_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$animal = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se o usuário foi encontrado
if (!$animal) {
    header('Location: admin.php');
    exit();
}

// Processar o formulário de atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];

    $sql = "UPDATE animais SET nome = :nome, numero = :numero WHERE animais_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':numero', $numero);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header('Location: admin.php');
    exit();
}
?>

<form method="post" class="formulario">
    <label for="nome">Animal:</label>
    <input type="text" name="nome" id="nome" value="<?php echo $animal['nome']; ?>">

    <label for="numero">Numero:</label>
    <input type="text" name="numero" id="numero" value="<?php echo $animal['numero']; ?>">

    <button type="submit">Atualizar</button>
</form>

<style>
 body{background:black; 
font-family:Sans-serif;}
 .formulario {
  background-color: #2b2b2b;
  color: #fff;
  padding: 20px;
  max-width: 500px;
  margin:50px auto;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"], button {
  background-color: #444;
  border: none;
  border-radius: 5px;
  color: #fff;
  font-size: 16px;
  padding: 10px;
  margin-bottom: 15px;
  width: 100%;
}

button {
  background-color: #8b0000;
  cursor: pointer;
}

button:hover {
  background-color: #dc143c;
}



</style>