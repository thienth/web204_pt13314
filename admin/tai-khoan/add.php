<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Thêm tài khoản</title>
  <?php include_once $path.'_share/style_assets.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once $path.'_share/header.php'; ?>
  
  <?php include_once $path.'_share/sidebar.php'; ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm tài khoản
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="<?= $adminUrl ?>tai-khoan/save-add.php" method="post">
        <div class="col-md-6">
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
            <?php 
              if(isset($_GET['errEmail'])){
                ?>
                <span class="text-danger"><?= $_GET['errEmail'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Tên đầy đủ</label>
            <input type="text" name="fullname" class="form-control">
            <?php 
              if(isset($_GET['errFullname'])){
                ?>
                <span class="text-danger"><?= $_GET['errFullname'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control">
            <?php 
              if(isset($_GET['errPassword'])){
                ?>
                <span class="text-danger"><?= $_GET['errPassword'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="cfpassword" class="form-control">
            <?php 
              if(isset($_GET['errcfPassword'])){
                ?>
                <span class="text-danger"><?= $_GET['errcfPassword'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Phân quyền</label>
            <select name="role" class="form-control">
              <?php foreach (USER_ROLES as $key => $value): ?>
                <option value="<?= $value ?>"><?= $key ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="text-right">
            <a href="<?= $adminUrl?>tai-khoan" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
          </div>

        </div>
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'_share/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include_once $path.'_share/script_assets.php'; ?>
</body>
</html>
