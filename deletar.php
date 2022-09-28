<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/main.css">
        <title>Deletar Aluno</title>
    </head>
    <body id="class-notes">
        <h1>Deseja realmente deletar este aluno?</h1>

        <?php

			$codigo = $_GET["codigo"];

			require "./connection/conectar.php";

			$sql = "SELECT id_aluno, nome_aluno, nota1_aluno, nota2_aluno, nota3_aluno FROM tb_alunos WHERE id_aluno = $codigo";

			$dados = mysqli_query($conexao, $sql);

			$membro = mysqli_fetch_array($dados);

			require "./connection/desconectar.php";

		?>

        <form class="insert-student" method="post" action="./crud/delete.php">
            <div class="idname">
                <input type="number" name="id" class="id" value="<?php echo $membro["id_aluno"]; ?>" readonly>
                <input type="text" name="nome" class="name2" value="<?php echo $membro["nome_aluno"]; ?>" readonly>
            </div>
            <div class="notes">
                <input type="number" name="nota1" class="student-notes" value="<?php echo $membro["nota1_aluno"]; ?>" readonly>
                <input type="number" name="nota2" class="student-notes" value="<?php echo $membro["nota2_aluno"]; ?>" readonly>
                <input type="number" name="nota3" class="student-notes" value="<?php echo $membro["nota3_aluno"]; ?>" readonly>
            </div>
            <button type="submit" class="deletar">Deletar</button>
        </form>

        <hr>
        <a href="./index.php">
            <button class="list-student">Voltar</button>
        </a>
    </body>
</html>