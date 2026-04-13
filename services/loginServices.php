<?php
    function buscarPorEmail($pdo, $email){
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
        unset($usuario["senha"]);
        }

        return $usuario;
    }
?>