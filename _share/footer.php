<?php 
	require_once './commons/utils.php';
	// lấy dữ liệu từ bảng web_settings để phục vụ cho phần header và footer
	$webSettingQuery = "select * from " . TABLE_WEBSETTING;
	$stmt = $conn->prepare($webSettingQuery);
	$stmt->execute();

	$setting = $stmt->fetch();
 ?>

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