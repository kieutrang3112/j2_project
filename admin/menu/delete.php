<?php
 require '../check_super_admin_login.php'; 
?>
<?php
$id = $_GET["id"];
require_once "../connect.php";
//    $sql = "INSERT INTO manufacturers(name) VALUES ('$name')";
$sql = "DELETE FROM menu WHERE id='$id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php");
?>
