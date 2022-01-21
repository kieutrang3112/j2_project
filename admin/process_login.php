<?php
    $email = $_POST["email"];
    $password = $_POST["password"];
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
        $_SESSION['level'] = $each['level'];

        if($remember) {
            $token = uniqid('user_',  true);
            $sql_token = "UPDATE employees 
                    set token ='$token' WHERE id= '$id'";
            mysqli_query($connect,$sql_token);
            setcookie('remember',$token,time() + 60*60*24*30);
        }
        header("location: ../admin/admin.php");

    }
    else {
        echo  "dang nhap sai";
    }
?>

<!--đăng nhập-->
<?php
session_start();
if(isset($_COOKIE['remember'])) {
    $token = $_COOKIE['remember'];

    require_once "connect.php";
    $sql="SELECT * FROM employees
        WHERE token='$token' ";
    $result =mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
    $_SESSION['level'] = $each['level'];
    header("location: ../admin/admin.php");
}
if(isset($_SESSION['id'])) {
    header("location: ../admin/admin.php");
    exit();
}

include_once "header.php";


?>



