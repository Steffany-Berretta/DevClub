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

// Query para obter os clientes mais ativos
$sql = "SELECT clientes.nome, COUNT(vendas.id_venda) AS total_compras
        FROM vendas
        JOIN clientes ON vendas.id_cliente = clientes.id_cliente
        GROUP BY clientes.nome
        ORDER BY total_compras DESC
        LIMIT 10";

$result = $conn->query($sql);

$clients = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clients[] = $row;
    }
}

// Retorna os dados em formato JSON
echo json_encode($clients);

$conn->close();
?>
