<?php
 require '../check_admin_login.php'; 
?>
<?php
    include_once "../header.php";
    include_once "../sidebar.php";
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
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý hoá đơn</h1>
            
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng tiền</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
            $order_id=$_GET['id'];
            include_once "../connect.php";
            $sql = "select * from order_product
            join products on products.id = order_product.product_id
            where order_id = '$order_id' ";
             
            $row=mysqli_query($connect,$sql);
            foreach ($row as $each) {
        ?>
            <tr>
                <td><img height="100" src="admin/products/photos/<?php echo $each['name'] ?>"></td>
                <td><?php echo $each['photo'] ?></td>
                <td><?php echo $each['price'] ?></td>
                <td><?php echo $each['quantity'] ?></td>
                         
                <td><?php echo $each['price']*$each['quantity'] ?>                    
                </td>
                
            </tr>
                <?php
                }
            ?>

            
        </tbody>

    </table>

    <!--end main-->

<?php
    include_once "../footer.php";
    ?>

