
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

    <form  style="padding-top: 20px" method="post" action="process_update.php">
        <div class="form-group">
            <?php
            $id = $_GET["id"];
            include_once "../root/connect.php";
            $sql = "SELECT * FROM menu WHERE id='$id'";
            $row=mysqli_query($connect,$sql);
            $each = mysqli_fetch_array($row);
            ?>
            <label for="">Tên:</label>
            <input type="hidden" class="form-control" value="<?php echo $id ?>" name="id">

            <input type="text" required class="form-control" placeholder="Nhập tên" name="name" value=" <?php echo $each["name"] ?>"

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php

include_once "../root/footer.php";
?>

