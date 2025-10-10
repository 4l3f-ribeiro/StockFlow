<?php
session_start();
require "conexao.php";

$id_funcionario = $_SESSION['id_funcionario'] ?? null;
$cod_empresa = $_SESSION['id_empresa'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa'] ?? '';
    $cor = $_POST['cor'] ?? '';
    $marca = $_POST['fabricante'] ?? '';
    $categoria = $_POST['carroceria'] ?? '';
    $statusveiculo = $_POST['status'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $tipo = $_POST['cambio'] ?? '';
    $valor = $_POST['valor'] ?? 0;
    $ano = $_POST['ano'] ?? 0;
    $custos_extra = $_POST['custos_extra'] ?? 0;

    $sql = "INSERT INTO veiculo 
        (placa, cor, fabricante, carroceria, statusveiculo, modelo, tipo, valor, ano, custos_extra, cod_empresa) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $con->error);
    }

    $stmt->bind_param(
        "sssssssdiid", 
        $placa, $cor, $marca, $categoria, $statusveiculo, $modelo, $tipo, $valor, $ano, $custos_extra, $cod_empresa
    );

    if ($stmt->execute()) {
        $idVeiculo = $stmt->insert_id;

        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (isset($_FILES['imagens'])) {
            foreach ($_FILES['imagens']['tmp_name'] as $key => $tmp_name) {
                $nomeArquivo = basename($_FILES['imagens']['name'][$key]);
                $caminhoFinal = $uploadDir . uniqid() . "_" . $nomeArquivo;

                if (move_uploaded_file($tmp_name, $caminhoFinal)) {
                    $sqlImg = "INSERT INTO imagem_veiculo (cod_veiculo, caminho_imagem) VALUES (?, ?)";
                    $stmtImg = $con->prepare($sqlImg);
                    $stmtImg->bind_param("is", $idVeiculo, $caminhoFinal);
                    $stmtImg->execute();
                    $stmtImg->close();
                }
            }
        }

        if ($id_funcionario === null) {
            header("Location: ../inicial-gerente.php");
        } else {
            header("Location: ../inicial-funcionario.php");
        }
        exit;
    } else {
        header("Location: cadastro_veiculo.php?erro=" . urlencode($stmt->error));
        exit;
    }

    $stmt->close();
}

$con->close();
?>
