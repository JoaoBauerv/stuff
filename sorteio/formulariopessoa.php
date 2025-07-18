<?php
// Conecta com o banco
require_once 'banco.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar pessoa</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .container { max-width: 600px; margin: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastrar Pessoa</h2>
        <form method="post" action="cadastrarpessoa.php">
            <label>Nome:</label>
            <input type="text" name="nome">

            <button type="submit" name="sortear">Cadastrar</button>
        </form>

    </div>
</body>
</html>
