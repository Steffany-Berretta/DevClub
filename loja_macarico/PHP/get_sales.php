<?php
$servername = "localhost";
$username = "root";
$password = "W/&Q<!t?4*d6]XjFa(-Cu;";
$dbname = "Macarico_DB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT vendas.id_venda, vendas.data_venda, clientes.nome AS cliente, produtos.nome_produto, vendas.quantidade, 
               (vendas.quantidade * produtos.preco) AS valor
        FROM vendas
        JOIN clientes ON vendas.id_cliente = clientes.id_cliente
        JOIN produtos ON vendas.id_produto = produtos.id_produto
        ORDER BY vendas.data_venda DESC";

$result = $conn->query($sql);

$vendas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vendas[] = $row;
    }
}

echo json_encode($vendas);

$conn->close();
?>
