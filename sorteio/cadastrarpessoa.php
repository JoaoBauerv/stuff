<?php 
require_once 'banco.php';








try {
    $sql = "INSERT INTO tb_pessoas (nome) 
            VALUES (:nome)";
    $stmt = $pdo->prepare($sql);

    $dados = array(
        ':nome' => $_POST['nome']

    );

   

    if ($stmt->execute($dados)) {
            header("Location: formulariopessoa.php?msgSucesso=Cadastro realizado com sucesso!");
        
    } else {
        header("Location: ../../views/user/register.php?msgErro=Erro ao executar o cadastro.");
    }

} catch (PDOException $e) {
    header("Location: ../../views/user/register.php?msgErro=Erro de banco de dados.");
}

exit;

?>
