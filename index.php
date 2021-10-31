<?php 
session_start();

require_once 'classes/product.class.php';

require_once 'classes/category.class.php';

$categoryTitle2 = Category::getCategoryTitle();
// ui-accordion-header
?>
<!DOCTYPE html>
<html>
<head>
<title>ראשי</title>

<?php require_once 'parts/head_tags.php'; ?>


 
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">ראשי</a><b>&#9668;</b><span style="color: #4cb1ca;  text-decoration: none;  font-weight: 800;">מותגים</span></h6>
		</div>
		<div class="content">
		<?php if(isset($_REQUEST['order']) && $_REQUEST['order']=="15465464654"):?>
			<div class="deliveryADD" style="padding: 20px;background-color: #444;color: #fff;width: 310px;position: fixed;left: calc(50% - 153px);top:250px;text-align: right;z-index: 9999;border: 3px solid #90e89a;font-size: 19px;">
			<span>ההזמנה בוצעה בהצלחה בדקות הקרובות ישלח אליך אימייל עם פרטי ההזמנה</span>
			<img alt="סגור" class="closeADD" src="images/close.png" style="position: relative;top: -90px;left: 36px;width: 22px;background-color: #444;padding: 2px;border-radius: 15px;">
			</div>
		<?php endif; ?>
		
		<?php if(isset($_REQUEST['by_phone_un']) && $_REQUEST['by_phone_un']=="1"):?>
			<div class="deliveryADD" style="padding: 20px;background-color: #444;color: #fff;width: 310px;position: fixed;left: calc(50% - 153px);top:250px;text-align: right;z-index: 9999;border: 3px solid #90e89a;font-size: 19px;">
				<span>פנייתך התקבלה נחזור אליך בהקדם</span>
				<img alt="סגור" class="closeADD" src="images/close.png" style="position: relative;top: -90px;left: 36px;width: 22px;background-color: #444;padding: 2px;border-radius: 15px;">
			</div>
		<?php endif; ?>		
		
		
			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<div class="hideOnMobile">
						<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">מותגים</h3>
						<div class="bottom-grid">							
							<?php foreach($manufacturerNames as $manufacturerName): ?>						
							<div class="col-md-2 manufacturerArea" style="padding-right: 0px; ">
								<div class="bottom-grid-top">
									<a href="search.php?manufacturer=<?php echo $manufacturerName->getName(); ?>">
										<img class="img-responsive" style="height: 60px; width: 190px;" src="images/manufacturerlogo/<?php echo $manufacturerName->getImage(); ?>" alt="<?php echo $manufacturerName->getName(); ?>">														
									</a>
								</div>
							</div>
							<?php endforeach; ?>
							<div class="clearfix"> </div>
						</div>
					    <br/><br/><br/><br/>
						<h3 style="padding: 0px; text-align: center; font-size: 34px; background-color: #f5f5f5;">שירות ואחריות</h3>
						
						<div style="height: 150px; width: 100%; margin-top: 20px;">
				
        					<a href="http://www.fetaya.com/" target="_blank">
								<img src="images/importerLogo/a.Fetaya.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
				     		<a href="http://www.igil.co.il/" target="_blank">
								<img src="images/importerLogo/A.Y.Gil.Carmel.Agencies.&.Distribution.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
            		  	 	 <a href="https://www.advice.co.il/" target="_blank">
								<img src="images/importerLogo/Advice_Logo.JPG" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
         					<a href="https://www.d.co.il/415250/39960/" target="_blank">
								<img src="images/importerLogo/AyalaPlast.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
			
      	     				<a href="http://www.eurolux.co.il/" target="_blank">
								<img src="images/importerLogo/ILUMINA.LTD_Logo.JPG" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>  
          					<a href="http://alfatek.co.il/" target="_blank">
								<img src="images/importerLogo/Alfatek.Technologies.Ltd_Logo.JPG" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
				     		<a href="http://ps-1980.com/index.php" target="_blank">
								<img src="images/importerLogo/Bitan.Spark.Trade.1980.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
         					<a href="http://www.benda.co.il/" target="_blank">
								<img src="images/importerLogo/Benda.Magntic.Ltd_Logo.JPG" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
      						</a>
				
             				<a href="http://www.bconnect.co.il/" target="_blank">
								<img src="images/importerLogo/Bconnect.Technologies.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>     
          					<a href="http://gpltd.co.il/" target="_blank">
								<img src="images/importerLogo/Green.Power_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
				     		<a href="http://www.daganm.co.il/" target="_blank">
								<img src="images/importerLogo/Dagan.Multimedia.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
         					<a href="http://dealor.co.il/" target="_blank">
								<img src="images/importerLogo/Dealor.Ltd_Logo.JPG" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>	
  			     			<a href="https://www.b144.co.il/b144_sip/401C041341726D5F40100110.aspx" target="_blank">
								<img src="images/importerLogo/MAGAR.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>  
          					<a href="http://www.morlevi.co.il/" target="_blank">
								<img src="images/importerLogo/Mor.Levi.Technologies.Ltd_Logo.JPG" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
				     		<a href="https://www.microsoft.com/he-il" target="_blank">
								<img src="images/importerLogo/Microsoft.Isreal.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
         					<a href="http://www.saynet.co.il/" target="_blank">
								<img src="images/importerLogo/SAYNET.Ltd_Logo.JPG" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>		
    		     			<a href="http://www.samsungmobile.co.il/" target="_blank">
								<img src="images/importerLogo/Suny.communication.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
          					<a href="https://www.semicom.co.il/" target="_blank">
								<img src="images/importerLogo/Semicom.Lexis.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
				     		<a href="http://www.skl.co.il/" target="_blank">
								<img src="images/importerLogo/Sakal.Electronics.Ltd_Logo.JPG" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
         					<a href="http://astragal.co.il/" target="_blank">
								<img src="images/importerLogo/Katzenstein.Adler.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>
			
      	     				<a href="http://ronlight.co.il/" target="_blank">
								<img src="images/importerLogo/Ronlight.Digital.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>   
        					
				     		<a href="http://www.oki.co.il/" target="_blank">
								<img src="images/importerLogo/Sher.Electronics.1988.Ltd_Logo.jpg" alt="" style="width: 190px; height: 60px; margin-right:40px; float: left;margin-bottom:10px;" />
							</a>                
        				</div>						
					</div>
					<div class="onlyOnMobile" style="width: 100%;">
					<ul class="nav navbar-nav">
						<div class="navbar-collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="padding-right: 5px;padding-left: 5px;">
						
						<div class=" possible-about" style="direction: rtl;">
		
						<div class="accordion" style="text-align: right;">
							
							<?php 
								$con = Conect::connectToDB();				
							?>
													
							<?php foreach($categoryTitle2 as $categoryTitle2): ?>
							<?php $title = $categoryTitle2[0]; ?>
							  	 <h3 class="tab" style="border: none; padding: 3px; background: #000;  border-bottom: 1px solid #fff;">
									<ul class="place" style="margin: 5px 0; background:#000;   width: 100%;  border-bottom:none; border-radius: 5px; -webkit-border-radius: 5px;   -o-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px;  padding: 0px 2px;">							
										<li class="sort" style="font-size: 18px; "><span style="color: #f02b63;"><?php echo $title ?></span></li>
										<li class="by">
											<img src="images/do.png" alt="לחצן בחירה" style="position: relative;">
										</li>
										<div class="clearfix"> </div>
									</ul>
								</h3>
								<?php $result = mysqli_query($con,"SELECT * FROM `category` WHERE `category_title`='$title'" ); ?>												
								
								
								  <div class="tab" style="display: none; height: auto;">	
								  <?php $catName = array(); ?>
								  <?php while ($row = mysqli_fetch_array($result)): ?>	
								  	<?php $catName[] = $row["name"]; ?>
								  <?php endwhile; ?>	
								  
								  	<?php foreach($catName as $catName): ?>
								  	<div style="width: 100%; height: 30px;">
										<a href="search.php?byTextSubCategory=<?php echo $catName ?>" style="font-size: 18px;" title="<?php echo $catName ?>"><?php echo $catName ?></a>
									</div>
									 <?php endforeach; ?>
								  </div>				
								
							<?php endforeach; ?>

							</div>	
							</div>						
						</div>				
				
					</ul>
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