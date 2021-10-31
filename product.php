<?php
session_start();


require_once 'classes/product.class.php';
require_once 'classes/product_type.class.php';

if (isset($_REQUEST['pid']) && $_REQUEST['pid']!=null){
	
	$pid = $_REQUEST['pid'];
	$_SESSION['currentPage'] = $_REQUEST['pid'];
	$products = Product::getProduct($pid);
	
	$prodName = $products[0]->getName();
	
	$types = ProdType::getProductByName($prodName);
	
	$title =$products[0]->getCategoryName()." - ". $products[0]->getName();
	
	$expressCost = Product::getExpressCosts($pid);
	$expressCost = $expressCost[0];

	
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ?></title>


<?php require_once 'parts/head_tags.php'; ?>
	

<script src="js/jquery.excoloSlider.min.js"></script>
<link href="css/jquery.excoloSlider.css" rel="stylesheet">	
	

<!-- 
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
		<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 350,
					thumb_image_height: 400,
					source_image_width: 600,
					source_image_height: 600,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});
			});
		</script>

 -->	
<!-- start menu -->



<style>
.etalage_small_thumbs{top:361px !important; }
.etalage_icon{top: 185px !important;}

.etalage_thumb_image{width:100% !important; height: auto !important;}
.etalage_small_thumb{ height: auto !important;}
.single-para a{text-decoration: underline;}

</style>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">ראשי</a><b>&#9668;</b><span style="color: #4cb1ca;  text-decoration: none;  font-weight: 800;"><?php echo $title ?></span></h6>
		</div>
		<div class="content">

			<div class="col-md-10">
				   <div class="col-md-4" style="margin: 0px; padding: 0px; margin-bottom: 50px;">	

							<h5 style="direction: rtl; text-align: right; display: none;"><?php // echo $products[0]->getStock() ?> מוצרים במלאי </h5>
							
							<br/><br/><br/><br/>
							<div style="padding: 10px;border: 1px solid #000;min-height: 240px;">		
							<div style="width: 100%;min-height: 40px;float: right;text-align: right;font-size: 18px;direction: ltr;">
								<div style="float: right; width: 125px; height: 40px;color:#4cb1ca; font-weight: bold;">
									 : תקופת אחריות
								</div>
								<div style="float: right; height: 40px;">
									<?php echo $products[0]->getWarranty() ?>
								</div>													
							</div>								
							<div style="width: 100%;min-height: 40px;float: right;text-align: right;font-size: 18px;direction: ltr;">
								<div style="float: right; width: 125px; height: 40px;color:#4cb1ca; font-weight: bold;">
									 : נותן האחריות
								</div>
								<div style="float: right; height: 40px;">
									<?php echo $products[0]->getWarrantyBy() ?>
								</div>	
							</div>
							<div style="width: 100%;min-height: 40px;float: right;text-align: right;font-size: 18px;direction: ltr;">
								<div style="float: right; width: 125px; height: 40px;color:#4cb1ca; font-weight: bold;">
									 : זמן אספקה
								</div>
								<div style="float: right; height: 40px; direction: rtl;">
									* <?php echo $products[0]->getDeliveryTime(); ?> ימי עסקים
								</div>	
							</div>
							<div style="width: 100%;min-height: 40px;float: right;text-align: right;font-size: 18px;direction: ltr;">
								<div style="float: right; width: 125px; height: 40px;color:#4cb1ca; font-weight: bold;">
									 : דואר רשום
								</div>
								<div style="float: right; height: 40px; direction: rtl;">
									<?php echo $products[0]->getShipmentCost() ?> שח
								</div>	
							</div>
							<div style="width: 100%;min-height: 40px;float: right;text-align: right;font-size: 18px;direction: ltr;">
								<div style="float: right; width: 125px; height: 40px;color:#4cb1ca; font-weight: bold;">
									 : דואר שליחים
								</div>
								<div style="float: right; height: 40px; direction: rtl;">
									<?php echo $expressCost; ?> שח
								</div>	
							</div>		
							
							
							<div style="width: 100%;min-height: 40px;float: right;text-align: right;font-size: 18px;direction: ltr;">							
								<div style="height: 40px; direction: ltr;    font-size: 16px;">
									 דואר נע  עד 21 ימי עסקים * 
								</div>	
							</div>							
										
							</div>

					</div>	
					<div class="col-md-8">
						<div class="single-para" style="direction: rtl;">
							<h2 style="text-align: right;color: #f02b63;font-size: 20px;font-weight: bold;"><?php echo $products[0]->getName() ?></h2>
							<br><br>
							<p style="padding-bottom: 30px;color: #000;direction: rtl;font-size: 18px;"><?php echo $products[0]->getDescription() ?>
							
							<?php if(!empty($products[0]->getLinkToManufacturer())): ?>
								<div style="height: 65px;    font-size: 22px;">

									<a href="<?php echo $products[0]->getLinkToManufacturer()?>" style="padding: 10px; background-color: #32b53a; text-decoration: none;" target="_blank">קישור לאתר היצרן</a>
								</div>
							<?php endif; ?>
							
							</p>
							<div class="para-grid" style="    padding: 1.5em 0 2.5em 0;border-top: 1px solid #000;">
								
							
							<form action="product.php?pid=<?php echo $_SESSION['currentPage'] ?>" method="post" style="text-decoration:none; " onsubmit="return check_if_type_checked()">
								<input type="hidden" id="cartAddId" name="cartAddId" value="<?php echo $products[0]->getId(); ?>" />
								<input type="hidden" name="cartAddSum" value="<?php echo $products[0]->getPrice(); ?>" />
								<input type="hidden" name="cartProductName" value="<?php echo $products[0]->getName(); ?>" />	
							    <input type="hidden" name="cartProductImg" value="<?php echo $products[0]->getImagePath(); ?>" />
							    <input type="hidden" name="cartBulkPrecent" value="<?php echo $products[0]->getBulkPrecent(); ?>" />
								<input type="hidden" name="cartBulkSum" value="<?php echo $products[0]->getBulkSum(); ?>" />						    						    						    
								
								
								<?php if(!empty($types)): ?>
								
								<div style="width: 100%; height: 45px; text-align: right; direction: rtl;">
									<span style="font-size: 22px; color: #32b534;">בחר <?php echo $types[0]->getTypeName(); ?> : </span>
									<select class="prodMount" name="type_name" style="float: none;border: 1px solid #89b54b;">
										<option selected="selected" value="0" disabled="disabled">בחר סוג</option>	
										
										<?php if(count($types[0]->getType1())>0): ?>
											<option value="<?php echo $types[0]->getType1() ?>"><?php echo $types[0]->getType1() ?></option>
										<?php endif; ?>
										<?php if(count($types[0]->getType2())>0): ?>
											<option value="<?php echo $types[0]->getType2() ?>"><?php echo $types[0]->getType2() ?></option>
										<?php endif; ?>		
										<?php if(count($types[0]->getType3())>0): ?>
											<option value="<?php echo $types[0]->getType3() ?>"><?php echo $types[0]->getType3() ?></option>
										<?php endif; ?>
										<?php if(count($types[0]->getType4())>0): ?>
											<option value="<?php echo $types[0]->getType4() ?>"><?php echo $types[0]->getType4() ?></option>
										<?php endif; ?>			
										<?php if(count($types[0]->getType5())>0): ?>
											<option value="<?php echo $types[0]->getType5() ?>"><?php echo $types[0]->getType5() ?></option>
										<?php endif; ?>																																							
									</select>
									<span class="must_select" style="color: red; font-size: 18px; display: none;">חובה לבחור סוג</span>
								</div>								
								<?php endif; ?>
								
								<div style="height: 65px;margin-top: 20px;">
								<?php if ($products[0]->getStock()>0):?>
									
									<div style="float: right;margin-top: 6px;text-align: right;">
										<span style="font-size: 22px; color: #32b534; "> הוסף :</span>
									</div>
									<div class="selectMount">
										<select name="mount" class="prodMount" style="border: 1px solid #89b54b;width: 51px;">
											<?php $mount = $products[0]->getStock(); ?>
											<?php for($x=1;$x<=$mount;$x++): ?>
												<option value="<?php echo $x ?>"><?php echo $x ?></option>	
											<?php endfor; ?>									
										</select>
										<input type="hidden" name="stock_max" value="<?php echo $mount; ?>">
									</div>
									<div style="float: right;width: 50px;/* margin-top: 7px; *//* margin-right: 8px; */margin: 0px 14px;position: relative;top: 6px;">
										<span style="font-size: 22px;width: 53px; color: #32b534;">לעגלה</span>										
									</div>
									<div style="float: right; width: 50px;">
									
									
									<?php if($products[0]->getByPhone()==1): ?>
												
												<input class="byphone" style="background:url('images/by_phone.png');border: none;width: 45px;height: 45px; " title="באמצעות אימייל" value="" />
											
											<?php else: ?>
											
												<?php if ($products[0]->getStock()>0):?>
													<input type="submit" class="bayFloating" title="הוסף לעגלה" value="" />
												<?php endif; ?>
												<?php if (($products[0]->getStock()<0) || $products[0]->getStock()==0):?>
													<div style="color: red;font-weight:bold;float:right;font-size: 18px;width: 80px;height: 28px;position: relative;top: 15px;right: -12px;font-size: 15px;border: 1px solid #000;text-align: center;background-color: #fff;border-radius: 15px;padding-top: 2px;">אזל המלאי</div>
												<?php endif; ?>
											
											<?php endif; ?>	
										
										
										
									</div>
								<?php endif; ?>
								<?php if (($products[0]->getStock()<0) || $products[0]->getStock()==0):?>
									<div style="color: red;font-weight:bold;float:right;font-size: 18px;width: 80px;height: 28px;position: relative;top: 15px;right: -12px;">אזל המלאי</div>
								<?php endif; ?>
								</div>

								<div style='font-size: 13px;height: 20px;left: 94px; color:#b9214c;'>									

									<?php
											$vatDivisor = 1 + ($site_info['tax'] / 100);
											$price = $products[0]->getPrice();
											$priceBeforeVat = $price / $vatDivisor;
											?>
											לפני מע"מ : <?php echo number_format($priceBeforeVat, 2) ." &#8362;"; ?>

								</div>

								<div style="height: 40px; text-align: right; direction: rtl;">
									<span style="font-size: 22px; color: #32b534; ">מחיר ליחידה : </span>
									<span  class="add-to" style="direction: rtl;color: #32b534; float: none;"><?php echo $products[0]->getPrice()." &#8362;" ?></span>
								</div>
							</form>
							<br/><br/>
								<?php if($products[0]->getBulkPrecent() != 0): ?>
								<div style="width: 100%; height: 50px;">
								<div style="font-weight:bold;margin-top: 15px;width: 155px;direction: ltr;float:right;background-color: #c2f7d4;height: 35px;clear: both;border: 1px solid #000;">
								
									<div style="width: 60%;float: left;position: relative;top: 5px;text-align: center;font-size: 17px;">
									
										<?php echo $products[0]->getBulkSum() ?> + = <?php echo str_replace("0.", "", $products[0]->getBulkPrecent()) ; ?> %
									
									</div>
									<div style="width: 29%; float: left;">
										<img src="images/bulk_icon.png" alt="bulk" style="width: 32px;" />
									</div>
								</div>
								</div>
								<?php endif; ?>								
								
								<div class="clearfix"></div>
							 </div>
							 
							 
							 	<?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
							 		<div style="width: 100%;text-align: center;height: 50px;">
										<a href="cart.php">
											<img src="images/goToPaiment.png" style="width: 120px;" alt="לתשלום לחץ כאן">
										</a>							 		
							 		</div>	
							 	<?php endif; ?>
							 	
							 
									

						</div>
					</div>
					
					
				<div class="col-md-12" style="margin: 0px; padding:0px; display: inline-block;">

					<div id="Xslider" class="sizeOnDesktop" style="margin: auto;">

					   
					    <?php if($products[0]->getImagePath()!==null && $products[0]->getImagePath()!==''): ?>
					    	<img src="images/prudact/<?php echo $products[0]->getImagePath() ?>" alt="<?php echo $products[0]->getName() ?>" >
					    	<?php else : ""; ?>					    	
					    <?php endif; ?>						    
					    <?php if($products[0]->getImagePath1()!==null  && $products[0]->getImagePath1()!==''): ?>
					    	<img src="images/prudact/<?php echo $products[0]->getImagePath1() ?>" alt="<?php echo $products[0]->getName() ?>" >
					    	<?php else : ""; ?>					    	
					    <?php endif; ?>					    
					    
					    <?php if($products[0]->getImagePath2()!==null  && $products[0]->getImagePath2()!==''): ?>
					    	<img src="images/prudact/<?php echo $products[0]->getImagePath2() ?>" alt="<?php echo $products[0]->getName() ?>" >
					    	<?php else : ""; ?>
					    <?php endif; ?>
					    
					    <?php if($products[0]->getImagePath3()!==null  && $products[0]->getImagePath3()!==''): ?>
					    	<img src="images/prudact/<?php echo $products[0]->getImagePath3() ?>" alt="<?php echo $products[0]->getName() ?>" >
					    	<?php else : ""; ?>
					    <?php endif; ?>
					    
						  <?php if($products[0]->getImagePath4()!==null  && $products[0]->getImagePath4()!==''): ?>
					    	  <img src="images/prudact/<?php echo $products[0]->getImagePath4() ?>" alt="<?php echo $products[0]->getName() ?>" >
					    	  <?php else : ""; ?>	
					    <?php endif; ?>		
					</div>
	
	
				<?php if($products[0]->getYoutubeLink()!=""): ?>
					<div class="hideOnMobile" style="width:70%; margin:auto; text-align: center; padding-top:40px; clear: both;">
						<object style="width: 100%; height: 400px;">
							<param name="movie" value="<?php echo "https://www.youtube.com/v/".$products[0]->getYoutubeLink()."?version=3&amp;hl=iw_IL"; ?>"></param>
							<param name="allowFullScreen" value="true"></param>
							<param name="allowscriptaccess" value="always"></param>
							<embed src="<?php echo "https://www.youtube.com/v/".$products[0]->getYoutubeLink()."?version=3&amp;hl=iw_IL"; ?>" type="application/x-shockwave-flash" style="width: 350px; height: 350px;" allowscriptaccess="always" allowfullscreen="true"></embed>
						</object>	
					</div>		
					<div class="onlyOnMobile" style="width:96%; text-align: center; padding-top:40px; clear: both;">
						<object style="width: 260px; height: 250px;">
							<param name="movie" value="<?php echo "https://www.youtube.com/v/".$products[0]->getYoutubeLink()."?version=3&amp;hl=iw_IL"; ?>"></param>
							<param name="allowFullScreen" value="true"></param>
							<param name="allowscriptaccess" value="always"></param>
							<embed src="<?php echo "https://www.youtube.com/v/".$products[0]->getYoutubeLink()."?version=3&amp;hl=iw_IL"; ?>" type="application/x-shockwave-flash" style="width: 260px; height: 250px;" allowscriptaccess="always" allowfullscreen="true"></embed>
						</object>	
					</div>										
				<?php endif; ?>					
						
				</div>	
					
					
					
				<div class="clearfix"> </div>

				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
			</div>
			
			<?php require_once 'parts/sidebar.php'; ?>
			
		
			<div class="clearfix"> </div>
		</div>
	
		<?php require_once 'parts/footer.php'; ?>

	 </div>
		<script type="text/javascript">
		/*
		$(document).ready(function() {
			$(".etalage_icon").hide();
		});

		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

			 setTimeout(function() {
				 $("#etalage").css("height","266px");
			}, 1000);
			
		}
		*/

		$(function () {

			var ww = $( window ).width();

			if(ww<600){
			    $("#slider").excoloSlider({
			        mouseNav: true,
			        interval: 3000, // = 5 seconds
			        playReverse: true,	
			        width:350,	
			        height:400,		        
			        autoSize:true
			    });
			    $("#slider").css("width","90%");
			    
			}
			else{
			    $("#slider").excoloSlider({
			        mouseNav: true,
			        interval: 3000, // = 5 seconds
			        playReverse: true,
			        width:500,
			        autoSize:false
			    });
			    $("#slider").css("width","500px");
			}
			
		    
		});


	
		</script>

</body>
</html>