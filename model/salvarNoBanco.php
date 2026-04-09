<?php

function salvarNoBanco($pdo, $nome, $email)
{
    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email]);
}
