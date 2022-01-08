<?php
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$level = $_POST["level"];
$address = $_POST["address"];
$working_year =  date("Y");
require_once "../connect.php";

//    $sql = "INSERT INTO manufacturers(name) VALUES ('$name')";
$sql = "INSERT INTO employees(name,phone,email,password,levels,address,working_year)
    VALUES('$name','$phone','$email','$password','$level','$address','$working_year')";


mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php");


?>