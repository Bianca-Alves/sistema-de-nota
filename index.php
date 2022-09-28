<?php

require "./connection/conectar.php";

$strSQL = "SELECT media_aluno FROM tb_alunos";

$consulta = mysqli_query($conexao, $strSQL);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Tabela de Notas</title>
</head>

<body id="class-notes">
    <h1>Dados Gerais</h1>
    <table>
        <tr>
            <td>Aprovados com mérito</td>
            <td>Aprovados</td>
            <td>Reprovados</td>
        </tr>

        <?php

        $a = 0;
        $b = 0;
        $c = 0;

        while ($linha = mysqli_fetch_array($consulta)) {

            if ($linha['media_aluno'] >= 9 && $linha['media_aluno'] <= 10.0) {

                $a = $a + 1;
            }

            if ($linha['media_aluno'] >= 6 && $linha['media_aluno'] <= 8.9) {

                $b = $b + 1;
            }

            if ($linha['media_aluno'] < 6) {

                $c = $c + 1;
            }
        }

        echo "<tr>";
        echo "<td>" . $a . "</td>";
        echo "<td>" . $b . "</td>";
        echo "<td>" . $c . "</td>";
        echo "</tr>";

        ?>

    </table>

    <h1>Tabela de Notas</h1>
    <table>
        <tr>
            <td>Aluno</td>
            <td>Nota 1</td>
            <td>Nota 2</td>
            <td>Nota 3</td>
            <td>Média</td>
        </tr>

        <?php

        $strSQL = "SELECT * FROM tb_alunos";

        $consulta = mysqli_query($conexao, $strSQL);

        while ($linha = mysqli_fetch_array($consulta)) {

            echo "<tr class='click'>";

            if ($linha['media_aluno'] >= 6) {

                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='#06cc00'>" . $linha['nome_aluno'] . "</font></a></td>";
                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='#06cc00'>" . $linha['nota1_aluno'] . "</font></a></td>";
                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='#06cc00'>" . $linha['nota2_aluno'] . "</font></a></td>";
                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='#06cc00'>" . $linha['nota3_aluno'] . "</font></a></td>";
                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='#06cc00'>" . $linha['media_aluno'] . "</font></a></td>";
            } else {

                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='red'>" . $linha['nome_aluno'] . "</font></a></td>";
                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='red'>" . $linha['nota1_aluno'] . "</font></a></td>";
                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='red'>" . $linha['nota2_aluno'] . "</font></a></td>";
                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='red'>" . $linha['nota3_aluno'] . "</font></a></td>";
                echo "<td><a href=./aluno.php?codigo=" . $linha['id_aluno'] . "><font color='red'>" . $linha['media_aluno'] . "</font></a></td>";
            }

            echo "</tr>";
        }

        require "./connection/desconectar.php";

        ?>

    </table>
    <hr>

    <form class="insert-student" method="post" action="./crud/insert.php">
        <input type="text" name="nome" placeholder="Nome" class="name" required>
        <div class="notes">
            <input type="number" name="nota1" placeholder="Nota 1" class="student-notes" min="0" max="10" required>
            <input type="number" name="nota2" placeholder="Nota 2" class="student-notes" min="0" max="10" required>
            <input type="number" name="nota3" placeholder="Nota 3" class="student-notes" min="0" max="10" required>
        </div>
        <button type="submit">Inserir Aluno</button>
    </form>

    <hr>
    <div class="buttons">
        <a href="./listar.php">
            <button class="list-student">Listar Alunos</button>
        </a>
        <a href="./status.php">
            <button class="list-student">Status dos Alunos</button>
        </a>
    </div>
</body>

</html>