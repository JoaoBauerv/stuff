<?php
require_once(__DIR__ . '/../../banco.php');
include __DIR__ . '/../../components/validadorcpf.php';

 echo '<pre>';
 print_r($_POST);
 echo '</pre>';

$cpf = $_POST['cpf'];

validaCPF($cpf);

if (!validaCPF($cpf)) {
    header("Location: ../../index.php?msgErro=CPF inválido.");
    die();
}


if (!empty($_POST)) {
    try {
        $sql = "INSERT INTO tb_proprietario (nome, email, telefone, cpf) VALUES (:nome, :email, :telefone, :cpf)";
        $stmt = $pdo->prepare($sql);
        
                
        
        $dados = array(
            ':nome' => $_POST['nome'],
            ':email' => $_POST['email'],
            ':telefone'=> $_POST['telefone'],
            ':cpf'=> $_POST['cpf']
        );

        // print_r($dados);

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