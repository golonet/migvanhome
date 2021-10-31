<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'classes/product.class.php';

$byText = "";
$orderByPrice="";
$subCategories = Product::getSubCategories();
$pricePageParam = "";

if(isset($_REQUEST['byPrice'])){
	$orderByPrice = 1;
	$pricePageParam ="&byPrice=1";
}else{
	$orderByPrice = 0;
}


if (isset($_REQUEST['byText'])){
	
	$byText = htmlspecialchars($_REQUEST['byText']);
	
	$add_search_by_description = 0;
	
	if(isset($_REQUEST['byTag'])){		
		$add_search_by_description = 1;		
	}
	
	$_SESSION['currentPage'] = "byText=".$_REQUEST['byText'].$pricePageParam."&byTag";
	if(isset($_REQUEST['start']) && isset($_REQUEST['max'])){
		$start = htmlspecialchars($_REQUEST['start']);
		$max = htmlspecialchars($_REQUEST['max']);
		$products = Product::getSearchResultsByText($byText,$start,$max,$orderByPrice,$add_search_by_description);
	}else{
	
		$products = Product::getSearchResultsByText($byText,0,15,$orderByPrice,$add_search_by_description);
	}	
	
	
}

if (isset($_REQUEST['manufacturer'])){

	$byText = htmlspecialchars($_REQUEST['manufacturer']);

	$_SESSION['currentPage'] = "manufacturer=".$_REQUEST['manufacturer'].$pricePageParam;
	if(isset($_REQUEST['start']) && isset($_REQUEST['max'])){
		$start = htmlspecialchars($_REQUEST['start']);
		$max = htmlspecialchars($_REQUEST['max']);
		$products = Product::getSearchResultsByManufacturer($byText,$start,$max,$orderByPrice);
	}else{
		$products = Product::getSearchResultsByManufacturer($byText,0,15,$orderByPrice);
	}
}

if (isset($_REQUEST['byTextSubCategory'])){

	$_SESSION['currentPage'] = "byTextSubCategory=".$_REQUEST['byTextSubCategory'].$pricePageParam;

	$byText = htmlspecialchars($_REQUEST['byTextSubCategory']);

	
	if(isset($_REQUEST['start'])&&isset($_REQUEST['max'])){
		$start = htmlspecialchars($_REQUEST['start']);
		$max = htmlspecialchars($_REQUEST['max']);
		$products = Product::getSearchResultsSubCategory($byText,$start,$max,$orderByPrice);

	}else{
		$products = Product::getSearchResultsSubCategory($byText,0,15,$orderByPrice);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
<title>ראשי</title>
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
			<h6><a href="index.php">ראשי</a><b>&#9668;</b><span style="color: #4cb1ca;  text-decoration: none;  font-weight: 800;">מוצרים - <?php echo $byText ?></span></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px; background-color: #f5f5f5;">
						<?php echo $byText ?>						
					</h3>
					<div style="position: relative; top: 20px;">
						<span style="font-size: 18px;">סנן לפי מחיר</span>
						<?php if(isset($_REQUEST['byPrice'])): ?>
							<input id="byPrice" type="checkbox" name="byPrice" checked="checked" style="position: relative; top: 2px;">						
						<?php else: ?>
							<input id="byPrice" type="checkbox" name="byPrice" style="position: relative; top: 2px;">
						<?php endif; ?>
					</div>
					<div class="bottom-grid">
					<?php foreach ($products as $product):?>
						<div class="shirt" style="padding-right: 15px; padding-left: 15px;margin-top: 25px;">
							<div class="bottom-grid-top">
									<a href="product.php?pid=<?php echo $product->getId(); ?>">
									<div class="prodNameTopText"><?php echo $product->getName(); ?></div>
									<img class="img-responsive" style="width: 250px;height: 250px;padding-top: 10px;padding-bottom: 10px;" src="images/prudact/<?php echo $product->getImagePath(); ?>" alt="<?php echo $product->getName(); ?>" >
									
									<?php if(!is_null($product->getBulkPrecent())): ?>
									<div class="five">
										<h6 class="one" style="font-size: 15px;padding: 0.45em 0 0;">
											<?php $present = str_replace("0.", "", $product->getBulkPrecent()); ?>
											<?php echo "הנחה ". $present."% <br/> + ".$product->getBulkSum(); ?>
										</h6>
									</div>
									<?php endif; ?>
									</a>
									<div class="pre" style="height: 70px;">
										<div style='position:absolute;font-size: 13px;height: 20px;left: 94px; color:#b9214c;'>
											<?php
											$vatDivisor = 1 + ($site_info['tax'] / 100);
											$price = $product->getPrice();
											$priceBeforeVat = $price / $vatDivisor;
											?>
											לפני מע"מ : <?php echo number_format($priceBeforeVat, 2) ." &#8362;"; ?>
										</div>
									<!-- -->
										<div class="priceText" style="">											
											<span class="priceSize"><?php echo $product->getPrice() ." &#8362;"; ?></span>
										</div>
										<form action="search.php?<?php echo $_SESSION['currentPage'] ?>" method="post" style="text-decoration:none;width: 54px;height: 52px;position: absolute;bottom: 1px;left: 8%;">
											<input type="hidden" name="cartAddId" id="cartAddId"  value="<?php echo $product->getId(); ?>" />
											<input type="hidden" name="cartAddSum" value="<?php echo $product->getPrice(); ?>" />
											<input type="hidden" name="cartProductName" value="<?php echo $product->getName(); ?>" />	
										    <input type="hidden" name="cartProductImg" value="<?php echo $product->getImagePath(); ?>" />
										    <input type="hidden" name="cartBulkPrecent" value="<?php echo $product->getBulkPrecent(); ?>" />
											<input type="hidden" name="cartBulkSum" value="<?php echo $product->getBulkSum(); ?>" />	
											<input type="hidden" name="stock_max" value="<?php echo $product->getStock(); ?>">	
												
											<?php if($product->getByPhone()==1): ?>
												
												<input class="byphone" style="background:url('images/by_phone.png');border: none;width: 45px;height: 45px; " title="באמצעות אימייל" value="" />
											
											<?php else: ?>
											
												<?php if ($product->getStock()>0):?>
													<input type="submit" class="bayFloating" title="הוסף לעגלה" value="" />
												<?php endif; ?>
												<?php if (($product->getStock()<0) || $product->getStock()==0):?>
													<div style="color: red;font-weight:bold;float:right;font-size: 18px;width: 80px;height: 28px;position: relative;top: 15px;right: -12px;font-size: 15px;border: 1px solid #000;text-align: center;background-color: #fff;border-radius: 15px;padding-top: 2px;">אזל המלאי</div>
												<?php endif; ?>
											
											<?php endif; ?>	
	
										</form>			
										
										<?php if(isset($_SESSION['user_id']) && isset($_SESSION['user_wishlist'])): ?>										
											<?php if(in_array($product->getId(), $_SESSION['user_wishlist'])): ?>
												<img alt="ברשימת המשאלות שלי" src="images/onWishlist.png" style="position: absolute;  bottom: 9px;  right: 11%;width: 34px;">
											<?php else : ?>
												<img class="addToWishList" alt="הוסף לרשימת המשאלות" src="images/wishlist_favorites.png" style="position: absolute;  bottom: 9px;  right: 11%;width: 37px;cursor: pointer;">
											<?php endif; ?>																	
										<?php else: ?>
											<img class="mustConnect" alt="הוסף לרשימת המשאלות" src="images/wishlist_favorites.png" style="position: absolute;  bottom: 9px;  right: 11%;width: 37px;cursor: pointer;">
										<?php endif; ?>					
									</div>
							</div>
						</div>
						<?php endforeach; ?>
						<div class="clearfix"> </div>
					</div>
				</div>
				<?php require_once 'parts/searchPaging.php'; ?>
			</div>

			<?php require_once 'parts/sidebar.php'; ?>
			<div class="clearfix"> </div>
		</div>
	
		<?php require_once 'parts/footer.php'; ?>
	 </div>
		<script type="text/javascript">
		      $('#byPrice').click(function() {
		    	  if ($('#byPrice').is(':checked')) {
					var url = window.location.href;
					url = url.replace("#","");					
					window.location.href = url+"&byPrice=1";
			      }else{
						var url = window.location.href;
						url = url.replace("#","");
						url = url.replace("&byPrice=1","");
						window.location.href = url;
				  }
     			});
			//
			

		</script>
</body>
</html>