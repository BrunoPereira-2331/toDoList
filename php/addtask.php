<?php
require_once('db.php');
$conn = new DbConnection();

$name = $_GET["nome"];
$status = $_GET["checkboxStatus"];
$conn->insertTask($name, $status);

$conn = null;
header("Location: ../index.php");
?>