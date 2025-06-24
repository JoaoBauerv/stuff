<?php include '../../components/header.php'; ?>



<?php
// echo '<pre>';
// print_r($_GET);
// echo '</pre>';


?>

        


<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    <main class="px-3">
        
      <h1>Carros do <?php 
      $dados = array(
      ':id' => $_GET['id']
      );

      $sql = "SELECT nome from tb_proprietario where id = :id ";
      $stmt = $pdo->prepare($sql);
      $stmt->execute($dados);
      $proprietario = $stmt->fetch(PDO::FETCH_ASSOC);
      echo htmlspecialchars($proprietario['nome'] ?? 'Desconhecido');
      ?></h1>

        
      
      <div style="display: flex; justify-content: center;">

        
        
        <?php
       
        // print_r($dados);
        
        $sql = "SELECT c.*, p.nome FROM tb_carro c JOIN tb_proprietario p ON c.id_proprietario = p.id WHERE c.id_proprietario = :id ORDER BY c.entrada ;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($dados);
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
                echo '<a href="edit.php?id=' . $row["id"] .'" class="btn btn-sm btn-warning">Editar</a>';
                echo '<form action="/CarManager/functions/carro/deletar.php?id=' . $row["id"] .'" method="post" style="display:inline;">';
                
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

