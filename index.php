<?php 
	require_once './commons/utils.php';	

	// 6 ban ghi co id lon nhat
	$newProductsQuery = "select * 
						from products 
						order by id desc
						limit 6";
	$stmt = $conn->prepare($newProductsQuery);
	$stmt->execute();

	$newProducts = $stmt->fetchAll();

	// 6 ban ghi co luong view lon nhat
	$mostViewProductsQuery = "	select * 
								from products
								order by views desc
								limit 6";
	$stmt = $conn->prepare($mostViewProductsQuery);
	$stmt->execute();

	$mostViewProducts = $stmt->fetchAll();


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

    <?php 
    include './_share/asset.php';
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
			<?php foreach ($newProducts as $product): ?>
				
				<div class="col-sm-4 col-xs-12">
					<div class="img-height">
						<img src="<?= $siteUrl . $product['image']?>" alt="">
					</div>
					<a class="title-name"><?= $product['product_name']?></a>
					<div class="text-center">
						Giá bán: <strike><b><?= $product['list_price']?> vnđ</b></strike>
						<br>
						Giá khuyến mại: <b><?= $product['sell_price']?> vnđ</b>
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
				<h2>Sản phẩm xem nhiều</h2>
			</div>

			<?php foreach ($mostViewProducts as $product): ?>
				
				<div class="col-sm-4 col-xs-12">
					<div class="img-height">
						<img src="<?= $siteUrl . $product['image']?>" alt="">
					</div>
					<a class="title-name"><?= $product['product_name']?></a>
					<div class="text-center">
						Giá bán: <strike><b><?= $product['list_price']?> vnđ</b></strike>
						<br>
						Giá khuyến mại: <b><?= $product['sell_price']?> vnđ</b>
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