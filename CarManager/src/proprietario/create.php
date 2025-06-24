<?php include  '../../components/header.php'; 
      
?>


    <main>
        <h1> Cadastrar Proprietário </h1>
        <div class="d-flex justify-content-center align-items-center" style="min-height: 40vh;">
            
            <form method="POST" action="/crud/functions/proprietario/registrar.php" class="w-100" style="max-width: 600px;">
                <div class="row g-3">

                    <div class="col-md-12">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="nome" required>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="phone" name="telefone" required maxlength="15" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/\D/g, '')">
                    </div>

                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required maxlength="11" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/\D/g, '')">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Cadastrar</button>
                    </div>

                </div>
            </form>
        </div>
    </main>

<?php include '../../components/footer.php'; ?>