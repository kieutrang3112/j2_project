<?php
 require '../check_super_admin_login.php'; 
?>
<?php
include_once "../header.php";
include_once "../sidebar.php";
include_once "../connect.php";
$sql = "SELECT * FROM menu";
$result_menu = mysqli_query($connect,$sql);
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
            include_once "../connect.php";
            $sql = "SELECT * FROM manufactures WHERE id='$id'";
            $row=mysqli_query($connect,$sql);
            $each = mysqli_fetch_array($row);
            ?>
            <input type="hidden" class="form-control" value="<?php echo $id ?>" name="id">

            <div class="form-group">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name="manu_id">
                        <option>---Chọn---</option>
                        <?php foreach ($result_menu as $a_menu) {?>

                            <option
                                    value="<?php echo $a_menu["id"]?>"
                                <?php if($each["menu_id"]== $a_menu["id"])  ?>
                                    selected
                                <?php  ?>
                            >
                                <?php echo $a_menu["name"]?>

                            </option>

                        <?php } ?>
                    </select>
                </div>
            </div>
            <br>
            <label for="">Tên:</label>

            <input type="text" required class="form-control" placeholder="Nhập tên" name="name" value=" <?php echo $each["name"] ?>"
            <br>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php

include_once "../footer.php";
?>
