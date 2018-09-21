<?php 
require_once './commons/utils.php';
$cateId = $_GET['id'];
$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 5;

$sql = "select 
			c.*,
			count(p.id) as total_product
		from categories c
		join products p
		on c.id = p.cate_id 
		where c.id = $cateId";

$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();

if(!$cate){
	header("location: $siteUrl");
	die;
}

$offset = ($pageNumber-1)*$pageSize;

$sql = "	select * 
			from products 
			where cate_id = $cateId
			limit $offset, $pageSize";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();

 ?>
 <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

    <?php 
    include './_share/asset.php';
     ?>
	<title>Danh mục <?= $cate['name']?></title>
</head>

<body>
    <?php 
    include './_share/header.php';
     ?>

	<div id="product">
		<div class="container">
			<div class="tittle-product">
				<h2><?= $cate['name']?></h2>
			</div>
			<div class="row">
			<?php foreach ($products as $product): ?>
				
				<div class="col-sm-4 col-xs-12">
					<div class="img-height">
						<img src="<?= $siteUrl . $product['image']?>" alt="">
					</div>
					<a class="title-name"><?= $product['product_name']?></a>
					<div class="text-center">
						Giá bán: <strike><b><?= $product['list_price']?> vnđ</b></strike>
						<br>
						Giá khuyến mại: <b><?= $product['sell_price']?> vnđ</b>
					</div>

					<div class="footer-product">
						<a href="#" class="details">Xem chi tiết</a>
					</div>
				</div>
			<?php endforeach ?>
			</div>
			<div class="row">
				<div class="paginate"></div>
			</div>

		</div>
	</div>
	
	<div id="partner">
		<div class="container">
			<h2 class="title-product">Các đối tác</h2>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner1.jpg" alt="">
			</div>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner2.jpg" alt="">
			</div>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner3.jpg" alt="">
			</div>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner4.jpg" alt="">
			</div>
		</div>
	</div>
	<?php 
	include './_share/footer.php';
	 ?>
	 <script type="text/javascript">
	 	$(function() {
		    $('.paginate').pagination({
		        items: <?= $cate['total_product']?>,
		        itemsOnPage: <?= $pageSize?>,
		        currentPage: <?= $pageNumber?>,
		        cssStyle: 'light-theme',
		        onPageClick: function(page){
		        	var url = '<?= $siteUrl . 'danh-muc.php?id=' . $cateId?>';
					url+= `&page=${page}`;
					window.location.href = url;      
		        }
		    });
		});
	 </script>
</body>

</html>


