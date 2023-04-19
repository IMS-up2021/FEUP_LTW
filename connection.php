<?php
$dsn = 'sqlite:database.sqlite'; // caminho para o arquivo do banco de dados SQLite
$user = null; // usuário do banco de dados (não necessário para SQLite)
$password = null; // senha do banco de dados (não necessário para SQLite)

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ativa o modo de erros do PDO
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    exit();
}
