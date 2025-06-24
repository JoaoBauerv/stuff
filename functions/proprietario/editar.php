<?php
require_once(__DIR__ . '/../../banco.php');
include __DIR__ . '/../../components/validadorcpf.php';


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// print_r($_REQUEST);

$cpf = $_POST['cpf'];

validaCPF($cpf);

if (!validaCPF($cpf)) {
    header("Location: ../../index.php?msgErro=CPF inválido.");
    die();
}

if (!empty($_POST)) {
    try {

        $sql = "UPDATE tb_proprietario SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $dados = array(
            ':cpf' => $_POST['cpf'],
            ':email' => $_POST['email'],
            ':telefone' => $_POST['telefone'],
            ':nome' => $_POST['nome'],
            ':id' => $_REQUEST['id']
        );

        if ($stmt->execute($dados)) {
            header('Location: ../../index.php?msgSucesso=Alteração realizada com sucesso!');
        }
    } catch (PDOException $e) {
        header('Location: ../../index.php?msgErro=Falha ao cadastrar...');
    }
} else {
    header('Location: ../../index.php?msgErro=Erro de acesso');
}
die();



?>