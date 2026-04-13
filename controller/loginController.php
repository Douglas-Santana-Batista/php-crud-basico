<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../conexao.php";
require_once "../services/loginServices.php";

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);


if (empty($email) || empty($senha)) {
    $_SESSION['erro'] = 'Preencha os dois campos!';
    header("location: ../index.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["erro"] = "Email inválido";
    header("Location: ../index.php");
    exit;
}

$usuarioEncontrado = buscarPorEmail($pdo, $email);

if ($usuarioEncontrado) {
    $_SESSION['erro'] = 'Usuário não encontrado';
    header("Location: ../index.php");
    exit;
}

if($usuarioEncontrado){
}

header("Location: ../conteudo.php");
