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
                <th scope="">ID</th>
                <th scope="col">Thời gian đặt</th>
                <th scope="col">Thông tin người nhận</th>
                <th scope="col">Thông tin người đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Xem chi tiết</th>
                <th>Thao tác</th>

            </tr>
        </thead>
        <tbody>
            <?php
            include_once "../connect.php";
            $sql = "select orders.*,
            customers.name,
            customers.phone,
            customers.address
            from orders 
            join customers
            on customers.id = orders.customer_id
             ";
             
            $row=mysqli_query($connect,$sql);
            foreach ($row as $each) {
        ?>
            <tr>
                <th scope="row"><?php echo $each["id"] ?></th>
                <td><?php echo $each["created_at"] ?></td>
                
                <td>
                	<?php echo $each["receiver_name"] ?><br>
                	<?php echo $each["receiver_phone"] ?><br>
                	<?php echo $each["receiver_address"] ?><br>
                	
                </td>
                <td>
                	<?php echo $each["name"] ?><br>
                	<?php echo $each["phone"] ?><br>
                	<?php echo $each["address"] ?><br>
                	
                </td>

                <td>
                	<?php 
                		switch ($each['status']) {
                			case '0':
                				echo "Mới đặt";
                				break;
                			
                			case '1':
                				echo "Đã duyệt";
                				break;
                			case '2':
                				echo "Đã huỷ";
                				break;
                		}
                	 ?>
                </td>
                <td><?php echo 'test' ?></td>
                </td>
                <td><a href="detail.php?id=<?php echo $each['id'] ?>">Chi tiết</a>
                </td>
                <td>
                    <a href="update.php?id=<?php echo $each["id"]?>&status=1"><button type="button" class="btn btn-info">Duyệt</button></a>
                    <a href="update.php?id=<?php echo $each["id"]?>&status=2"> <button type="button" class="btn btn-danger">Xóa</button></a>
                </td>
                <?php
                }
            ?>

            </tr>
        </tbody>

    </table>

    <!--end main-->

<?php
    include_once "../footer.php";
    ?>

