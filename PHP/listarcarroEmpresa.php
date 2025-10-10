<?php
session_start();
require "conexao.php";

$cod_empresa = $_SESSION['id_empresa'];


$stmt = $con->prepare("
    SELECT v.id_veiculo, v.placa, v.cor, v.fabricante, v.carroceria, 
           v.statusveiculo, v.modelo, v.tipo, v.valor, v.ano, v.custos_extra, 
           i.caminho_imagem
    FROM veiculo v
    LEFT JOIN imagem_veiculo i ON v.id_veiculo = i.cod_veiculo
    WHERE v.cod_empresa = ?
");
$stmt->bind_param("s", $cod_empresa);
$stmt->execute();
$result = $stmt->get_result();


$carros = [];
while ($row = $result->fetch_assoc()) {
    $id = $row['id_veiculo'];

    if (!isset($carros[$id])) {
        $carros[$id] = $row;
        $carros[$id]['imagens'] = [];
    }

   
    if ($row['caminho_imagem']) {
        $carros[$id]['imagens'][] = $row['caminho_imagem'];
    }

    
    unset($carros[$id]['caminho_imagem']);
}


$carros = array_values($carros);

header('Content-Type: application/json');
echo json_encode($carros);
?>
