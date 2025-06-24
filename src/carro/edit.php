<?php   include  '../../components/header.php'; 

$sql = "SELECT * FROM tb_carro where id = '".$_REQUEST['id']."'";

$stmt = $pdo->prepare("SELECT * FROM tb_carro where id = '".$_REQUEST['id']."'");
$stmt->execute();
               
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// echo $row['marca'];


?>



    <main>
        
        <h1> Editar carro </h1>
        
        <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
            
            <form method="POST" action="/crud/functions/carro/editar.php?id=<?php echo $row["id"] ?>" class="w-100" style="max-width: 600px;">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control" required placeholder="Digite a marca" value = <?php echo $row['marca'] ?>>
                    </div>
                    <div class="col-md-12">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" required placeholder="Digite o modelo" value = <?php echo $row['modelo'] ?>>
                    </div>
                    <div class="col-md-4">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="number" name="ano" id="ano" class="form-control" required min="1900" max="<?php echo date('Y'); ?>" placeholder="Ano" value = <?php echo $row['ano'] ?>>
                    </div>
                    <div class="col-md-4">
                        <label for="cor" class="form-label">Cor</label>
                        <input type="text" name="cor" id="cor" class="form-control" required placeholder="Cor" value = <?php echo $row['cor'] ?>>
                    </div>
                    <div class="col-md-4">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" name="placa" id="placa" class="form-control" required placeholder="Placa" value = <?php echo $row['placa'] ?>>
                    </div>
                    <div class="col-md-6">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" name="valor" id="valor" class="form-control" required step="0.01" min="0" placeholder="Valor" value = <?php echo $row['valor'] ?>>
                    </div>
                    <div class="col-md-6">
                        <label for="entrada" class="form-label">Data de Entrada no Estoque</label>
                        <input type="date" name="entrada" id="entrada" class="form-control" required value = <?php echo $row['entrada'] ?>>
                    </div>
                    <div class="col-md-12">
                        <label for="id_proprietario" class="form-label">Proprietário</label>
                        <select name="id_proprietario" id="id_proprietario" class="form-select" required>
                            <option value="<?php echo ($row['id_proprietario']); ?>">
                                <?php
                                    // Seleciona o nome do proprietario atual do veiculo
                                    $ownerName = '';
                                    try {
                                        $stmtOwner = $pdo->prepare("SELECT n.nome FROM tb_carro c JOIN tb_proprietario n ON c.id_proprietario = n.id WHERE c.id = ?");
                                        $stmtOwner->execute([$_REQUEST['id']]);
                                        $ownerRow = $stmtOwner->fetch(PDO::FETCH_ASSOC);
                                        if ($ownerRow) {
                                            $ownerName = $ownerRow['nome'];
                                        }
                                    } catch (PDOException $e) {
                                        $ownerName = 'Erro ao buscar proprietário';
                                    }
                                    echo htmlspecialchars($ownerName);
                                ?>
                            </option>
                            
                        <?php
                        

                        if (!isset($pdo)) {
                            echo '<option value="">Erro na conexão com o banco de dados</option>';
                        } else {
                            try {
                                $stmt = $pdo->query("SELECT id, nome FROM tb_proprietario WHERE id != " . $row['id_proprietario'] . " ORDER BY nome"); // Select para selecionar todos proprietarios da tb proprietario em execção o atual que ja é uma opção anteriormente
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
                                $('#id_proprietario').select2();
                            });
                        </script>
                    
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Editar</button>
                    </div>
                
                </div>
                
            </form>
        </div>
    </main>

<?php include '../../components/footer.php'; ?>