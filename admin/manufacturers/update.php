
<?php
include_once "../header.php";
include_once "../sidebar.php";
include_once "../connect.php";
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
            <h1 class="page-header">Quản lý danh mục</h1>
            <a href="index.php"><button type="button" class="btn btn-primary ">Danh sách</button></a>
        </div>

    </div>
    <?php   
    session_start();
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>

    <form  style="padding-top: 20px" method="post" action="process_update.php">
        <div class="form-group">
            <?php
            if(empty($_GET['id'])) {            
            header('location:index.php');
            exit();
            }
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
                    <select class="form-control" name="menu_id" id="menu_id">
                        <option value="-1">---Chọn---</option>
                        <?php foreach ($menu as $a_menu) {?>
                            <option
                                value="<?php echo $a_menu["id"]?>"
                                <?php if($each["menu_id"] == $a_menu["id"]){  ?>
                                    selected
                                <?php } ?>
                            >
                                <?php echo $a_menu["name"]?>
                            </option>

                        <?php } ?>
                    </select>
                </div>
                <span style="color: red;" id="error_menu"></span>
            </div>
            
            <br>
            <label for="">Tên:</label>

            <input type="text"  class="form-control" placeholder="Nhập tên" name="name" id="name" value="<?php echo $each["name"] ?>">
            <span style="color: red;" id="error_name"></span>
            <br>
        </div>

        <button type="submit" class="btn btn-primary" onclick="return check()">Submit</button>
    </form>
    <script type="text/javascript">
        function check(){
            let check_error=false
            let name = document.getElementById('name').value;
            if(name.length===0){
                document.getElementById('error_name').innerHTML="Tên không được để trống";
                check_error=true;
            }else{
                let regex_name= /^[A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đa-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*([ ][A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đa-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*)*$/;
                if(!regex_name.test(name)){
                    document.getElementById('error_name').innerHTML="Tên không hợp lệ";
                    check_error=true;
                }else{
                    document.getElementById('error_name').innerHTML="";
                }
            }

            //Danh mục
            let menu_id=document.getElementById('menu_id');
            if(menu_id.value == '-1'  ){
                document.getElementById('error_menu').innerHTML='Chọn danh mục';
                check_error=true;
                
            }else{
                document.getElementById('error_menu').innerHTML='';
                
            }

            if(check_error){
                return false;

            }
        }

    </script>

</div>

<?php

include_once "../footer.php";
?>
