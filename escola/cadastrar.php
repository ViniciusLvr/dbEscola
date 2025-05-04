<?php
include 'db.php';

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? null;
$termo = $_POST['termo'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Professores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="nav">
        <a href="professores.php">Listar</a>
        <a href="professores.php?action=cadastrar">Cadastrar</a>
        <a href="professores.php?action=buscar">Buscar</a>
    </div>

    <?php
    if ($action === 'remover' && $id) {
        $id = intval($id);
        $sql = "DELETE FROM professor WHERE id_professor = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='success'>Professor removido com sucesso.</div>";
        } else {
            echo "Erro ao remover: " . $conn->error;
        }
    }

    if ($action === 'cadastrar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome_professor'] ?? '';
        $disciplina = $_POST['disciplina'] ?? '';

        if ($nome && $disciplina) {
            $sql = "INSERT INTO professor (nome_professor, disciplina) VALUES ('$nome', '$disciplina')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='success'>Professor cadastrado com sucesso!</div>";
            } else {
                echo "Erro: " . $conn->error;
            }
        } else {
            echo "Preencha todos os campos.";
        }
    }

    if ($action === 'cadastrar') {
    ?>
        <h2>Cadastrar Professor</h2>
        <form action="professores.php?action=cadastrar" method="post">
            <label>Nome:</label>
            <input type="text" name="nome_professor" required>
            <label>Disciplina:</label>
            <input type="text" name="disciplina" required>
            <input type="submit" value="Salvar">
        </form>
    <?php
    } elseif ($action === 'buscar') {
    ?>
        <h2>Buscar Professores</h2>
        <form method="post" action="professores.php?action=buscar">
            <input type="text" name="termo" placeholder="Digite o nome ou disciplina" value="<?= htmlspecialchars($termo) ?>">
            <input type="submit" value="Buscar">
        </form><br>

        <?php
        if ($termo) {
            $sql = "SELECT * FROM professor WHERE nome_professor LIKE '%$termo%' OR disciplina LIKE '%$termo%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='professor'>";
                    echo "ID: " . $row['id_professor'] . " | Nome: " . $row['nome_professor'] . " | Disciplina: " . $row['disciplina'];
                    echo " | <a href='professores.php?action=remover&id=" . $row['id_professor'] . "' onclick='return confirm(\"Deseja remover este professor?\")'>Remover</a>";
                    echo "</div>";
                }
            } else {
                echo "Nenhum resultado encontrado.";
            }
        }
    } else {
        echo "<h2>Lista de Professores</h2>";
        $result = $conn->query("SELECT * FROM professor");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='professor'>";
                echo "ID: " . $row['id_professor'] . " | Nome: " . $row['nome_professor'] . " | Disciplina: " . $row['disciplina'];
                echo "</div>";
            }
        } else {
            echo "Nenhum professor cadastrado.";
        }
    }
    ?>
</div>
</body>
</html>
