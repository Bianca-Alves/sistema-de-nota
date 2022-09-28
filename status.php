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
        <title>Status dos Alunos</title>
    </head>
    <body id="class-notes">
        <h1>Status dos Alunos</h1>
        <table>
            <tr>
                <td>Aluno</td>
                <td>Nota</td>
                <td>Status</td>
            </tr>

            <?php

                while ($linha = mysqli_fetch_array($consulta)) {

                        echo "<tr>";
                        echo "<td>" . $linha['nome_aluno'] . "</td>";
                        echo "<td>" . $linha['media_aluno'] . "</td>";
                        if ($linha['media_aluno'] >= 9 && $linha['media_aluno'] <= 10.0) {
                            echo "<td>Aprovado com mérito</td>";
                        }
                        if ($linha['media_aluno'] >= 6 && $linha['media_aluno'] <= 8.9) {
                            echo "<td>Aprovado</td>";
                        }
                        if ($linha['media_aluno'] < 6) {
                            echo "<td>Reprovado</td>";
                        }
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