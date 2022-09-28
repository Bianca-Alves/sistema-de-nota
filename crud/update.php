<?php

    require "../connection/conectar.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    $media = ($nota1 + $nota2 + $nota3) / 3;

    $strSQL = mysqli_query($conexao, "UPDATE tb_alunos SET nome_aluno='$nome', nota1_aluno='$nota1', nota2_aluno='$nota2', 
    nota3_aluno='$nota3', media_aluno='$media' WHERE id_aluno='$id'") or die (mysqli_error($conexao, $strSQL));

    header("Location: ../listar.php");

?>