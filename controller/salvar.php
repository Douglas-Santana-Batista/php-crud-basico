<?php

require "../model/conexao.php";
require "../model/salvarNoBanco.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");

if (empty($nome) || empty($email)) {
    $_SESSION['old_nome'] = $nome;
    $_SESSION['old_email'] = $email;
    $_SESSION["erro"] = "Preencha os campos";
    header("Location: ../view/cadastrarNoBanco.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["erro"] = "Email inválido";
    header("Location: ../view/cadastrarNoBanco.php");
    exit;
}

salvarNoBanco($pdo, $nome, $email);

unset($_SESSION['old_nome'], $_SESSION['old_email']);

header("Location: ../view/cadastrarNoBanco.php");
