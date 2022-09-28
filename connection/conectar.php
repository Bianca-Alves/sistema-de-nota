<?php
    $conexao = mysqli_connect("localhost", "root", "", "bd_notas") or die (mysqli_error($conexao));
    mysqli_set_charset($conexao, 'utf8');
?>