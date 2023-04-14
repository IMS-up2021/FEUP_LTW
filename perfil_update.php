<?php
// Inclui o arquivo de conexão com o banco de dados
include('conexao.php');

// Inicia a sessão
session_start();

// Verifica se o cliente está logado
if (!isset($_SESSION['cliente_id'])) {
    header('Location: login.php');
    exit();
}

// Obtém o ID do cliente
$cliente_id = $_SESSION['cliente_id'];

// Obtém os novos dados do perfil do cliente
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verifica se a senha foi informada e a criptografa
if (!empty($senha)) {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE clientes SET nome = ?, email = ?, senha_hash = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $senha_hash, $cliente_id]);
} else {
    $sql = "UPDATE clientes SET nome = ?, email = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $cliente_id]);
}

// Redireciona para a página de perfil do cliente
header('Location: perfil.php');
exit();
?>
