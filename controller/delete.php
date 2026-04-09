<?php

require __DIR__ . "/../model/conexao.php";
require __DIR__ . "/../model/deletar.php";

$id = $_GET["id"] ?? null;

if ($id) {
    deletar($pdo, $id);
}

header("Location: ../index.php");
exit;