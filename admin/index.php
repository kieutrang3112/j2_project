<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">

    <link href="css/styles.css" rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Vietpro Mobile Shop - Administrator</div>
            <div class="panel-body">
                <div class="alert alert-danger">Tài khoản không hợp lệ !</div>
                <form role="form" method="post" action="process_login.php">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" required placeholder="E-mail" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" required placeholder="Mật khẩu" name="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember" >Nhớ tài khoản
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

</body>
</html>