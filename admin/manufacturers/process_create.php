<?php
    $name = $_POST["name"];
    $menu_id = $_POST["menu_id"];
    require_once "../root/connect.php";
//    $sql = "INSERT INTO manufacturers(name) VALUES ('$name')";
    $sql = "INSERT INTO manufactures(name,menu_id)
    VALUES('$name','$menu_id')";

    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header("location: index.php");

?>

