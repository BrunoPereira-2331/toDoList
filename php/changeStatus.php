<?php
require_once('db.php');
$db = new dbconnection();
$conn = $db->f_obtem_conexao();

if ($conn->connect_error) {
    die("A conexão falhou: " . $conn->connect_error);
}
// Busca nome que foi recebido via get através do formulário de cadastro
$id = $_GET["id"];
$status = $_GET["changeStatus"];
if ($status == "finalizada") {
    $sql = "UPDATE list SET status = 'não finalizada' WHERE id = ". $id;
}
else {
    $sql = "UPDATE list SET status = 'finalizada' WHERE id = ". $id;
}

if (!($conn->query($sql) === TRUE)) {
    $conn->close();
    die("Erro: " . $sql . "<br>" . $conn->error);
}
$conn->close();
header("Location: ../index.php");
?>