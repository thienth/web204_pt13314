<?php 
	require_once './commons/utils.php';
	// lấy dữ liệu từ bảng web_settings để phục vụ cho phần header và footer
	$webSettingQuery = "select * from " . TABLE_WEBSETTING;
	$stmt = $conn->prepare($webSettingQuery);
	$stmt->execute();

	$setting = $stmt->fetch();
 ?>