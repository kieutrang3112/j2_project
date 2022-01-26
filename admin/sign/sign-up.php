<!--đăng ký-->
<?php
        include_once "../root/header.php";
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <!--/.row-->

    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Đăng Ký</h1>
            <a href="index.php"><button type="button" class="btn btn-primary ">Đăng nhập</button></a>
        </div>

    </div>

    <form  style="padding-top: 20px" method="post" action="process_create.php" enctype="multipart/form-data">
        <div class="form-group">

            <input type="text" class="form-control"  required placeholder="Nhập tên" name="name" autofocus>
            <br>
            <label for="">Ảnh</label>
            <input type="file" name="photo" id="">
            <br>
            <input type="number" class="form-control" required placeholder="Nhập giá" name="price">
            <br>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3"   name="desc" placeholder="Enter ..."></textarea>
            </div>
            <!--            <input type="number" class="form-control" required placeholder="Nhập danh mục" name="manu_id">-->
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="manu_id">
                    <option>---Chọn---</option>
                    <?php foreach ($result as $each) { ?>

                        <option value="<?php echo $each["id"]?>"> <?php echo $each["name"]?></option>

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
    include_once "../root/footer.php";
?>
