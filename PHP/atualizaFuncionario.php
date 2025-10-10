<?php
session_start();
include("conexao.php");

$nome = $_POST['consulta_nome'] ?? '';
$email = $_POST['consulta_email'] ?? '';
$telefone = $_POST['consulta_telefone'] ?? '';
$cpf = $_POST['consulta_cpf'] ?? '';
$id = $_POST['consulta_id_funcionario'] ?? '';

$sql = "UPDATE funcionario SET nome=?, email=?, telefone=?, cpf=? WHERE id_funcionario = ?";

$stmt = $con -> prepare($sql);
$stmt -> bind_param("ssssi", $nome, $email, $telefone, $cpf, $id);
$stmt -> execute();


$stmt -> close();
$con -> close();


header("Location: ../pagina-funcionario.php");
exit();
?>