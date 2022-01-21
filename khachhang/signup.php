

<!DOCTYPE html>
<html>
<head>
    <title>The Login Form</title>
    <link rel="stylesheet" href="style_form.css">
</head>
<body>
	<?php	
	session_start();
	if (isset($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
	?>
    <div class="wrap">
        <form class="login-form" method="post" action="process_signup.php" >
            <div class="form-header">
                <h3>Đăng Ký</h3>
                
            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="text" id="name" name="name" class="form-input" placeholder="Nhập tên">
            </div>
            <div class="form-group">
                <span style="color: red;" id="error_name"></span>
            </div>

            <!--Password Input-->
            <div class="form-group">
                <input type="text" id="phone" name="phone" class="form-input" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <span style="color: red;" id="error_phone"></span>
            </div>

            <div class="form-group">
                <span style="font-weight: 350;">Giới tính:</span>
                <input type="radio" name="gender" value="1"><span style="font-weight: 350;">Nam</span>
                <input type="radio" name="gender" value="0"><span style="font-weight: 350;">Nữ</span>
            </div>
            <div class="form-group">
                <span style="color: red;" id="error_gender"></span>
            </div>

            <div class="form-group">
                <input type="text" id="address" name="address" class="form-input" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
                <span style="color: red;" id="error_address"></span>
            </div>

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
            <!--Login Button-->
            <div class="form-group">                
                <button class="form-button" onclick="return check()">Đăng ký</button>
            </div>
            
        </form>
    </div><!--/.wrap-->
    <?php require 'validate/signup_validate.js' ?>
</body>
</html>