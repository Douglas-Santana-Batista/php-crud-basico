<?php

function verificar($SESSION){
    if (session_start() === PHP_SESSION_NONE) {
    session_start();
    }

    if (!isset($SESSION["usuario_id"])) {
        header("Location: login.php");
        exit;
    }
}
