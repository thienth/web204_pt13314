<?php 
	require_once './commons/utils.php';
	// lấy dữ liệu từ bảng web_settings để phục vụ cho phần header và footer
	$webSettingQuery = "select * from " . TABLE_WEBSETTING;
	$stmt = $conn->prepare($webSettingQuery);
	$stmt->execute();

	$setting = $stmt->fetch();
	
	// lay du lieu tu ban categories
	$cateQuery = "select * from " . TABLE_CATEGORY;
	$stmt = $conn->prepare($cateQuery);
	$stmt->execute();

	$cates = $stmt->fetchAll();
 ?>
<div id="header">
	<div class="container">
		<div class="col-md-2 col-xs-12 col-sm-4">
			<a href="index.html">
				<img src="<?= SITE_URL . $setting['logo']?>" alt="">
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
							<a href="<?= SITE_URL ?>cate.php?id=<?= $item['id']?>"><?= $item['name']?></a>
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