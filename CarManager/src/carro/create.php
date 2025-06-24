<?php   include  '../../components/header.php'; 
        
?>




    <main>
        <h1> Cadastrar Carro </h1>
        <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
            <form method="POST" action="/CarManager/functions/carro/registrar.php" class="w-100" style="max-width: 600px;">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control" required placeholder="Digite a marca">
                    </div>
                    <div class="col-md-12">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" required placeholder="Digite o modelo">
                    </div>
                    <div class="col-md-4">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="text" name="ano" id="ano" class="form-control" required min="1900" max="<?php echo date('Y'); ?>" maxlength="4" placeholder="Ano">
                    </div>
                    <div class="col-md-4">
                        <label for="cor" class="form-label">Cor</label>
                        <input type="text" name="cor" id="cor" class="form-control" required placeholder="Cor">
                    </div>
                    <div class="col-md-4">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" name="placa" id="placa" class="form-control" required placeholder="Placa">
                    </div>
                    <div class="col-md-6">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" name="valor" id="valor" class="form-control" required step="0.01" min="0" placeholder="Valor">
                    </div>
                    <div class="col-md-6">
                        <label for="entrada" class="form-label">Data de Entrada no Estoque</label>
                        <input type="date" name="entrada" id="entrada" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="id_proprietario" class="form-label">Proprietário</label>
                        <select name="id_proprietario" id="id_proprietario" class="form-select" required>
                            <option value="">Selecione o proprietário</option>
                            
                        <?php
                         // Certifique-se de que esse arquivo define $pdo (PDO)

                        if (!isset($pdo)) {
                            echo '<option value="">Erro na conexão com o banco de dados</option>';
                        } else {
                            try {
                                $stmt = $pdo->query("SELECT cpf, nome, id FROM tb_proprietario ORDER BY nome");
                                $proprietarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                if (count($proprietarios)) {
                                    foreach ($proprietarios as $row) {
                                        echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['nome']) . '</option>';
                                    }
                                } else {
                                    echo '<option value="">Nenhum proprietário encontrado</option>';
                                }
                            } catch (PDOException $e) {
                                echo '<option value="">Erro na consulta: ' . htmlspecialchars($e->getMessage()) . '</option>';
                            }
                        }
                        ?>


                        </select>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#id_proprietario').select2({
                                
                            });
                        });
                    </script>             
                    
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Cadastrar</button>
                    </div>
                
                </div>
                
            </form>
        </div>
    </main>

<?php include '../../components/footer.php'; ?>