
<?php
$host = "172.30.21.100";
$user = "Escola";
$pass = "school2025";
$db   = "escola_newG"; // nome do banco

$conn = new mysqli($host, $user, $pass, $db);

// Verifica a conexão
if ($conn->connect_error) {
    echo("Falha na conexão: " . $conn->connect_error);
}
?>
