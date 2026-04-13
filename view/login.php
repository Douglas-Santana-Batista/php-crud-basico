<?php
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }

    $erro = $_SESSION["erro"] ?? null;
    unset($_SESSION["erro"]);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css"/>
    <title>Douglas</title>
</head>
<body>
    <header>

    </header>
    <form action="../controller/loginController.php" method="POST">
        <input type="text" name="email" placeholder="Email"/>
        <input type="password" name="senha" placeholder="Senha"/>
        <button type="submit">Enviar</button>
    </form>

    <?php if ($erro): ?>
        <div id="toast" class="toast">
            <?= htmlspecialchars($erro) ?>
        </div>
    <?php endif; ?>

    <script src="erro.js"></script>
</body>
</html>
