<?php

require ("conexao.php");

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idUser"])){
    $idUsuario = trim($_POST["idUser"]);

    $sql = "DELETE FROM funcionario WHERE id_funcionario = ?";

    $stmt = $con -> prepare($sql);
    $stmt -> bind_param("i", $idUsuario);
    $stmt -> execute();

    if($stmt -> affected_rows > 0){
        echo '<script>console.log("usuario excluido com sucesso")</script>';
    }else{
        echo '<script>console.log("erro na execução")</script>';
    }

    $stmt -> close();
    $con -> close();

    

} else {
    echo '<script>console.log("id não recebido")</script>';
}

