<?php 
	require_once './commons/utils.php';

	
	// echo "<pre>";
	// var_dump($setting);
		
	// lay du lieu tu ban slideshows 
	$slideQuery = "	select * from ". TABLE_SLIDERSHOW ." 
					where status = 1
					order by order_number";
	$stmt = $conn->prepare($slideQuery);
	$stmt->execute();

	$sliders = $stmt->fetchAll();
	// echo "<pre>";
	// var_dump($sliders);
	
	

	


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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= SITE_URL ?>css/bootstrap-3/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>css/main.css">
	<script src="<?= SITE_URL ?>js/jquery.min.js"></script>
	<script src="<?= SITE_URL ?>css/bootstrap-3/js/bootstrap.min.js"></script>

	<title>Trang chủ</title>
</head>

<body>
	<?php 
	include './_share/header.php';
	 ?>
	<div id="slideShow">
		<div class="container-fluid">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php 
						for($i = 0; $i < count($sliders); $i++){
							$act = $i === 0 ? "active" : ""; 
					?>
						<li data-target="#myCarousel" data-slide-to="<?= $i?>" class="<?= $act ?>"></li>
					<?php
						}
					 ?>
				</ol>
				<div class="carousel-inner">
					<?php 
						$count = 0;
						foreach ($sliders as $item) {
							$act = $count === 0 ? "active" : ""; 
					?>
						<div class="item <?= $act ?>">
							<img src="<?= SITE_URL . $item['image']?>">
						</div>
					<?php
							$count++;
						}
					 ?>
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
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
	<div id="footer">
		<div class="container">

			<div class="col-md-8">
				<?= $setting['map']?>
			</div>
			<div class="col-md-4 footer-main">
				<div>
					<label>Gmail:</label>
					<a href="#"><?= $setting['email']?></a>
				</div>
				<div>
					<label>Số điện thoại:</label>
					<a href="#"><?= $setting['hotline']?></a>
				</div>
				<div>
					<label>Giờ làm việc:</label>
					<a href="#">8h30-17h</a>
				</div>
				<div>
					<label>Facebook:</label>
					<a href="#"><?= $setting['fb']?></a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>