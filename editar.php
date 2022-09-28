<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/main.css">
        <title>Editar Aluno</title>
    </head>
    <body id="class-notes">
        <h1>Editar Aluno</h1>

        <?php

			$codigo = $_GET["codigo"];

			require "./connection/conectar.php";

			$sql = "SELECT id_aluno, nome_aluno, nota1_aluno, nota2_aluno, nota3_aluno FROM tb_alunos WHERE id_aluno = $codigo";

			$dados = mysqli_query($conexao, $sql);

			$membro = mysqli_fetch_array($dados);

			require "./connection/desconectar.php";

		?>

        <form class="insert-student" method="post" action="./crud/update.php">
            <div class="idname">
                <input type="number" name="id" class="id" value="<?php echo $membro["id_aluno"]; ?>" readonly>
                <input type="text" name="nome" placeholder="Nome" class="name2" value="<?php echo $membro["nome_aluno"]; ?>" required>
            </div>
            <div class="notes">
                <input type="number" name="nota1" placeholder="Nota 1" class="student-notes" min="0" max="10" value="<?php echo $membro["nota1_aluno"]; ?>" required>
                <input type="number" name="nota2" placeholder="Nota 2" class="student-notes" min="0" max="10" value="<?php echo $membro["nota2_aluno"]; ?>" required>
                <input type="number" name="nota3" placeholder="Nota 3" class="student-notes" min="0" max="10" value="<?php echo $membro["nota3_aluno"]; ?>" required>
            </div>
            <button type="submit">Editar</button>
        </form>

        <hr>
        <a href="./index.php">
            <button class="list-student">Voltar</button>
        </a>
    </body>
</html>