<?php
require_once(__DIR__ . '/../../banco.php');


// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';




if(!empty($_POST)){

    try {
        $sql = "SELECT * FROM Tb_Carro WHERE id_proprietario = :id";
        $stmt = $pdo->prepare($sql);

        $dados = array(
            ':id' => $_GET['id']
        );

        $stmt->execute($dados);
        if ($stmt->rowCount() > 0) {
            header('Location: ../../index.php?msgErro=Proprietario tem veiculos cadastrados!');
            exit;
        } else {    
            try {
                $sql = "DELETE FROM tb_proprietario WHERE id = :id";
                $stmt = $pdo->prepare($sql);

                $dados = array(
                    ':id' => $_REQUEST['id']
                );

                if ($stmt->execute($dados)) {
                    header('Location: ../../index.php?msgSucesso=Deletado proprietario com sucesso!');
                    exit;
                } else {
                    header('Location: ../../index.php?msgErro=Falha ao deletar...');
                    exit;
                }
            } catch (PDOException $e) {
                header('Location: ../../index.php?msgErro=Falha ao deletar...');
                exit;
            }
        }
    } 
    catch (PDOException $e) {
        header('Location: ../../index.php?msgErro=Falha ao deletar...');
        exit;
    }
}



?>