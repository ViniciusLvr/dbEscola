
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Professor</title>
</head>
<body>
    <h2>Cadastro de Professor</h2>
    <form action="salvar.php" method="post">
        Nome: <input type="text" name="nome_professor"><br><br>
        Disciplina: <input type="text" name="disciplina"><br><br>
        <input type="submit" value="Salvar">
    </form>
    <br>
    <a href="listar.php">Ver Professores Cadastrados</a>
</body>
</html>
