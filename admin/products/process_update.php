<?php
$id = $_POST["id"];
$name = $_POST["name"];
$new_photo = $_FILES["new_photo"];
if($new_photo['size'] >0) {
    $folder = 'photo/';
    $file_exten = explode('.',$new_photo["name"])[1];
    $file_name = time().'.'. $file_exten;
    $path_file = $folder .$file_name;
    move_uploaded_file($new_photo["tmp_name"], $path_file);
}
else {
    $file_name= $_POST["photo_old"];
}

$price = $_POST["price"];
$desc = $_POST["desc"];
$manu_id = $_POST["manu_id"];
$menu_id = $_POST["menu_id"];



require_once "../root/connect.php";
$sql = "UPDATE products 

    SET 
    name= '$name',
    photo= '$file_name',
    price= '$price',
    description= '$desc',
    manufacturer_id  = '$manu_id',
    menu_id = '$menu_id'
    WHERE id = '$id';
    ";

//die($sql);
mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php");

?>
