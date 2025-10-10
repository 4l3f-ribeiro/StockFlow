<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "conexao.php";

$id = $_POST["id_empresa"];
$nome_fantasia = trim($_POST['nome_fantasia']);
$telefone = trim($_POST['telefone']);
$cnpj = trim($_POST['cnpj']);
$email = trim($_POST['email']);
$cep = trim($_POST['cep']);
$rua = trim($_POST['endereco']);
$numero = trim($_POST['numero']);
$bairro = trim($_POST['bairro']);
$cidade = trim($_POST['cidade']);
$estado = trim($_POST['estado']);

if (
    empty($id) || empty($nome_fantasia) || empty($telefone) || empty($cnpj) || empty($email) || 
    empty($cep) || empty($rua) || empty($numero) || empty($bairro) || empty($cidade) || empty($estado)
) {
    echo "<script>
            alert('Preencha todos os campos!');
            window.history.back();
          </script>";
    exit;
}

$sql = "UPDATE empresa 
        SET nome_fantasia = ?, telefone = ?, cnpj = ?, email = ?, cep = ?, 
            endereco = ?, numero = ?, bairro = ?, cidade = ?, estado = ? 
        WHERE id_empresa = ?";

$stmt = $con->prepare($sql);

if (!$stmt) {
    die("Erro no prepare: " . $con->error);
}

$stmt->bind_param(
    "ssssssssssi",
    $nome_fantasia,
    $telefone,
    $cnpj,
    $email,
    $cep,
    $rua,
    $numero,
    $bairro,
    $cidade,
    $estado,
    $id
);

if ($stmt->execute()) {
    echo "<script>
            alert('Alterado com sucesso!');
            setTimeout(function(){
                window.location.href='../perfilEmpresa.php';
            }, 1000);
          </script>";
} else {
    echo "<script>
            alert('Erro na alteração!');
            setTimeout(function(){
                window.location.href='../perfilEmpresa.php';
            }, 1000);
          </script>";
}

$stmt->close();
$con->close();
?>
