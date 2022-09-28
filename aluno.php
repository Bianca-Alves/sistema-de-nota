<?php

$codigo = $_GET["codigo"];

require "./connection/conectar.php";

$sql = "SELECT * FROM tb_alunos WHERE id_aluno = $codigo";

$dados = mysqli_query($conexao, $sql);

$membro = mysqli_fetch_array($dados);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title><?php echo $membro["nome_aluno"]; ?></title>
</head>

<body id="class-notes">
    <h1><?php echo $membro["nome_aluno"]; ?></h1>

    <table class="aluno">
        <tr>
            <td>ID</td>
            <td>Aluno</td>
            <td>Nota 1</td>
            <td>Nota 2</td>
            <td>Nota 3</td>
            <td>Média</td>
            <td>Status</td>
            <td>Editar</td>
            <td>Deletar</td>
        </tr>

        <?php

        echo "<tr>";
        echo "<td>" . $membro['id_aluno'] . "</td>";
        echo "<td>" . $membro['nome_aluno'] . "</td>";
        echo "<td>" . $membro['nota1_aluno'] . "</td>";
        echo "<td>" . $membro['nota2_aluno'] . "</td>";
        echo "<td>" . $membro['nota3_aluno'] . "</td>";
        echo "<td>" . $membro['media_aluno'] . "</td>";
        if ($membro['media_aluno'] >= 9 && $membro['media_aluno'] <= 10.0) {
            echo "<td>Aprovado com mérito</td>";
        }
        if ($membro['media_aluno'] >= 6 && $membro['media_aluno'] <= 8.9) {
            echo "<td>Aprovado</td>";
        }
        if ($membro['media_aluno'] < 6) {
            echo "<td>Reprovado</td>";
        }
        echo "<td>
                <a href=./editar.php?codigo=" . $membro['id_aluno'] . ">
                    <img src='./img/icone_editar.png' width='30px'>
                </a></td>";
        echo "<td>
                <a href=./deletar.php?codigo=" . $membro['id_aluno'] . ">
                    <img src='./img/icone_deletar.png' width='30px'>
                </a></td>";
        echo "</tr>";

        require "./connection/desconectar.php";

        ?>
    
    </table>

    <hr class="two">
        <a href="./index.php">
            <button class="list-student">Voltar</button>
        </a>
    </body>
</html>