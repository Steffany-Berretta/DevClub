<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "W/&Q<!t?4*d6]XjFa(-Cu;";
$dbname = "Macarico_DB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Query para obter o resumo do inventário
$sql = "SELECT 
            SUM(produtos.preco * produtos.quantidade_em_estoque) AS valor_inventario,
            SUM(produtos.quantidade_em_estoque) AS quantidade_estoque,
            (SELECT SUM(quantidade) FROM vendas WHERE status = 'pendente') AS quantidade_receber
        FROM produtos";

$result = $conn->query($sql);

$inventory = [];

if ($result->num_rows > 0) {
    $inventory = $result->fetch_assoc();
}

// Retorna os dados em formato JSON
echo json_encode($inventory);

$conn->close();
?>
