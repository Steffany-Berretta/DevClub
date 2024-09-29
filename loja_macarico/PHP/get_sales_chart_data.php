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

// Query para obter dados de vendas agrupados por mês
$sql = "SELECT 
            DATE_FORMAT(data_venda, '%Y-%m') AS mes,
            SUM(quantidade * preco) AS total_vendas
        FROM vendas
        JOIN produtos ON vendas.id_produto = produtos.id_produto
        GROUP BY DATE_FORMAT(data_venda, '%Y-%m')
        ORDER BY mes";

$result = $conn->query($sql);

$sales_data = [
    'labels' => [],
    'values' => []
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sales_data['labels'][] = $row['mes'];
        $sales_data['values'][] = $row['total_vendas'];
    }
}

// Retorna os dados em formato JSON
echo json_encode($sales_data);

$conn->close();
?>
