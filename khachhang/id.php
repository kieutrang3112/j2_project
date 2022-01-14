<style type="text/css"></style>
<?php 
$id = $_GET['id'];
require '../admin/connect.php';
$sql = "select * from products 
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result)
?>

<div id="div_giua">
	<a><div class="name"><?php echo $each['name'] ?></div></a>
	<img height="500"  src="../admin/products/photo/<?php echo $each['photo'] ?>">
	<div class="prices"><?php echo $each['price'] ?></div>
	<br><br><br><br>
	<p><?php echo nl2br($each['description']) ?></p>	
		
</div>