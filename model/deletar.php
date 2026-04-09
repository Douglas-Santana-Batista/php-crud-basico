<?php

    require "conexao.php";

    function deletar($pdo, $id){
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
    }

?>