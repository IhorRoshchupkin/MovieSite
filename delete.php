<?php
$id = $_GET['id'];

require_once("functions.php");

$query = "DELETE FROM employees WHERE id=$id";
mysqli_query($conn, $query);

header("Location: index.php");
?>