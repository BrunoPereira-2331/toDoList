<?php

require_once('db.php');
$db = new dbconnection();
$conn = $db->f_obtem_conexao();

if ($conn->connect_error) {
    die("A conexão falhou: "
        . $conn->connect_error);
}

$id = $_GET["id"];
$sql = "DELETE FROM list WHERE id=".$id;
if (!($conn->query($sql) === TRUE)) {
    die("Erro ao excluir: "
        . $conn->error);
}
$conn->close();
header("Location: ../index.php")
?>