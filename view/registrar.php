<?php
require "model/buscar.php";
require "services/auth.php";

$usuarios = buscar($pdo);

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
        <link  rel="stylesheet" href="style.css">
        <title>Cadastro</title>
    </head>
    <body>

        <?php
            $nome_salvo = $_SESSION['old_nome'] ?? "";
            $email_salvo = $_SESSION['old_email'] ?? "";
        ?>

        <header>

        </header>

        <div class="divGeral">
            <div class="formularioDeEnvio">
                <h2> Cadastrar</h2>
                <form action="controller/registrar.php" method="POST">
                <input type="text" name="nome" value="<?= htmlspecialchars($nome_salvo) ?>" placeholder="Nome"><br><br>
                <input type="text" name="email" value="<?= htmlspecialchars($email_salvo) ?>" placeholder="Email"><br><br>
                <input  type="password" name="password"  value="<?=htmlspecialchars($senha_salva) ?>" placeholder="Senha"><br><br>
                <button type="submit">Cadastrar</button>
                </form>
            </div>

            
            <?php if ($erro): ?>
                <div id="toast" class="toast">
                    <?= htmlspecialchars($erro) ?>
                </div>
            <?php endif; ?>

            
        </div>
        
        <script src="erros.js"></script>
    </body>
</html>


