<?php

    require "./connection/conectar.php";

    $strSQL = "SELECT * FROM tb_alunos";

    $consulta = mysqli_query($conexao, $strSQL);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/main.css">
        <title>Tabela de Alunos</title>
    </head>
    <body id="class-notes">
        <h1>Tabela de Alunos</h1>
        <table class="alunos">
            <tr>
                <td>ID</td>
                <td>Aluno</td>
                <td>Nota 1</td>
                <td>Nota 2</td>
                <td>Nota 3</td>
                <td>Média</td>
                <td>Editar</td>
                <td>Deletar</td>
            </tr>

            <?php

                while ($linha = mysqli_fetch_array($consulta)) {

                        echo "<tr>";
                        echo "<td>" . $linha['id_aluno'] . "</td>";
                        echo "<td>" . $linha['nome_aluno'] . "</td>";
                        echo "<td>" . $linha['nota1_aluno'] . "</td>";
                        echo "<td>" . $linha['nota2_aluno'] . "</td>";
                        echo "<td>" . $linha['nota3_aluno'] . "</td>";
                        echo "<td>" . $linha['media_aluno'] . "</td>";
                        echo "<td>
                            <a href=./editar.php?codigo=" . $linha['id_aluno'] . ">
                                <img src='./img/icone_editar.png' width='30px'>
                            </a></td>";
				        echo "<td>
                            <a href=./deletar.php?codigo=" . $linha['id_aluno'] . ">
                                <img src='./img/icone_deletar.png' width='30px'>
                            </a></td>";
                        echo "</tr>";

                }

                require "./connection/desconectar.php";

            ?>
        </table>

        <hr class="two">
        <a href="./index.php">
            <button class="list-student">Voltar</button>
        </a>
    </body>
</html>