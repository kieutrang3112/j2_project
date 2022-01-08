<?php
    $email = $_POST["mail"];
    $password = $_POST["pass"];
    if(isset($_POST["remember"])) {
        $remember =1 ;
    }
    else {
        $remember =0;
    }
    require_once "connect.php";
    $sql = "SELECT * FROM employees
        WHERE email='$email' and password = '$password'";
    $result =mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    if($num_row==1) {
        session_start();
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $each['name'];
        
        if($remember) {
            $token = uniqid('user_',  true);
            $sql_token = "UPDATE employees 
                    set token ='$token' WHERE id= '$id'";
            mysqli_query($connect,$sql_token);
            setcookie('remember',$token,time() + 60*60*24*30);
        }
        header("location: ../admin/root/index.php");
    }
    else {
        echo  "dang nhap sai";
    }
?>

