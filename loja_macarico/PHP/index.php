<?php
include 'db_connection.php';

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Produtos Disponíveis</h1>";
    echo "<table border='1'>
           <tr>
               <th>ID</th>
               <th>Nome</th>
               <th>Descrição</th>
               <th>Preço</th>
               <th>Quantidade em Estoque</th>
           </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nome']."</td>
                <td>".$row['descricao']."</td>
                <td>".$row['preco']."</td>
                <td>".$row['quantidade_estoque']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto disponível.";
}

$conn->close();
?>
