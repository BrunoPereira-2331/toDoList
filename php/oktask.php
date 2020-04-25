<?php
require_once('db.php');
$conn = new DbConnection();

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y/m/d H:i:s', time());

$id = $_GET["id"];

$conn->updateStatus($id, $date);
$conn=null;

header("Location: ../index.php");
?>