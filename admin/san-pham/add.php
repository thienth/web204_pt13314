<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
// lay du lieu tu danh muc
$sql = "select * from categories";
$cates = getSimpleQuery($sql, true);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Thêm sản phẩm</title>
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
        <small>Thêm sản phẩm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thêm sản phẩm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form enctype="multipart/form-data"
              action="<?= $adminUrl?>san-pham/save-add.php"
              method="post">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" name="product_name" class="form-control">
            </div>
            <div class="form-group">
              <label>Danh mục</label>
              <select name="cate_id" class="form-control">
                <?php foreach ($cates as $item): ?>
                  <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label>Giá trưng bày</label>
              <input type="number" name="list_price" class="form-control">
            </div>
            <div class="form-group">
              <label>Giá bán</label>
              <input type="number" name="sell_price" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <img id="showImage" src="<?= $siteUrl?>img/default/default-picture.png" class="img-responsive">
              </div>
            </div>
            <div class="form-group">
              <label>Ảnh sản phẩm</label>
              <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
              <label>Trạng thái</label>
              <br>
              <input type="radio" name="status" value="1"> Active &nbsp;
              <input type="radio" name="status" value="-1"> Inactive
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label>Mô tả</label>
              <textarea name="detail" rows="10" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <a href="<?= $adminUrl?>san-pham" class="btn btn-sm btn-danger">Huỷ</a>
            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
          </div>
        </form>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'_share/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include_once $path.'_share/script_assets.php'; ?>
<script type="text/javascript">
  $(document).ready(function(){

    $('[name="detail"]').wysihtml5();


    var img = document.querySelector('[name="image"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage').src = "<?= $siteUrl?>img/default/default-picture.png";
      }else{
        getBase64(anh, '#showImage');
      }
    }

    function getBase64(file, selector) {
       var reader = new FileReader();
       reader.readAsDataURL(file);
       reader.onload = function () {
         document.querySelector(selector).src = reader.result;
       };
       reader.onerror = function (error) {
         console.log('Error: ', error);
       };
    }
  });
</script>
</body>
</html>
