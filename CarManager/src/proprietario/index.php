<?php include  '../../components/header.php'; ?>


        
<h1> Lista Proprietários </h1>
            
<a href="/CarManager/src/proprietario/create.php" class="nav-link px-2 text-white">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-badge me-1" viewBox="0 0 16 16">
<path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
<path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
</svg>
Cadastrar proprietario
</a>

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

            <main class="px-3">

            
                <div style="display: flex; justify-content: center;">
                
                <?php
                
                
                $stmt = $pdo->prepare("SELECT * FROM tb_proprietario order by nome");
                $stmt->execute();
                $rowCount = $stmt->rowCount();

                if ($rowCount > 0) {
                    echo "<table>";
                    echo "<thead>";
                    echo "<td>Nome</td>"; echo "<td>Email</td>"; echo "<td>Telefone</td>"; echo "<td>Cpf</td>"; echo "<td>Opções</td>";
                    echo "</thead>";

                    echo "<tbody>";
                    
                
                

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row["nome"] . "</td> ";
                        echo "<td>" . $row["email"] . "</td> ";
                        echo "<td>" . $row["telefone"] . "</td>";
                        echo "<td>" . $row["cpf"] . "</td>";

                        echo '<td class="">';
                        echo '<a href="/CarManager/src/carro/show.php?id=' . $row["id"] . '" class="btn btn-sm btn-primary" style="margin-right: 5px;">Carros</a>';
                        echo '<a href="edit.php?id=' . $row["id"] . '" class="btn btn-sm btn-warning" style="margin-right: 5px;">Editar</a>';
                        echo '<form action="/CarManager/functions/proprietario/deletar.php?id=' . $row["id"] .'" method="post" style="display:inline; ">';
                        echo '<input type="hidden" name="cpf" value="' . htmlspecialchars($row["cpf"]) . '">';
                        echo '<button type="submit" class="btn btn-sm btn-danger">Excluir</button>';
                        echo '</form>';
                        echo '</td>';
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                }
                

                ?>

                </div>

               
            </main>

        </div>
    

<?php include  '../../components/footer.php'; ?>

