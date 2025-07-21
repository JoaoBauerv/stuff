<?php
// Conecta com o banco
require_once 'banco.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sorteio Trimestral</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .container { max-width: 600px; margin: auto; }
        button { padding: 10px 20px; font-size: 16px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sorteio Trimestral</h2>
        <form method="post" action="sorteio.php">
            <label>Trimestre:</label>
            <input type="number" name="trimestre">
            <button type="submit" name="sortear">Realizar Sorteio</button>
        </form>

        <hr>
        <h3>Sorteios anteriores:</h3>
        <ul>
            <?php
            $stmt = $pdo->query("
                SELECT s.id, p.nome, s.trimestre, s.periodo
                FROM tb_sorteios s
                JOIN tb_pessoas p ON p.id = s.id_pessoa
                ORDER BY s.id DESC
                LIMIT 10
            ");
            while ($linha = $stmt->fetch()) {
                echo "<li>{$linha['nome']} - Trimestre {$linha['periodo']}/{$linha['trimestre']}</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>