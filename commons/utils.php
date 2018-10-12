<?php 

$siteUrl = "http://localhost/pt13314/";
$adminUrl = "http://localhost/pt13314/admin/";
$adminAssetUrl = "http://localhost/pt13314/admin/adminlte/";

$host = "127.0.0.1";
$dbname = "web204";
$dbusername = "root";
$dbpwd = "123456";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 
		$dbusername, $dbpwd);

const USER_ROLES = [
	"admin" => 500,
	"moderator" => 300,
	"member" => 1
];

function dd($vari){
	echo "<pre>";
	var_dump($vari);
	die;
}

function getSimpleQuery($sql, $isAll = false){
	global $conn;
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	if($isAll){
		return $stmt->fetchAll();
	}
	return $stmt->fetch();
}
 ?>
