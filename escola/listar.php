<!-- <html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<?php
include 'db.php';

$result = $conn->query("SELECT * FROM professor");

echo "<h2>Lista de Professores</h2>";
echo "<a href='cadastrar.php'>Novo Cadastro</a><br><br>";
echo "<div class='listagem'>";
while ($row = $result->fetch_assoc()) {
    echo "<div class='professor'>";
    echo "ID: " . $row['id_professor'] . " | Nome: " . $row['nome_professor'] . " | Disciplina: " . $row['disciplina'] . "<br>";
    echo "</div>";
}echo"</div>";
?>
</html> -->