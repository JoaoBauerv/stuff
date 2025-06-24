<?php include  '../../components/header.php'; 
    
$sql = "SELECT * FROM tb_proprietario where cpf = '".$_REQUEST['id']."'";

$stmt = $pdo->prepare("SELECT * FROM tb_proprietario where id = '".$_REQUEST['id']."'");
$stmt->execute();
               
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//$row['nome'];

?>

    <h1> Editar Proprietario </h1>
    <main>

        <div class="d-flex justify-content-center align-items-center" style="min-height: 40vh;">
            <form method="POST" action="/crud/functions/proprietario/editar.php?id=<?php echo $row["id"] ?>" class="w-100" style="max-width: 600px;">
                <div class="row g-3">

                    <div class="col-md-12">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="nome" value = <?php echo $row['nome'] ?> required>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value = <?php echo $row['email'] ?> required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="phone" name="telefone" required maxlength="15" pattern="\d*" value = <?php echo $row['telefone'] ?> inputmode="numeric" oninput="this.value = this.value.replace(/\D/g, '')">
                    </div>

                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required maxlength="11" pattern="\d*" inputmode="numeric"  value = <?php echo $row['cpf'] ?> oninput="this.value = this.value.replace(/\D/g, '')">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Editar</button>
                    </div>

                </div>
            </form>
        </div>
    </main>

<?php include '../../components/footer.php'; ?>