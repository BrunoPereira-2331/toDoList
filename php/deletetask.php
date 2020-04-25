<?php
require_once('db.php');
$conn = new DbConnection();

$id = $_GET["id"];
$conn->deleteTask($id);
$conn=null;
header("Location: ../index.php")
?>