<?php 
require_once '../../commons/utils.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'danh-muc');
	die;
}

$name = trim($_POST['name']);
$description = $_POST['description'];

// kiem tra xem ten co bi trong hay khong
if($name == ""){
	header('location: '. $adminUrl .'danh-muc/add.php?errName=Vui lòng không để trống tên danh mục');
	die;
}

// Kiem tra ten co bi trung hay khong
$sql = "select * from categories where name = '$name'";
$rs = getSimpleQuery($sql);

if($rs != false){
	header('location: '. $adminUrl .'danh-muc/add.php?errName=Tên danh mục đã tồn tại, vui lòng chọn tên khác');
	die;
}

$sql = "insert into categories values (null, '$name', '$description')";

getSimpleQuery($sql);
header('location: '. $adminUrl . 'danh-muc?success=true');
die;


 ?>