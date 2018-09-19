<?php 
	$conn = new PDO("mysql:host=127.0.0.1;dbname=web204_pt13313;charset=utf8", "root", "123456");

	// lấy dữ liệu từ bảng web_settings để phục vụ cho phần header và footer
	$webSettingQuery = "select * from web_settings";
	$stmt = $conn->prepare($webSettingQuery);
	$stmt->execute();

	$setting = $stmt->fetch();
	// echo "<pre>";
	// var_dump($setting);
		
	// lay du lieu tu ban slideshows 
	$slideQuery = "	select * from slideshows 
					where status = 1
					order by order_number";
	$stmt = $conn->prepare($slideQuery);
	$stmt->execute();

	$sliders = $stmt->fetchAll();
	// echo "<pre>";
	// var_dump($sliders);
	
	// lay du lieu tu ban categories
	$cateQuery = "select * from categories";
	$stmt = $conn->prepare($cateQuery);
	$stmt->execute();

	$cates = $stmt->fetchAll();

	$siteUrl = "http://localhost/pt13314/";
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap-3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery.min.js"></script>
	<script src="css/bootstrap-3/js/bootstrap.min.js"></script>

	<title>Trang chủ</title>
</head>

<body>
	<div id="header">
		<div class="container">
			<div class="col-md-2 col-xs-12 col-sm-4">
				<a href="index.html">
					<img src="<?= $siteUrl . $setting['logo']?>" alt="">
				</a>
			</div>
			<div class="col-md-10 col-xs-12 col-sm-8">
				<div class="header-time col-md-12 col-xs-12 col-sm-12">
					<a href="#" class="col-xs-12 col-md-4">Thời gian làm việc:8h30-17h</a>
					<a href="#" class="col-xs-12 col-md-3"><?= $setting['hotline']?></a>
				</div>
				<div class="clear-fix"></div>
				<div class="header-menu col-md-12">
					<ul class="nav navbar-nav">
						<li>
							<a href="index.html">Trang chủ</a>
						</li>
						<li>
							<a href="gioithieu.html">Giới thiệu</a>
						</li>
						<?php foreach ($cates as $item): ?>
							<li>
								<a href="<?= $siteUrl ?>cate.php?id=<?= $item['id']?>"><?= $item['name']?></a>
							</li>
						<?php endforeach ?>
						<li>
							<a href="liên hệ.html">Liên hệ</a>
						</li>
					</ul>
					<!-- <form class="navbar-form navbar-left">
						<div class="form-group">
							<input type="text" class="form-control search" placeholder="Từ khóa">
						</div>
						<button type="submit" class="btn btn-info">Tìm kiếm</button>
					</form> -->
				</div>
			</div>
		</div>
	</div>
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
							<img src="<?= $siteUrl . $item['image']?>">
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

			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product4.jpg" alt="">
				</div>
				<a class="title-name">Bánh nha</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>

				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product2.jpg" alt="">
				</div>
				<a class="title-name">Bánh nha</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product1.jpg" alt="">
				</div>
				<a class="title-name">Bánh nha</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>

			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product4.jpg" alt="">
				</div>
				<a class="title-name">Bánh nha</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product3.jpg" alt="">
				</div>
				<a class="title-name">Bánh nha</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product4.jpg" alt="">
				</div>
				<a class="title-name">Bánh nha</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>

		</div>
	</div>
	<div id="hot-product">
		<div class="container">
			<div class="tittle-product">
				<h2>Sản phẩm bán chạy</h2>
			</div>

			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product-hot1.jpg" alt="">
				</div>
				<a class="title-name">Kẹo dẻo</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product-hot2.jpg" alt="">
				</div>
				<a class="title-name">Kẹo dẻo</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product-hot3.jpg" alt="">
				</div>
				<a class="title-name">Kẹo dẻo</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product-hot4.jpg" alt="">
				</div>
				<a class="title-name">Kẹo dẻo</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product-hot5.jpg" alt="">
				</div>
				<a class="title-name">Kẹo dẻo</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="img-height">
					<img src="img/product-hot1.jpg" alt="">
				</div>
				<a class="title-name">Kẹo dẻo</a>
				<div class="text-center">
					<a class="promotional">100.000Đ</a>
				</div>
				<div class="footer-product">
					<a href="#" class="details">Xem chi tiết</a>
					<a href="#" class="buying">Mua hàng</a>
				</div>
			</div>

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