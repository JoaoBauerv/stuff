<?php
// Conexão com banco
require_once 'banco.php';

var_dump($_POST);
exit;

// Determinar o trimestre atual
$hoje = new DateTime();
$anoAtual = $hoje->format('Y');
$mes = (int)$hoje->format('m');
$trimestreAtual = ceil($mes / 3);

// Buscar IDs das pessoas sorteadas nos últimos 2 trimestres
$trimestresExcluidos = [];
if ($trimestreAtual == 1) {
    $trimestresExcluidos[] = [$anoAtual - 1, 4];
    $trimestresExcluidos[] = [$anoAtual - 1, 3];
} elseif ($trimestreAtual == 2) {
    $trimestresExcluidos[] = [$anoAtual, 1];
    $trimestresExcluidos[] = [$anoAtual - 1, 4];
} else {
    $trimestresExcluidos[] = [$anoAtual, $trimestreAtual - 1];
    $trimestresExcluidos[] = [$anoAtual, $trimestreAtual - 2];
}

// Monta SQL de exclusão
$placeholders = implode(',', array_fill(0, count($trimestresExcluidos), '(?, ?)'));
$sqlExcluidos = "SELECT id_pessoa FROM tb_sorteios WHERE (ano, periodo) IN ($placeholders)";
$stmt = $pdo->prepare($sqlExcluidos);
$params = [];
foreach ($trimestresExcluidos as $t) {
    $params[] = $t[0]; // ano
    $params[] = $t[1]; // trimestre
}
$stmt->execute($params);
$pessoasExcluidas = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Buscar pessoas elegíveis
if (count($pessoasExcluidas)) {
    $in = implode(',', array_fill(0, count($pessoasExcluidas), '?'));
    $stmt = $pdo->prepare("SELECT * FROM tb_pessoas WHERE id NOT IN ($in)");
    $stmt->execute($pessoasExcluidas);
} else {
    $stmt = $pdo->query("SELECT * FROM tb_pessoas");
}
$pessoasElegiveis = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($pessoasElegiveis) === 0) {
    echo "Nenhuma pessoa elegível para o sorteio.";
    exit;
}

// Sortear uma aleatória
$pessoaSorteada = $pessoasElegiveis[array_rand($pessoasElegiveis)];
echo "Sorteado: " . $pessoaSorteada['nome'] . "<br>";

// Salvar sorteio
$stmt = $pdo->prepare("INSERT INTO tb_sorteios (id_pessoa, trimestre, periodo) VALUES (?, ?, ?)");
$stmt->execute([$pessoaSorteada['id'], $anoAtual, $trimestreAtual]);
?>
