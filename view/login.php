<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["erro"])) {
    $erro = $_SESSION["erro"];
    unset($_SESSION["erro"]);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form action="cadastrarNoBanco.php" method="POST">
    <input type="text" name="email" placeholder="Email"><br><br>
    <input type="password" name="senha" placeholder="Senha"><br><br>
    <button type="submit">Entrar</button>
</form>

<?php if (!empty($erro)): ?>
    <div id="toast" class="toast">
        <?= htmlspecialchars($erro) ?>
    </div>
<?php endif; ?>

</body>
</html>