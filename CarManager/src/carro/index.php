<?php include '../../components/header.php'; ?>



<h1> Lista Carros </h1>

<a href="/crud/src/carro/create.php" class="nav-link px-2 text-white">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-card-list me-1" viewBox="0 0 16 16">
<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
<path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
</svg>
Cadastrar carro
</a>

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">


    <main class="px-3">

        <div style="display: flex; justify-content: center;">

        
        
        <?php
        require '../../banco.php';
        
        $stmt = $pdo->prepare("SELECT c.*, p.nome FROM tb_carro c JOIN tb_proprietario p ON c.id_proprietario = p.id ORDER BY c.entrada;");
        $stmt->execute();
        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            echo "<table>";
            echo "<thead>";
            echo "<td>Marca</td>"; echo "<td>Modelo</td>"; echo "<td>Ano</td>"; echo "<td>Cor</td>"; echo "<td>Placa</td>"; echo "<td>Valor</td>"; echo "<td>Entrada</td>";echo "<td>Proprietário</td>";echo "<td>Opções</td>";
            echo "</thead>";

            echo "<tbody>";
            
        

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["marca"] . "</td> ";
                echo "<td>" . $row["modelo"] . "</td> ";
                echo "<td>" . $row["ano"] . "</td>";
                echo "<td>" . $row["cor"] . "</td>";
                echo "<td>" . $row["placa"] . "</td>";
                echo "<td>" . $row["valor"] . "</td>";
                echo "<td>" . $row["entrada"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo '<td class=" gap-2">';
                echo '<a href="edit.php?id=' . $row["id"] .'" class="btn btn-sm btn-warning" style="margin-right: 5px;">Editar</a>';
                echo '<form action="/crud/functions/carro/deletar.php?id=' . $row["id"] .'" method="post" style="display:inline;">';
                
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

