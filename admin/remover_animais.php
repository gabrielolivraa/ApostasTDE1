<?php
// Conectar ao banco de dados
$host = 'localhost';
$dbname = 'apostas';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// Selecionar todos os usuários da tabela

// Receber o ID do usuário a ser removido
$id = $_GET['id'];

// Excluir o usuário da tabela
$sql = "DELETE FROM animais WHERE animais_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Redirecionar de volta para a página de exibição da tabela
header('Location: admin.php');
exit;
?>