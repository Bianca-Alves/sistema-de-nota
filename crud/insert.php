<?php

    require "../connection/conectar.php";

    $nome = $_POST['nome'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    $media = ($nota1 + $nota2 + $nota3) / 3;

    $strSQL = mysqli_query($conexao, "INSERT INTO tb_alunos VALUES ('', '".$nome."', '".$nota1."', '".$nota2."', 
    '".$nota3."', '".$media."')") or die (mysqli_error($conexao, $strSQL));

    header("Location: ../index.php");

?>