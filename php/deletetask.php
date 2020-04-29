<?php
require_once('db.php');
$conn = new DbConnection();

$id = $_GET["id"];
$type = $_GET["type"];
if ($type == "history") {
    $conn->deleteHistoryTask($id);
    header("Location: history.php");
} elseif ($type == "deleteHistory") {
    $conn->deleteHistoryAll();
    header("Location: history.php");
}
else {
    $conn->deleteTask($id);
    header("Location: ../index.php");
}
$conn=null;
?>