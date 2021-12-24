<?php
include_once "../root/header.php";
include_once "../root/sidebar.php";
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
            <h1 class="page-header">Quản lý danh mục</h1>
            <a href="index.php"><button type="button" class="btn btn-primary ">Danh sách</button></a>
        </div>

    </div>

    <form  style="padding-top: 20px" method="post" action="process_create.php">
        <div class="form-group">

            <input type="text" class="form-control" required placeholder="Nhập tên" name="name">

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
