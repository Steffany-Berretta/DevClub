<?php
$servername = "localhost";
$username = "root";
$password = "W/&Q<!t?4*d6]XjFa(-Cu;";
$dbname = "Macarico_DB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Sanitizar os dados de entrada
$cliente = $conn->real_escape_string($_POST['cliente']);
$produto = $conn->real_escape_string($_POST['produto']);
$quantidade = (int)$_POST['quantidade'];
$data_venda = $conn->real_escape_string($_POST['data_venda']);

// Obter ID do cliente
$cliente_id_query = "SELECT id_cliente FROM clientes WHERE nome = '$cliente' LIMIT 1";
$cliente_result = $conn->query($cliente_id_query);

if ($cliente_result->num_rows > 0) {
    $cliente_id = $cliente_result->fetch_assoc()['id_cliente'];
} else {
    echo json_encode(['status' => 'error', 'message' => 'Cliente não encontrado']);
    $conn->close();
    exit;
}

// Obter ID do produto
$produto_id_query = "SELECT id_produto FROM produtos WHERE nome_produto = '$produto' LIMIT 1";
$produto_result = $conn->query($produto_id_query);

if ($produto_result->num_rows > 0) {
    $produto_id = $produto_result->fetch_assoc()['id_produto'];
} else {
    echo json_encode(['status' => 'error', 'message' => 'Produto não encontrado']);
    $conn->close();
    exit;
}

// Inserir a venda no banco de dados
$sql = "INSERT INTO vendas (data_venda, id_cliente, id_produto, quantidade) 
        VALUES ('$data_venda', $cliente_id, $produto_id, $quantidade)";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}

$conn->close();
?>
