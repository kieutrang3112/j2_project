<style type="text/css"></style>
<?php 
$name = $_GET['name'];
$page = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

require '../admin/connect.php';

$sql_number = "select products.*
from products
join manufactures where products.manufacturer_id = manufactures.id and manufactures.name like '$name'";
$results = mysqli_query($connect,$sql_number);
$number_results = mysqli_num_rows($results);


$number_results_per_page = 8;
$number_page = ceil($number_results / $number_results_per_page);
$next_page = $number_results_per_page * ($page -1);

$sql = "select products.*
from products
join manufactures where products.manufacturer_id = manufactures.id and manufactures.name like '$name'
limit $number_results_per_page offset $next_page";

$result = mysqli_query($connect,$sql);
?>

<div id="div_giua">		
	<div class="tong">		
		<div class="loai_san_pham">
			<h2><?php echo $name ?></h2>
		</div>
		<?php foreach($result as $each) { ?>
			<div class="san_pham">
				<a href="product.php?id=<?php echo $each['id'] ?>"><img class="san_pham" src="../admin/products/photo/<?php echo $each['photo'] ?>"></a>
				<a><div class="name"><?php echo $each['name'] ?></div></a>
				<div class="prices">Free</div>
				<a 
				<?php if(!empty($_SESSION['id_cus'])) { ?> 
					href="add_to_cart.php?id=<?php echo $each['id'] ?>" 
				<?php }else{  ?> 
					href="signin.php" 
					<?php } ?>>
					Thêm vào giỏ
				</a>										
			</div>
		<?php } ?>		
	</div>
	Trang
	<?php for($i=1; $i <=$number_page;$i++){ ?>
			<a href="menu.php?page=<?php echo $i ?>&name=<?php echo $name ?>">
				<button>
					<?php echo $i ?>
				</button>				
			</a>
	<?php } ?>
	
</div>