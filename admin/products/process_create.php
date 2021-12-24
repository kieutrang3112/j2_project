<?php
    $name = $_POST["name"];
    $photo= $_FILES["photo"];
    $price = $_POST["price"];
    $desc = $_POST["desc"];
    $manu_id = $_POST["manu_id"];
    $menu_id = $_POST["menu_id"];
    $folder = 'photo/';
    $file_exten = explode('.',$photo["name"])[1];
    $file_name = time().'.'. $file_exten;
    $path_file = $folder .$file_name;

    move_uploaded_file($photo["tmp_name"], $path_file);


    require_once "../root/connect.php";
    $sql = "INSERT INTO products(name,photo,price,description,manufacturer_id,menu_id)
    VALUES ('$name','$file_name','$price','$desc','$manu_id','$menu_id')";

    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header("location: index.php");

?>