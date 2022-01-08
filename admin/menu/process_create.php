<?php
$name = $_POST["name"];

require_once "../connect.php";
//    $sql = "INSERT INTO manufacturers(name) VALUES ('$name')";
$sql = "INSERT INTO menu(name)
    VALUES('$name')";

mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php");

?>


