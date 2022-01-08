<?php
$id = $_POST["id"];
$name = $_POST["name"];


require_once '../connect.php';
$sql = "UPDATE menu
    SET    
    name = '$name'
 
    WHERE id = '$id'
    ";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: index.php");

?>

