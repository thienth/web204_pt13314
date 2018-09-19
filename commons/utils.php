<?php 

	$host = "127.0.0.1";
	$dbname = "web204";
	$dbusername = "root";
	$dbpwd = "123456";
	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpwd);
	define('TABLE_WEBSETTING', 'web_settings');
	define('TABLE_SLIDERSHOW', 'slideshows');
	define('TABLE_CATEGORY', 'categories');
	define('TABLE_PRODUCT', 'products');
	define('SITE_URL', "http://localhost/pt13314/");

 ?>