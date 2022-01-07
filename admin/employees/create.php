<?php
include_once "../root/header.php";
include_once "../root/sidebar.php";
include_once "../root/connect.php";
$sql = "SELECT * FROM employees";
$result= mysqli_query($connect,$sql);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="#">
                </a>
            </li>
            <li class="active">Tổng quan</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Thêm nhân viên</h1>
            <a href="index.php"><button type="button" class="btn btn-primary ">Danh sách</button></a>
        </div>

    </div>

    <form  style="padding-top: 20px" method="post" action="process_create.php">
        <div class="form-group">
            <label for="">Tên:</label>
            <input type="text" class="form-control" required placeholder="Nhập tên" name="name">
            <br>
            <label for="">SDT:</label>
            <input type="text" class="form-control" required placeholder="Nhập tên" name="phone">
            <br>
            <label for="">Email:</label>
            <input type="email" class="form-control" required placeholder="Nhập tên" name="email">
            <br>
            <label for="">Mật khẩu:</label>
            <input type="password" class="form-control" required placeholder="Nhập tên" name="password">
            <br>
            <label for="">Địa chỉ:</label>
            <input type="text" class="form-control" required placeholder="Nhập tên" name="address">

            <label>Danh mục</label>
            <select class="form-control" name="level">
                <option>---Chọn---</option>
                <?php foreach ($result as $each) { ?>

                    <option value="<?php echo $each["levels"]?>">
                        <?php if($each["levels"]==0) {?>
                            Quản Lý

                        <?php } else echo "Nhân viên"?>
                    </option>

                <?php } ?>
            </select>

        </div>
        <div class="form-group">

        </div>

        <!--        <div class="form-check">-->
        <!--            <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
        <!--            <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
        <!--        </div>-->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php

include_once "../root/footer.php";
?>
