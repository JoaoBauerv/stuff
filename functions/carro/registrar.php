<?php
require_once(__DIR__ . '/../../banco.php');



// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$ano = (int)$_POST['ano'];
if ($ano > date('Y')) {
    echo $ano." invalido";
}
echo date('Y');



if (!empty($_POST)) {
    try {
        $sql = "INSERT INTO tb_carro (marca, modelo, ano, cor, placa, valor, entrada, id_proprietario) VALUES (:marca, :modelo, :ano, :cor, :placa, :valor, :entrada, :id_proprietario)";
        $stmt = $pdo->prepare($sql);

        

        $dados = array(
            ':marca' => $_POST['marca'],
            ':modelo' => $_POST['modelo'],
            ':ano' => $_POST['ano'],
            ':cor' => $_POST['cor'],
            ':placa'=> $_POST['placa'],
            ':valor' => $_POST['valor'],
            ':entrada' => $_POST['entrada'],
            ':id_proprietario'=> $_POST['id_proprietario']
        );

        

        if ($stmt->execute($dados)) {
            header("Location: ../../index.php?msgSucesso=Cadastro realizado com sucesso!");
        }
    } catch (PDOException $e) {
        header("Location: ../../index.php?msgErro=Falha ao cadastrar...");
    }
} else {
    header("Location: ../../index.php?msgErro=Erro de acesso.");
}
die();


?>