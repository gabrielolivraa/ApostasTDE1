<?php
$host = 'localhost';
$dbname = 'apostas';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nome = $_POST["nome"];
$numero = $_POST["numero"];

$stmt = $conn->prepare("INSERT INTO animais (nome, numero) VALUES (?, ?)");
$stmt->bind_param("si", $nome, $numero);

if ($stmt->execute() === TRUE) {
    echo "<script>";
    echo "alert('Olá, mundo!')";    
    echo "</script>";
    header('Location: admin.php');
    exit();
   
} else {
    echo "Erro ao cadastrar animal: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
