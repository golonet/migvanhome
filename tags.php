<?php
session_start();

require_once 'classes/product.class.php';

require_once 'classes/category.class.php';

require_once 'classes/tags.class.php';

$tags_titles = Tags::getTagsTitles();



?>
<!DOCTYPE html>
<html>
<head>
<title>תגיות</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
<style type="text/css">
a:hover, a:focus{text-decoration: none;}
</style>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">תגיות</a><b>&#9668;</b></h6>
		</div>
		<div class="content">

		
			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
		
					<?php foreach($tags_titles as $tags_title): ?>
					
						<div style="display: inline-block; width: 100%; ">							
							<?php $title = $tags_title[0]; ?>
						  	
						  	 <h3 class="tagsLink" style="padding: 8px; color: #fff;">
									<?php echo $title; ?>
							</h3>
							
							<?php $products = Category::getCategoryNameByTitle($title);  ?>
													
							<?php foreach($products as $product): ?>										
								<div class="tags" style="background-color: red; ">																
									<a href="search.php?byText=<?php echo  $product['name']; ?>&byTag=1" style="padding: 9px 5px; color: #FFF; text-decoration: none;"><?php  echo $product['name'];?></a>
								</div>
							 <?php endforeach; ?>						
						</div>		
						<br><br>																							
					<?php endforeach; ?>
				</div>
				</div>

		<?php require_once 'parts/sidebar.php'; ?>
		<div class="clearfix"> </div>
		</div>

		<?php require_once 'parts/footer.php'; ?>
		</div>
	 <div class="container-fluid" style="padding: 0px; background-color: #000;">
		<?php require_once 'parts/footer.php'; ?>
	</div>
		
</body>
</html>