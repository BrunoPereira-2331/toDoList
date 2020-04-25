<?php
require_once('db.php');
$conn = new DbConnection();

$id = $_GET["id"];
$status = $_GET["changeStatus"];

$conn->changeStatus($id, $status);
$conn = null;

header("Location:../index.php");
?>