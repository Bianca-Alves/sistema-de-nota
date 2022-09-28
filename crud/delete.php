<?php

    require "../connection/conectar.php";

    $id = $_POST['id'];

    $strSQL = mysqli_query($conexao, "DELETE FROM tb_alunos WHERE id_aluno='$id'") or die (mysqli_error($conexao, $strSQL));

    header("Location: ../listar.php");

?>