<?php
 require '../check_admin_login.php'; 
?>
<?php
include_once "../header.php";
include_once "../sidebar.php";
include_once "../connect.php";
$id = $_GET["id"];
$sql = "SELECT * FROM products WHERE id='$id'";
$row=mysqli_query($connect,$sql);
$each = mysqli_fetch_array($row);

$sql = "SELECT * FROM manufactures";
$manufactures = mysqli_query($connect,$sql);

$sql = "SELECT * FROM menu";
$menu = mysqli_query($connect,$sql);

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
            <h1 class="page-header">Quản lý sản phẩm</h1>
            <a href="index.php"><button type="button" class="btn btn-primary ">Danh sách</button></a>
        </div>

    </div>

    <form  style="padding-top: 20px" method="post" action="process_update.php" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $each["id"] ?>" id="">
            <label for="" >Tên:</label>
            <input type="text" class="form-control" required value="<?php echo $each["name"] ?>" name="name" >
            <br>
            <label for="">Chọn ảnh mới hoặc giữ ảnh cũ</label>
            <input type="file" name="new_photo" id="">
            <br>

            <img src="photo/<?php echo $each["photo"] ?>" alt="">
            <input type="hidden" name="photo_old" value="<?php echo $each["photo"] ?>" id="">
            <br>
            <label for="" style="padding-top: 15px">Giá</label>
            <input type="number" class="form-control" required value="<?php echo $each["price"] ?>"  name="price">
            <br>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3"   name="desc" placeholder="Enter ..."><?php echo $each["description"] ?></textarea>
            </div>
            <!--            <input type="number" class="form-control" required placeholder="Nhập danh mục" name="manu_id">-->
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="manu_id">
                    <option>---Chọn---</option>
                    <?php foreach ($menu as $a_menu) {?>

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
                <label>Nhà Sản Xuất</label>
                <select class="form-control" name="manu_id">
                    <option>---Chọn---</option>
                    <?php foreach ($manufactures as $manufacturer) {?>

                        <option
                                value="<?php echo $manufacturer["id"]?>"
                            <?php if($each["manufacturer_id"]== $manufacturer["id"])  ?>
                                selected
                            <?php  ?>
                        >
                            <?php echo $manufacturer["name"]?>

                        </option>

                    <?php } ?>
                </select>
            </div>
        </div>

        <!--        <div class="form-check">-->
        <!--            <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
        <!--            <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
        <!--        </div>-->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php

include_once "../footer.php";
?>

