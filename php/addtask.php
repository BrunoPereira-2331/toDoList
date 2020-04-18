<?php
require_once('db.php');
$db = new dbconnection();
$conn = $db->f_obtem_conexao();
if ($conn->connect_error) {
    die("A conexão falhou: " . $conn->connect_error);
}
$name = $_GET["nome"];
$status = $_GET["checkboxStatus"];
if ($status == "finalizada") {
    $sql = "INSERT INTO list (name, status) VALUES ('".$name."', '".$status."')";
}
else {
    $sql = "INSERT INTO list (name) VALUES ('".$name."')";
}
    
if (!($conn->query($sql) === TRUE)) {
    $conn->close();
    die("Erro: " . $sql . "<br>" . $conn->error);
}
$conn->close();
header("Location: ../index.php");
?>