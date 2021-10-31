<?php 
session_start();
require_once 'classes/users.class.php';
require_once 'classes/product.class.php';


if(isset($_SESSION['user_id'])){

	$uid = $_SESSION['user_id'];
	$userProducts = Product::getUserPurchases($uid);
}else{
	header("Location:account.php?clientMsg=1");
}


if(isset($_SESSION['user_wishlist'])){
	
	$wishlist =0;
	$ids = $_SESSION['user_wishlist'];
	
	if(!empty($ids)){
		$ids = implode(",",$ids);
		$wishlist = Product::getProductByIds($ids);
	}
	
}




?>
<!DOCTYPE html>
<html>
<head>
<title>הרשימות שלי</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><span style="color: #4cb1ca; text-decoration: none; font-size: 1.3em; font-weight: 800;">הרשימות שלי</span></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">הרשימות שלי</h3>
					<br/>
					<div style="width: 100%; height: 80px;">
						<div class="ngShowWishlist" style="width: 45%;float: right;text-align:center;font-size:20px;height: auto;padding: 20px;background-color: #fbdfff;cursor: pointer;border: 1px solid;">רשימת המשאלות</div>
						<div class="ngShowProdlist" style="width: 45%;float: left;text-align:center;font-size:20px;height: auto;padding: 20px;background-color: #ecf5b7;cursor: pointer;border: 1px solid #000;">מוצרים שרכשתי</div>
					</div>
					
					<div class="bottom-grid" style="padding-top: 0px;">
		        		<div class="wish-list ngProdlist" style="margin: 3em 0em;display: none;">	  
		        			<h3 style="padding: 0.5em 0.8em;">רכישות שביצעתי</h3>      			        		
		        			<div class="wlProductHead hideOnMobile">
		        				<div style="width: 5%;float: left; text-align: center;">כמות</div>
								<div style="width: 10%;float: left;text-align: right;">סכום</div>
								<div style="width: 18%;float: left; text-align: center;">מס בדואר</div>	
								<div style="width: 35%;float: left;">שם המוצר</div>
								<div style="width: 15%;float: left; text-align: right;">תאריך</div>
								<div style="width: 15%;float: left; text-align: right;">הזמנה</div>
							</div>								
							<?php if(isset($_SESSION['user_id'])): ?>
								<?php foreach ($userProducts as $product): ?>
				        			<div class="wlProduct">
				        				<div class="stockProd">
				        					<span class="onlyOnMobile" >כמות :&nbsp;&nbsp;</span> <span >(<?php echo $product["stock"]; ?>)</span>
				        				</div>
										<div class="priceProd">
											<span class="onlyOnMobile" >סכום :&nbsp;&nbsp;</span><?php echo $product["price"]." &#8362;"; ?>
										</div>	
										<div class="mailProd">
											<span class="onlyOnMobile" >מס בדואר :&nbsp;&nbsp;</span><?php echo $product["mail_number"]; ?>
										</div>										
										<div class="nameProd">
											<span class="onlyOnMobile" >שם :&nbsp;&nbsp;</span><span style=" font-size: 14px;"><?php echo $product["name"]; ?></span>
										</div>
										<div class="dateProd">
											<span class="onlyOnMobile" >תאריך :&nbsp;&nbsp;</span><span style=""><?php echo $product["date"]; ?></span>
										</div>		
										<div class="pnProd">
											<span class="onlyOnMobile" >הזמנה :&nbsp;&nbsp;</span><span style=""><?php echo $product["purchase_number"]; ?></span>
										</div>																				
									</div>										
								<?php endforeach; ?>							
							<?php else : ?>
		        			<p>לא קיימים מוצרים ברשימת המשאלות</p>
		        			
		        			<?php endif; ?>
		        		</div>
	
		        		<div class="wish-list ngWishlist" style="margin: 3em 0em; display: block;">	        		
							<h3 style="padding: 0.5em 0.8em;">רשימת המשאלות שלי</h3>				        			
		        			<div class="wlistHead hideOnMobile" style="background-color:#f9f9f9;height: 50px;text-align: right;color: #f02b63;font-size: 20px;padding: 10px;">
		        				<div style="width: 15%;float: left; text-align: center;">תמונה</div>
								<div style="width: 12%;float: left;text-align: right;">מחיר</div>	
								<div style="width: 65%;float: left;">שם המוצר</div>
								<div style="width: 7%;float: left;">הסר</div>
							</div>								
							<?php if($wishlist!=0): ?>
								<?php foreach ($wishlist as $prod): ?>
				        			<div class="wlList">
				        				<div style="width: 15%;float: left; text-align: center;">
				        					<img alt="<?php echo $prod->getName(); ?>" src="images/prudact/<?php echo $prod->getImagePath(); ?>" style="width: 100%; height: 100px;">
				        				</div>
										<div style="width: 12%;float: left;text-align: right;">
											<?php echo $prod->getPrice()." &#8362;"; ?>
										</div>	
										<div style="width: 65%;float: left;">
											<a href="product.php?pid=<?php echo $prod->getId(); ?>"><?php echo $prod->getName(); ?></a>
										</div>
										<div style="width: 7%;float: left;"><img id="<?php echo $prod->getId(); ?>" class="removeFromWishList" alt="הסר מהרשימה" title="הסר מהרשימה" src="images/close.png" style="width: 16px; height: 16px; cursor: pointer;" /></div>										
									</div>										
								<?php endforeach; ?>							
							<?php else : ?>
		        			<p>לא קיימים מוצרים ברשימת המשאלות</p>
		        			
		        			<?php endif; ?>
		        		</div>	
	
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>

			<?php require_once 'parts/sidebar.php'; ?>
			<div class="clearfix"> </div>
		</div>
	
		<?php require_once 'parts/footer.php'; ?>
	 </div>
		
</body>
</html>