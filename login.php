<?php 
require_once './commons/utils.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>thienth dep trai</h2>

	<form action="<?= $siteUrl?>post-login.php" method="post">
		<?php if (isset($_GET['msg'])): ?>
		<h3 style="color:red"><?= $_GET['msg'] ?></h3>
		<?php endif ?>
		Email <input type="email" name="email">
		<br>
		Password <input type="password" name="password">
		<br>
		<button type="submit">Dang nhap</button>
	</form>
</body>
</html>
