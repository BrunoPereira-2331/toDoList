<?php
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y/m/d H:i:s', time());

require_once('db.php');
$db = new dbconnection();
$conn = $db->f_obtem_conexao();

if ($conn->connect_error) {
    die("Falha na conexão: ". $conn->connect_error);
}

$id = $_GET["id"];
$sql = "UPDATE list SET status = 'finalizada', date ='" .$date. "' WHERE id=".$id;

if (!($conn->query($sql) === TRUE)) {
    $conn->close();
    die("Erro ao atualizar: " . $conn->error);
}

$conn->close();
header("Location: ../index.php");
?>