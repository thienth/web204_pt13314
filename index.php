<?php 
	require_once './commons/utils.php';
	
	$newProductsQuery = "select * from ".TABLE_PRODUCT."
						order by id desc
						limit 6";
	$stmt = $conn->prepare($newProductsQuery);
	$stmt->execute();

	$newProducts = $stmt->fetchAll();

	$mostViewsQuery = "select * from ".TABLE_PRODUCT."
						order by views desc
						limit 6";
	$stmt = $conn->prepare($mostViewsQuery);
	$stmt->execute();

	$mostViewProducts = $stmt->fetchAll();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<?php 
	include './_share/header_assets.php';
	 ?>

	<title>Trang chủ</title>
</head>

<body>
	<?php 
	include './_share/header.php';
	 ?>
	<?php 
	include './_share/slider.php';
	 ?>
	
	<div id="product">
		<div class="container">
			<div class="tittle-product">
				<h2>Sản phẩm mới</h2>
			</div>
			<?php foreach ($newProducts as $np): ?>
				
				<div class="col-sm-4 col-xs-12">
					<div class="img-height">
						<img src="<?= SITE_URL . $np['image']?>" alt="">
					</div>
					<a class="title-name"><?= $np['product_name']?></a>
					<div class="text-center">
						Gía bán: <strike><?= $np['list_price']?></strike>
						<br>
						Giá khuyến mại: <b><?= $np['sell_price']?></b>	
					</div>

					<div class="footer-product">
						<a href="#" class="details">Xem chi tiết</a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	<div id="hot-product">
		<div class="container">
			<div class="tittle-product">
				<h2>Sản phẩm bán chạy</h2>
			</div>

			<?php foreach ($mostViewProducts as $np): ?>
				
				<div class="col-sm-4 col-xs-12">
					<div class="img-height">
						<img src="<?= SITE_URL . $np['image']?>" alt="">
					</div>
					<a class="title-name"><?= $np['product_name']?></a>
					<div class="text-center">
						Gía bán: <strike><?= $np['list_price']?></strike>
						<br>
						Giá khuyến mại: <b><?= $np['sell_price']?></b>	
					</div>

					<div class="footer-product">
						<a href="#" class="details">Xem chi tiết</a>
					</div>
				</div>
			<?php endforeach ?>

		</div>
	</div>
	<div id="partner">
		<div class="container">
			<h2 class="title-product">Các đối tác</h2>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner1.jpg" alt="">
			</div>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner2.jpg" alt="">
			</div>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner3.jpg" alt="">
			</div>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner4.jpg" alt="">
			</div>
		</div>
	</div>
	<?php 
	include './_share/footer.php';

	 ?>
</body>

</html>