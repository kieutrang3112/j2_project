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
		$_SESSION['id'] = $each['id'];
		$_SESSION['name'] = $each['name'];
	}
	
}

if (isset($_SESSION['id'])) {
	header('location:index.php');
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>The Login Form</title>
    <style>
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
    }
    html{
        height: 100%;
    }
    body{
        font-family: 'Segoe UI', sans-serif;;
        font-size: 1rem;
        line-height: 1.6;
        height: 100%;
    }
    .wrap {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fafafa;
    }
    .login-form{
        width: 350px;
        margin: 0 auto;
        border: 1px solid #ddd;
        padding: 2rem;
        background: #ffffff;
    }
    .form-input{
        background: #fafafa;
        border: 1px solid #eeeeee;
        padding: 12px;
        width: 100%;
    }
    .form-group{
        margin-bottom: 1rem;
    }
    .form-button{
        background: #69d2e7;
        border: 1px solid #ddd;
        color: #ffffff;
        padding: 10px;
        width: 100%;
        text-transform: uppercase;
    }
    .form-button:hover{
        background: #69c8e7;
    }
    .form-header{
        text-align: center;
        margin-bottom : 2rem;
    }
    .form-footer{
        text-align: center;
    }
    </style>
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
        </form>
    </div><!--/.wrap-->
    <?php require 'validate/signin_validate.js' ?>
</body>
</html>



