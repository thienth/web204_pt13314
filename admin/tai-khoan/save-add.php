<?php 
require_once '../../commons/utils.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'tai-khoan');
	die;
}

$email = trim($_POST['email']);
$fullname = trim($_POST['fullname']);
$password = $_POST['password'];
$cfpassword = $_POST['cfpassword'];
$role = $_POST['role'];

$


$sql = "insert into users 
			(email, fullname, password, role)
		values 
			('$email', '$fullname', '$password', '$role')";

getSimpleQuery($sql);
header('location: '. $adminUrl . 'tai-khoan?success=true');
die;


 ?>