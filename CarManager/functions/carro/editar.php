<?php
require_once(__DIR__ . '/../../banco.php');


echo '<pre>';
print_r($_POST);
echo '</pre>';
print_r($_REQUEST);

if (!empty($_POST)) {
    try {

        $sql = "UPDATE tb_carro SET marca = :marca, modelo = :modelo, ano = :ano, cor = :cor, placa = :placa, valor = :valor, entrada = :entrada, id_proprietario = :id_proprietario  WHERE id = :id;";
        $stmt = $pdo->prepare($sql);

        $dados = array(
            ':marca' => $_POST['marca'],
            ':modelo' => $_POST['modelo'],
            ':ano' => $_POST['ano'],
            ':cor' => $_POST['cor'],
            ':placa' => $_POST['placa'],
            ':valor' => $_POST['valor'],
            ':entrada' => $_POST['entrada'],  
            ':id_proprietario' => $_POST['id_proprietario'],
            ':id' => $_REQUEST['id']

        );

        if ($stmt->execute($dados)) {
            header('Location: ../../index.php?msgSucesso=Alteração realizada com sucesso!');
        }
    } catch (PDOException $e) {
        echo'Location: ../../index.php?msgErro=Falha ao cadastrar...';
    }
} else {
    echo'Location: ../../index.php?msgErro=Erro de acesso';
}
die();



?>