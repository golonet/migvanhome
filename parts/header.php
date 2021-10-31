<?php

$whitelist = array('127.0.0.1','::1');

if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
	if ($_SERVER['HTTPS'] != "on") {
		$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		header("Location: $url");
		exit;
	}
}


require_once 'classes/manufacturerLinkes.class.php';

require_once 'classes/category.class.php';
require_once 'classes/site_info.class.php';
$site_info = Siteinfo::getSiteInfo();


$categoryTitle = Category::getCategoryTitle();

$pageBaseName = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

$manufacturerNames = LeftSideLinkes::getManufacturerNames();
$quantity = "";

if (isset($_REQUEST['cartAddId']) && isset($_REQUEST['cartAddSum']) && isset($_REQUEST['cartProductName'])){

	if(isset($_REQUEST['mount'])){
		$mount = $_REQUEST['mount'];
	}else{
		$mount = 1;
	}
	
	if(!isset($_SESSION['cart'])){

		$_SESSION['cart'] = array();
		$newItem = array();

		$newItem['unit_name']  = $_REQUEST['cartProductName'];
		$newItem['unit_sum']   = $_REQUEST['cartAddSum'];
		$newItem['unit_id']    = $_REQUEST['cartAddId'];
		$newItem['unit_mount'] = $mount;
		$newItem['unit_img']   = $_REQUEST['cartProductImg'];
		$newItem['unit_bulkPrecent']   = $_REQUEST['cartBulkPrecent'];
		$newItem['unit_bulkSum']   = $_REQUEST['cartBulkSum'];
		$newItem['unit_stock_max']      = $_REQUEST['stock_max'];
		
		
		if(isset($_REQUEST['type_name'])){
			$newItem['unit_type'] = $_REQUEST['type_name'];
		}else{
			$newItem['unit_type'] = "";
		}
	
		array_push($_SESSION['cart'], $newItem);
		setSum();
		 
	}else{

		$id = $_REQUEST['cartAddId'];
		$push = true;
		foreach ($_SESSION['cart'] as $key => $value){
				
			if($value['unit_id']==$id){
				$push = false;
				$_SESSION['cart'][$key]['unit_mount'] = $mount;
				
				if(isset($_REQUEST['type_name'])){
					$_SESSION['cart'][$key]['unit_type'] = $_REQUEST['type_name'];
				}
				
				
			}
			
		}
		
		if($push){
			$newItem = array();
			$newItem['unit_name']  = $_REQUEST['cartProductName'];
			$newItem['unit_sum']   = $_REQUEST['cartAddSum'];
			$newItem['unit_id']    = $_REQUEST['cartAddId'];
			$newItem['unit_mount'] = $mount;
			$newItem['unit_img']   = $_REQUEST['cartProductImg'];
			$newItem['unit_bulkPrecent']   = $_REQUEST['cartBulkPrecent'];
			$newItem['unit_bulkSum']   = $_REQUEST['cartBulkSum'];
			$newItem['unit_stock_max']      = $_REQUEST['stock_max'];
			
						
			array_push($_SESSION['cart'], $newItem);			
		}
		
		setSum();
	}

}

function setSum(){

	$_SESSION['cartAddSum'] =0;

	foreach ($_SESSION['cart'] as $key => $value){

		if($value['unit_mount'] >= $value['unit_bulkSum']){
			$itemPrice = (int)$value['unit_sum'] * (int)$value['unit_mount'] - (((int)$value['unit_mount'] * (int)$value['unit_sum']) * (float)$value['unit_bulkPrecent']);
		}else{
			$itemPrice = $value['unit_sum'] * $value['unit_mount'];
		}

		$_SESSION['cartAddSum']+= $itemPrice;
	}
}

$prodIds ='';
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){

	foreach ($_SESSION['cart'] as $val){
		$prodIds   .= $val['unit_id'].",";
	}
	
	$prodIds = substr($prodIds, 0, -1);
	$cartProducts = Product::getAllCartIds($prodIds);
	
	foreach ($_SESSION['cart'] as $id){
		$selectedIds[] = $id['unit_id'];
	}
	
	
	$selectedIds = implode(",",$selectedIds);
	$shipmentCost = Product::checkBigestShipment($selectedIds);
	$shipmentCost = $shipmentCost[0];

	$expressCost = Product::getExpressCosts($selectedIds);
	$expressCost = $expressCost[0];
	
	if (sizeof($_SESSION['cart']) > 0) {
		$quantity = sizeof($_SESSION['cart']);
	}
}


if(isset($_REQUEST["logout"])){
	session_destroy();
	header("Location:index.php");
}



if(isset($_REQUEST['by_phone_un']) && isset($_REQUEST['by_phone_up']) && isset($_REQUEST['by_phone_uc']) && $_REQUEST['by_phone_un']!=="" && $_REQUEST['by_phone_up']!==""){

	$name = $_REQUEST['by_phone_un'];
	$phone = $_REQUEST['by_phone_up'];
	$comment = $_REQUEST['by_phone_uc'];
	$pid_byPhone  = $_REQUEST['id_for_byPhone']; 
	$by_email_up = $_REQUEST['by_email_up'];
	
	
	
	$to = 'info@migvanhome.co.il,';
	
	$from    = $name;
	$subject = 'הזמנה בעזרת אימייל';
	$headers = "From: $from" . "\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=utf-8";
		
	$msg ="BestStore <br><br> name : $name <br> phone : $phone<br> מספר מוצר : $pid_byPhone  אימייל : $by_email_up <br> comment : $comment";
	
	mail($to, "From : $subject","$msg", $headers);
	
	header("Location:index.php?by_phone_un=1");
}


// if (isset($_REQUEST['g-recaptcha-response']) && $_REQUEST['g-recaptcha-response']!==""){
// 	if(isset($_SESSION['formFlager']) && isset($_REQUEST['flager']) && $_REQUEST['flager']==$_SESSION['formFlager']){
		
		
// 		if(isset($_REQUEST['id_for_byPhone'])){
// 			$prodId = $_REQUEST['id_for_byPhone'];
// 		}else{
// 			$prodId = "";
// 		}
		
// 		$name = $_REQUEST['by_phone_un'];
// 		$phone = $_REQUEST['by_phone_up'];
// 		$comment = $_REQUEST['by_phone_uc'];
		
// 		$to = 'info@migvanhome.co.il';
		
// 		$from    = $name;
// 		$subject = 'הזמנה בעזרת אימייל';
// 		$headers = "From: $from" . "\r\n";
// 		$headers .= "MIME-Version: 1.0" . "\r\n";
// 		$headers .= "Content-type: text/html; charset=utf-8";
		
// 		$msg ="name : $name <br> phone : $phone<br> comment : $comment <br> productId : $prodId";
		
// 		mail($to, "From : $subject","$msg", $headers);
		
// 		header("Location:index.php?by_phone_un=1");
		
// 	}
// }



?>
		<div class="header" id="home">	
			<div class="header-para">
			
				<p style="float: right;">	               
	              <a href="tel:053-3031971" title="053-3031971">שירות לקוחות : 053-3031971 
	             	 <img alt="שירות לקוחות" src="images/call_us.png" style="width: 17px; position: relative;top: -2px;">
	             </a>	  
	              <h1 style="width: 187px;float:right;font-size: 16px;">migvanhome.co.il - הכל לבית</h1>          
	            </p>									
			</div>	
	              <?php 
	              date_default_timezone_set('Asia/Jerusalem');
	              $date = date('d-m-Y');
	              ?>			
			<div class="dateTop" style="float: left; margin-left: 100px;">
				<?php echo $date; ?>
			</div>
				<ul class="header-in">
												
					<?php if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])): ?>	
						<li><a href="wishlist.php" style="color: #7db122;font-size: 1.2em;">הרשימות שלי</a></li>
						<li style="direction: rtl;">					
							<span style="color: #7db122; font-size: 1.2em;">
								<img alt="" src="images/if_profle_1055000.png" style="width: 21px; position: relative; top: -2px; margin-left: 5px;">	שלום	 <?php echo $_SESSION['user_name'] ?>
							</span>
							<a class="hideOnMobile" href="index.php?logout=1" style="text-decoration: underline;color: #7db122;">התנתק</a>
						</li>
					<?php else: ?>
						<li><a class="hideOnMobile" href="account.php?clientMsg=1" style="font-size: 1.2em;">הרשימות שלי</a></li>				
						<li class="hideOnMobile"><a href="account.php">התחבר</a>  | <a href="register.php">לקוח חדש</a> </li>
						
					<?php endif; ?>	
					<li>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="margin-left: 25px;">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>				
					</li>	
			
				</ul>

					<ul class="nav navbar-nav"  style="margin: 0px;">
						<div class="navbar-collapse active collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="">
						<div class=" possible-about" style="direction: rtl;">
		
						<div class="accordion" style="text-align: right;">
							
							<?php 
							$con = Conect::connectToDB();										
							?>
													
							<?php foreach($categoryTitle as $categoryTitle): ?>
							<?php $title_cat = $categoryTitle["category_title"]; ?>
							  	 <h3 class="tab">
									<ul class="place" style="margin: 5px 0; padding: 8px 5px; background: #333333;  width: 100%;  border-bottom:none; border-radius: 5px; -webkit-border-radius: 5px;   -o-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px;">							
										<li class="sort" style="font-size: 18px; "><span style="color: #fff;"><?php echo $title_cat ?></span></li>
										<li class="by"><img src="images/do.png" alt="לחצן בחירה" style="position: relative;"></li>
										<div class="clearfix"> </div>
									</ul>
								</h3>
								<?php $result = mysqli_query($con,"SELECT * FROM `category` WHERE `category_title`='$title_cat'" ); ?>												
								
								
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
					<?php require_once 'googleTranslatePlagIn.php'; ?>
				<div class="clearfix"> </div>
		</div>

		<div class="header-top">
			<div class="logo">
				<a href="index.php">
					<img src="images/logo3.png" alt="logo" style="width: 300px; height: 85px;">
				</a>
			</div>
				
			<div class="header-top-on">
					<ul class="social-in">
						<li><a href="#" title="Youtube"><img alt="Youtube" src="images/if_Youtube_1851799.png" style="width: 47px;margin-right: 3px;"></a></li>
						<li><a href="https://www.facebook.com/best-storecoil-905961002793450/?ref=bookmarks"  title="facebook"><img alt="פייסבוק" style="width: 48px;" src="images/facebook_icon.png"></a></li>
						<li><a href="https://web.whatsapp.com" title="whatsapp"><img alt="whatsapp" src="images/if_24_whatsapp_353469.png" style="width: 50px;" title="whatsapp"></a></li>
						<li><a href="index.php" title="עמוד הבית"><img alt="עמוד הבית" src="images/home_page.png" style="width: 50px;"></a></li>
					</ul>
						<br class="hideOnMobile"/>
       				<span class="hideOnMobile" style="font-style: italic; color: red; font-size: 20px;">נקודות איסוף בתיאום מראש</span><br class="hideOnMobile"/>
        
    				<span class="hideOnMobile" style="font-style: italic;"><a href="https://maps.google.com/?q=32.066297,34.771616" target="_blank" style="text-decoration: underline;color:#000;">אלנבי 94 תל אביב</a>  |  א - ה : 19:00 - 10:00,  ו : 14:00 - 10:00</span>		
				    <br />
				<span class="hideOnMobile" style="font-style: italic;">מגוון הום , פנחס בן דוד 1, רחובות |  א - ה : 20:00 - 10:00,  ו : 14:00 - 10:00</span>
    			
					
			</div>
			
				<div class="clearfix"> </div>
		</div>
		
		<?php if($pageBaseName=="cart.php"){
			$display = "none";
		}else{
			$display = "block";
		}
		?>
		
		<div class="header-bottom" >
				
				<div style="margin: 0.7em 0em;float: right;width: 298px;text-align: right;padding-right: 10px;">
					<a href="account.php?clientMsg=1" class="onlyOnMobile" style="text-decoration: none;   color: #ababab;  font-size: 1.2em; margin: 0em 0.5em; position: relative; top: 4px;">הרשימות שלי</a>
					<a href="index.php" class="menuHover" style="text-decoration: none;  font-size: 1.2em; margin: 0em 0.5em; position: relative; top: 4px;" title="עמוד הבית">עמוד הבית</a>
					<a href="contact.php" class="menuHover" style="text-decoration: none;    font-size: 1.2em; margin: 0em 0.5em; position: relative; top: 4px;" title="צור קשר">צור קשר</a>
				</div>
				
				<?php if(isset($_SERVER['HTTP_USER_AGENT'])){
					$useragent= $_SERVER['HTTP_USER_AGENT'];
				}else{
					$useragent="";
				}
				?>
				<?php if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))): ?>
				<div class="top-nav" style="margin: 0.7em 0em;">	
					<div style="width: 100%; height: 50px;">
						<select id="searchByManufacture" name="manufacturer" style="height: 30px; width: 250px; float: right;text-align:center; ">
							<option value="0" disabled="disabled" selected="selected" style="text-align:center; ">חפש לפי יצרן</option>
							<?php foreach($manufacturerNames as $manufacturerName): ?>
								<option value="<?php echo $manufacturerName->getName() ?>"><?php echo $manufacturerName->getName() ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div style="width: 100%; height: 50px;">
						<input id="searchBtn" type="button" value=" " style="" title="חפש">
						<input id="tags" class="ui-autocomplete-input" style=" width: 250px;" name="byText" type="text" onkeydown="onKeyUp()"  placeholder="חפש" autocomplete="off">
					</div> 
				</div>
			<?php else: ?>
				<div class="top-nav" style="margin: 0.7em 0em; float: right; width: 450px;">	
					<select id="searchByManufacture" name="manufacturer" style="height: 30px;float: left; width: 124px;">
						<option value="0" disabled="disabled" selected="selected" style="text-align: right;">חפש לפי יצרן</option>
						<?php foreach($manufacturerNames as $manufacturerName): ?>
							<option value="<?php echo $manufacturerName->getName() ?>"><?php echo $manufacturerName->getName() ?></option>
						<?php endforeach; ?>
					</select>
					
					<input id="searchBtn" type="button" value=" " style="" title="חפש">
					<input id="tags" class="ui-autocomplete-input" style="" name="byText" type="text" onkeydown="onKeyUp()"  placeholder="חפש" autocomplete="off"> 
				</div>
				
				<?php endif; ?>
				<div class="top-nav tagLinkHeader" style="" onclick="window.location.replace('tags.php')">
						תגיות
					<!-- <a class="tagLinkHeader" href="tags.php" style="">תגיות</a> -->
				</div>
			
				
				
					<div class="cart icon1 sub-icon1" style="text-align: center; display:<?php echo $display; ?>">
					<?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
					
						<a href="cart.php" class="" style="
cursor: pointer;
    font-size: 1.3em;
    color: #666;
    direction: rtl;
    /* border: 1px solid #000; */
    padding: 6px 4px;
    position: relative;
    margin: auto;
    width: 100%;
    top: -8px;
    border: 1px solid #000;
    display: inherit;
						    
   							"><span style="color: #f02b63;"> סל קניות :</span>
							<span class="item cartQuntity"> <?php echo $quantity ?> פריטים</span>
							<span class="rate cartSumVal"><?php echo $_SESSION['cartAddSum'] ?> שח</span>
							
							
							<ul class="sub-icon1 list">
							  <h3 style="text-align: right;">המוצרים שבחרתי</h3>
							  <div class="shopping_cart">
							  
							  <?php foreach ($_SESSION['cart'] as $cartProduct): ?>
								  <div class="cart_box">
								   	 <div class="message">
								   	 		<input type="hidden" name="deleteItem" value="<?php echo $cartProduct["unit_id"] ?>">
								   	 		<input type="hidden" name="cartRemoveSum" value="<?php echo $cartProduct["unit_sum"]; ?>">
								   	     	<a title="הסר מעגלת הקניות" class="alert-close"> </a> 
											<div class="list_img"><img src="images/prudact/<?php echo $cartProduct["unit_img"] ?>" class="img-responsive" alt="<?php echo $cartProduct["unit_name"] ?>"></div>
											<div class="list_desc"><h4><a href="#" style="direction: rtl;"><?php echo "...". mb_substr($cartProduct["unit_name"], 0,25, 'UTF-8'); ?></a></h4>
											<?php if($cartProduct['unit_mount'] >= $cartProduct['unit_bulkSum']): ?>
												<span class="offer"><?php echo $cartProduct["unit_mount"] ?> X <?php echo $cartProduct["unit_sum"]; ?> =  &#8362; <?php echo ((int)$cartProduct['unit_mount'] * (int)$cartProduct['unit_sum']) - (((int)$cartProduct['unit_mount'] * (int)$cartProduct['unit_sum']) * (float)$cartProduct['unit_bulkPrecent']) ?></span>										
											<?php else : ?>
												<span class="offer"><?php echo $cartProduct["unit_mount"] ?> X <?php echo $cartProduct["unit_sum"]; ?> =  &#8362; <?php echo (int)$cartProduct["unit_mount"] * (int)$cartProduct["unit_sum"]; ?></span>										
											<?php endif; ?>
	
											</div>
			                              <div class="clearfix"></div>
		                              </div>
		                            </div>
		                           <?php endforeach; ?> 
			                        </div>
									  <div class="check_button">
										<a href="cart.php">
											<img src="images/goToPaiment.png" style="" alt="לתשלום לחץ כאן">
										</a>								  							  
									  </div>
							      <div class="clearfix"></div>
								</ul>
						
						</a>
						<?php else: ?>
						<h6 class="cartEmptyH6" style="">עגלת הקניות ריקה
							<span class="item cartQuntity">0 פריטים</span>
						</h6>
						
					<?php endif; ?>
					</div>
			<div class="clearfix"> </div>
		</div>

		<div class="hideOnMobile" style="position:fixed; left:0px; ">
			<img src="images/app-payment.jpg" style="width:180px;" />
		</div>
		<div style="width: 100%; height: 40px;">	
		
			<!-- לרשום הודעה למשתמשים -->
		
			<?php $massageToClients=""; ?>
			
			<?php if(!empty($massageToClients)): ?>	
				<marquee s scrollamount="3" direction="right"><?php echo $massageToClients ?></marquee>
			<?php endif; ?>
		</div>		
