<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$listCateQuery = "select 
                    c.*,
                    count(p.id) as total_product
                  from categories c
                  join products p
                    on c.id = p.cate_id
                  group by c.id";
$cates = getSimpleQuery($listCateQuery, true);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Danh mục</title>
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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th style="width: 10px">#</th>
                  <th>Tên</th>
                  <th>Sản phẩm</th>
                  <th style="width: 240px">Mô tả</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>danh-muc/add.php"
                      class="btn btn-xs btn-success"
                      >
                      Thêm
                    </a>
                  </th>
                </tr>
                <?php foreach ($cates as $c): ?>
                  <tr>
                    <td><?= $c['id']?></td>
                    <td><?= $c['name']?></td>
                    <td>
                      <?= $c['total_product']?>
                    </td>
                    <td>
                      <?= $c['desc']?>
                    </td>
                    <td>
                      <a href="<?= $adminUrl?>danh-muc/edit.php?id=<?= $c['id']?>"
                      class="btn btn-xs btn-info"
                      >
                        Sửa
                      </a>
                      <a href="<?= $adminUrl?>danh-muc/remove.php?id=<?= $c['id']?>"
                      class="btn btn-xs btn-danger"
                      >
                        Xoá
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

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
