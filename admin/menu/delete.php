<?php
$id = $_GET["id"];
require_once "../root/connect.php";
//    $sql = "INSERT INTO manufacturers(name) VALUES ('$name')";
$sql = "DELETE FROM menu WHERE id='$id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php");
?>
