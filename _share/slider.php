<?php 
require_once './commons/utils.php';	

$sliderQuery = "select * from slideshows";
$stmt = $conn->prepare($sliderQuery);
$stmt->execute();

$sliders = $stmt->fetchAll();

 ?>
<div id="slideShow">
	<div class="container-fluid">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php 
				$count = 0;
				foreach ($sliders as $slide): 
					$act = $count == 0 ? "active" : "";						
				?>

					<li data-target="#myCarousel" data-slide-to="<?= $count?>" class="<?= $act ?>"></li>
					
				<?php 
					$count++;
					endforeach 
				?>
			</ol>
			<div class="carousel-inner">
				<?php 
				$count = 0;
				foreach ($sliders as $slide): 
					$act = $count == 0 ? "active" : "";						
				?>
					<div class="item <?= $act?>">
						<img src="<?= $slide['image']?>">
					</div>
					
				<?php 
					$count++;
					endforeach 
				?>
				
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>