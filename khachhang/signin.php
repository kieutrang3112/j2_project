<?php 
session_start();
if (isset($_SESSION['error'])) {
	echo $_SESSION['error'];
	unset($_SESSION['error']);
}

if (isset($_COOKIE['remember'])) {
	$token = $_COOKIE['remember'];
	require '../admin/connect.php';
	$sql = "select * from customers 
	where token = '$token' limit 1";
	$result = mysqli_query($connect,$sql);
	$number_rows = mysqli_num_rows($result);
	if (number_rows ==1) {
		$each = mysqli_fetch_array($result);
		$_SESSION['id_cus'] = $each['id'];
		$_SESSION['name_cus'] = $each['name'];
	}
	
}

if (isset($_SESSION['id_cus'])) {
	header('location:admin.php');
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>The Login Form</title>
    <link rel="stylesheet" href="style_form.css">
</head>
<body>
    <div class="wrap">
        <form class="login-form" method="post" action="process_signin.php">
            <div class="form-header">
                <h3>Đăng nhập</h3>
                
            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-input" placeholder="email@example.com">
            </div>
            <div class="form-group">
                <span style="color: red;" id="error_email"></span>
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-input" placeholder="password">
            </div>
            <div class="form-group">
                <span style="color: red;" id="error_password"></span>
            </div>
            <div class="form-group">
                Ghi nhớ đăng nhập
                <input type="checkbox" name="remember">
            </div>
            <!--Login Button-->
            <div class="form-group">                
                <button class="form-button" onclick="return check()">Đăng nhập</button>
            </div>
            <div class="form-footer">
                Don't have an account? <a href="signup.php">Sign Up</a>
            </div>
            <div class="form-footer">
                Forgot password? <a href="forgot_password.php">Quên mật khẩu</a>
            </div>
        </form>
    </div><!--/.wrap-->
    <?php require 'validate/signin_validate.js' ?>
</body>
</html>



