<!-- 
<?php
include 'db.php';

$nome = $_POST['nome_professor'];
$disciplina = $_POST['disciplina'];

$sql = "INSERT INTO professor (nome_professor, disciplina) VALUES ('$nome', '$disciplina')";

if ($conn->query($sql) === TRUE) {
    echo "Professor cadastrado com sucesso!<br>";
    echo "<a href='listar.php'>Ver Lista</a>";
} else {
    echo "Erro: " . $conn->error;
}
?> -->
