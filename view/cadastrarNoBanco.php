<?php
require "../model/conexao.php";
require "../model/buscar.php";

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
        <link  rel="stylesheet" href="../style.css">
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
                <h2> Cadastrar Usuários</h2>
                <form action="../controller/salvar.php" method="POST">
                    <input type="text" name="nome" value="<?= htmlspecialchars($nome_salvo) ?>" placeholder="Nome"><br><br>
                    <input type="text" name="email" value="<?= htmlspecialchars($email_salvo) ?>" placeholder="Email"><br><br>
                    <button type="submit">Salvar</button>
                </form>
            </div>

            
            <?php if ($erro): ?>
                <div id="toast" class="toast">
                    <?= htmlspecialchars($erro) ?>
                </div>
            <?php endif; ?>

            <h2>Usuários Cadastrados<h2>

            <div class="usuariosCadastrados">
                <?php foreach ($usuarios as $u): ?>
                <p><?= $u["nome"] . " - " . $u["email"]?></p>
                <form action="../controller/delete.php" method="GET">
                    <input type="hidden" name="id" value="<?= $u["id"] ?>">
                    <button type="submit">Deletar</button>
                </form>
                <?php endforeach;?>
            </div>
        </div>
        
        <script src="../erros.js"></script>
    </body>
</html>