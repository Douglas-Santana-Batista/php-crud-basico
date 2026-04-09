<?php

function buscar($pdo)
{
    $stmt = $pdo-> query("SELECT * FROM usuarios");
    return $stmt->fetchAll();
}
