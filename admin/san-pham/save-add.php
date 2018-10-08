<?php 
require_once '../../commons/utils.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'san-pham');
	die;
}

$product_name = trim($_POST['product_name']);

$cate_id = $_POST['cate_id'];
$list_price = $_POST['list_price'];
$sell_price = $_POST['sell_price'];
$detail = $_POST['detail'];
$status = $_POST['status'];

$file = $_FILES['image'];

// luu file vao thu muc tren server
//1. lay duoi file

// kiem tra xem ten co bi trong hay khong
// if($name == ""){
// 	header('location: '. $adminUrl .'danh-muc/add.php?errName=Vui lòng không để trống tên danh mục');
// 	die;
// }


// // Kiem tra ten co bi trung hay khong
// $sql = "select * from categories where name = '$name'";
// $rs = getSimpleQuery($sql);

// if($rs != false){
// 	header('location: '. $adminUrl .'danh-muc/add.php?errName=Tên danh mục đã tồn tại, vui lòng chọn tên khác');
// 	die;
// }

$path = $file['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);

// 2. tao filename moi
$filename = "img/san-pham/" . uniqid() . "." . $ext;
// 3. luu file vao thu muc
move_uploaded_file($file['tmp_name'], '../../' . $filename);

$sql = "insert into products
			(product_name, 
			detail,
			image,

			sell_price,
			list_price, 
			status,
			cate_id
			) 
		values 
			(:product_name, 
			:detail, 
			:image,

			:sell_price,
			:list_price,
			:status,

			:cate_id
		)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':product_name', $product_name);
$stmt->bindParam(':detail', $detail);
$stmt->bindParam(':image', $filename);
$stmt->bindParam(':sell_price', $sell_price);
$stmt->bindParam(':list_price', $list_price);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':cate_id', $cate_id);

$stmt->execute();
header('location: '. $adminUrl . 'san-pham');
die;


 ?>