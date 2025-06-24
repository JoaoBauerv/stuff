<?php
require_once(__DIR__ . '/../../banco.php');


// echo '<pre>';
// print_r($_GET);
// echo '</pre>';


if (!empty($_GET)) {
    try {

        $sql = "DELETE FROM tb_carro WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $dados = array(
            ':id' => $_GET['id']
        );

        if ($stmt->execute($dados)) {
            header('Location: ../../index.php?msgSucesso=Deletado com sucesso!');
        }
    } catch (PDOException $e) {
        echo'Location: ../../index.php?msgErro=Falha ao deletar...';
    }
} else {
    echo'Location: ../../index.php?msgErro=Erro de acesso';
}
die();



?>