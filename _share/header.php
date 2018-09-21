<?php 
require_once './commons/utils.php';

$getSettingQuery = "select * from web_settings";
$stmt = $conn->prepare($getSettingQuery);
$stmt->execute();

$setting = $stmt->fetch();
// lay du lieu tu bang categories de do data cho menu
$menuQuery = "select * from categories";
$stmt = $conn->prepare($menuQuery);
$stmt->execute();
$menus = $stmt->fetchAll();
 ?>

 <div id="header">
	<div class="container">
		<div class="col-md-2 col-xs-12 col-sm-4">
			<a href="index.html">
				<img src="<?= $siteUrl . $setting['logo']?>" alt="Logo">
			</a>
		</div>
		<div class="col-md-10 col-xs-12 col-sm-8">
			<div class="header-time col-md-12 col-xs-12 col-sm-12">
				<a href="#" class="col-md-4">Thời gian làm việc:8h30-17h</a>
				<a href="#" class="col-md-3">Hotline: <?= $setting['hotline']?></a>
			</div>
			<div class="clear-fix"></div>
			<div class="header-menu col-md-12">
				<ul class="nav navbar-nav">
					<li>
						<a href="<?= $siteUrl ?>">Trang chủ</a>
					</li>
					<li>
						<a href="<?= $siteUrl ?>gioithieu.php">Giới thiệu</a>
					</li>
					<?php foreach ($menus as $m): ?>
						<li>
							<a href="<?= $siteUrl ?>danh-muc.php?id=<?= $m['id']?>"><?= $m['name']?></a>
						</li>
					<?php endforeach ?>
					<li>
						<a href="<?= $siteUrl ?>lienhe.php">Liên hệ</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>