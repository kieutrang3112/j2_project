<?php 
session_start();
require 'check_login_cus.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>	
	<?php include 'header.php' ?>
	<div id="div_giua">
    <table width="98%" border="1">
        <thead>
            <tr>
                <th scope="">ID</th>
                <th scope="col">Thời gian đặt</th>
                <th scope="col">Thông tin người nhận</th>
                <th scope="col">Thông tin người đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Xem chi tiết</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
            include_once "../admin/connect.php";
            $id = $_SESSION['id_cus'];
            $sql = "select orders.*,
            customers.name,
            customers.phone,
            customers.address
            from orders 
            join customers
            on orders.customer_id = '$id'
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
                    <td><?php echo $each['total_price'] ?></td>
                </td>
                <td><a href="view_order_detail.php?id=<?php echo $each['id'] ?>">Chi tiết</a>
                </td>
            </tr>
            <?php
            }
            ?>
    </tbody>

</table>
</div>
	<?php include 'footer.php' ?>
	
</body>
</html>