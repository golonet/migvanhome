<?php
session_start();

// echo "<pre>";
// print_r($_SESSION); die();
// echo "</pre>";


// if not localhost and not have https->redirect
if ($_SERVER['HTTP_HOST']=="localhost"){

}else{

	if(isset($_SERVER['HTTPS'])){

	}else{

		header("Location:https://migvanhome.co.il/cart.php");
		exit;
	}
}

$prodsNames ='';
$title = '';
$productsNames = '';
$hide = "";
$notes = '';

require_once 'classes/product.class.php';


if(isset($_REQUEST['payMode']) && $_REQUEST['payMode']==1){ // by credit

	if (isset($_REQUEST['firstName']) && isset($_REQUEST['phone'])
			&& isset($_REQUEST['email']) && isset($_REQUEST['deliveryAdress'])&& isset($_REQUEST['zipCode'])
			&& isset($_REQUEST['bankClientName'])&& isset($_REQUEST['TZ']) && isset($_REQUEST['innerGuid']) && $_REQUEST['innerGuid']==$_SESSION['innerGuid']){

				foreach ($_SESSION['cart'] as $key => $value){
						
					if(!empty($value['unit_type'])){
						$utype= $value['unit_type'];
					}else{
						$utype= "אין";
					}
						
					$productsNames .= "name : ".$value['unit_name']." X ".$value['unit_mount']." = ".$value['unit_sum']." סוג : ".$utype."<br />";
				}
				if(isset($productsNames)){
					$_SESSION['productsNames'] = $productsNames;
				}

				if(isset($_REQUEST['notes'])){

					$notes = $_REQUEST['notes'];
				}

				////// purchase details
				$firstName  	 = htmlspecialchars($_REQUEST['firstName']);
				
				$phone	   		 = htmlspecialchars($_REQUEST['phone']);
				$phone 			 = str_replace("-", "", $phone);
				$email	   		 = htmlspecialchars($_REQUEST['email']);
				$deliveryAdress  = htmlspecialchars($_REQUEST['deliveryAdress']);
				$zipCode         = htmlspecialchars($_REQUEST['zipCode']);
				$bankClientName  = htmlspecialchars($_REQUEST['bankClientName']);
				//$TZ		         = htmlspecialchars($_REQUEST['TZ']);

				$deliverTo       = htmlspecialchars($_REQUEST['getDeleiveryType']);

				$deliveryType  	 = htmlspecialchars($_REQUEST['deliveryType']);

				$totlaDeal = $_SESSION['cartAddSum'] + (int)$deliveryType;

				$cName = $firstName;

				// save order details to session for mail
				$_SESSION['ufn'] = $cName;
				$_SESSION['uphone'] = $phone;
				$_SESSION['uemail'] = $email;
				$_SESSION['udeliveryAdress'] = $deliveryAdress;
				$_SESSION['uzipCode'] = $zipCode;
				//$_SESSION['utz'] = $TZ;
				$_SESSION['utotlaDeal'] = $totlaDeal;
				$_SESSION['ubankClientName'] = $bankClientName;
				$_SESSION['udeliveryType'] = $deliveryType;
				$_SESSION['notes'] = $notes;
				$_SESSION['deliverTo'] = $deliverTo;

				
				require_once 'classes/conect.class.php';
				$con = Conect::connectToDB();
				$orderDetails = ' שם : '.$_SESSION['ufn'].' טלפון : '.$_SESSION['uphone'].' כתובת '.$_SESSION['udeliveryAdress'].' מיקוד '.$_SESSION['uzipCode'].' קבלה על שם '.$_SESSION['ubankClientName'].' סכום העסקה '.$_SESSION['utotlaDeal'].' מוצרים '.$_SESSION['productsNames'].' סכום משלוח '.$_SESSION['udeliveryType'].' סוג משלוח : '.$_SESSION['deliverTo'];
				mysqli_query($con,"INSERT INTO `delivery_details`(`orderdetails`, `number`) VALUES ('$orderDetails','0');");
				//$lastId = mysqli_query($con,"SELECT MAX(id) FROM `delivery_details`");
				//$lastId = mysqli_fetch_row($lastId);
				$lastId = mysqli_insert_id($con);
				$kabalaNum = "invoice_".$lastId;
				$_SESSION['kabalaNum'] = $kabalaNum;
				
				/*
				mysqli_query($con,"UPDATE `delivery_products` 
										   SET `ufn`='$cName',`uphone`='$phone',`uemail`='$email',`udeliveryAdress`='$deliveryAdress',
								          `uzipCode`='$zipCode',`utz`='$TZ',`utotlaDeal`='$totlaDeal',`ubankClientName`='$bankClientName',`udeliveryType`='$deliveryType',
							              `notes`='$notes',`deliverTo`='$deliverTo',`kabalaNum`='$kabalaNum'");
				*/
				
				mysqli_query($con,"UPDATE `delivery_details` SET `number`='$kabalaNum' WHERE `id`=$lastId");

				//require_once 'parts/deliveryMail.php';		
				require_once("EZcount_php_example/open_clearing_form.php");

				
				
				
				//send to ZCredit
				//require_once("ZCreditProxy_PHP/ZCreditProxy.php");
				//ZCreditHelper::PayWithInvoice("9000000014", "avi79", $totlaDeal, 1, Languages::Hebrew, CurrencyType::NIS, "XX232lsUU", "Test Item", 1, "https://migvanhome.co.il/images/CreditCardsFinel.png", "https://migvanhome.co.il/parts/notifyPage.php?lid=$lastId", "https://migvanhome.co.il/parts/notifyPage.php?lid=$lastId", false, true, false, false, $cName, $phone, $email, $TZ,1, 1);
					
				//header("Location:gotozcredidPayment.php?zcredit=445648654&totlaDeal=$totlaDeal&cName=$cName&phone=$phone&email=$email&tz=$TZ");
	} // if isses
}// mode



if(isset($_REQUEST['payMode']) && $_REQUEST['payMode']==2){	// by phone

	$firstName  	 = htmlspecialchars($_REQUEST['firstName']);

	$phone	   		 = htmlspecialchars($_REQUEST['phone']);
	$phone 			 = str_replace("-", "", $phone);
	$email	   		 = htmlspecialchars($_REQUEST['email']);


	$cName = $firstName;

	$_SESSION['ufn'] = $cName;
	$_SESSION['uphone'] = $phone;
	$_SESSION['uemail'] = $email;
	$_SESSION['utotlaDeal'] = $_SESSION['cartAddSum'];

	foreach ($_SESSION['cart'] as $key => $value){
		
		if(!empty($value['unit_type'])){
			$utype= $value['unit_type'];
		}else{
			$utype= "אין";
		}
		
		$productsNames .= "name : ".$value['unit_name']." X ".$value['unit_mount']." = ".$value['unit_sum']." סוג : ".$utype."<br />";
	}
	if(isset($productsNames)){
		$_SESSION['productsNames'] = $productsNames;
	}
	
	if(isset($_REQUEST['notes'])){
		
		$notes = $_REQUEST['notes'];
	}



	require_once 'parts/deliveryMailPhone.php';
	header("Location:index.php?order=46546523153");

}



if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
	header("Location:index.php");
	exit;
}

if(!isset($_SESSION['innerGuid'])){
	$_SESSION['innerGuid'] = strtoupper(md5(uniqid(rand(), true)));
}

?>
<!DOCTYPE html>
<html>
<head>
<title>העגלה שלי</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
<style type="text/css">
	input,textarea{border-radius: 7px;}
</style>
</head>
<body> 
<!--header-->
	<div class="container" style="padding: 0px;">
		<?php require_once 'parts/header.php'; ?>
		
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">ראשי</a><b>&#9668;</b><span style="color: #4cb1ca;  text-decoration: none;  font-weight: 800;">העגלה שלי</span></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					
					<div class="bottom-grid">					
						<div class="check-out">
				    	    <h4 class="title">רשימת המוצרים</h4>
				    	    
						  	<?php foreach ($_SESSION['cart'] as $cartProduct): ?>
							  <div class="cart_box">
							   	  <div class="message">
							   	 		<input type="hidden" name="deleteItem" value="<?php echo $cartProduct["unit_id"] ?>">
							   	 		<input type="hidden" name="cartRemoveSum" value="<?php echo $cartProduct["unit_sum"]; ?>">
							   	     	<a title="הסר מעגלת הקניות" class="alert-close"> </a> 
										<div class="list_img">
											<img src="images/prudact/<?php echo $cartProduct["unit_img"] ?>" style="width: 125px;" class="img-responsive" alt="<?php echo $cartProduct["unit_name"] ?>">
										</div>
										<div class="list_desc">
										<h4><a href="#" class="cartProdText" style=""><?php echo $cartProduct["unit_name"]; ?></a></h4>
										<div style="font-size: 26px;direction: ltr;text-align: right;margin-top: 23px;">
										<form action="cart.php"  method="post"  style="font-size: 16px; width: 100%; height: 55px; ">
											 
											 
											<input type="hidden" name="cartAddId" value="<?php echo $cartProduct["unit_id"]; ?>" />
											<input type="hidden" name="cartAddSum" value="<?php echo $cartProduct["unit_sum"]; ?>" />
											<input type="hidden" name="cartProductName" value="<?php echo $cartProduct["unit_name"]; ?>" />	
										    <input type="hidden" name="cartProductImg" value="<?php echo $cartProduct["unit_img"]; ?>" />										     
										    <input type="hidden" name="cartBulkPrecent" value="<?php echo $cartProduct["unit_bulkPrecent"]; ?>" />
											<input type="hidden" name="cartBulkSum" value="<?php echo $cartProduct["unit_bulkSum"]; ?>" />											 

											 <div>
												<select onchange="this.form.submit()" name="mount" class="prodMount" style="">
													<?php $mount = $cartProduct["unit_stock_max"]; ?>
													<?php for($x=1;$x<=$mount;$x++): ?>
														<option value="<?php echo $x ?>"><?php echo $x ?></option>	
													<?php endfor; ?>									
												</select>
												
												<span class="cartCalcPrice">
													<?php if($cartProduct['unit_mount'] >= $cartProduct['unit_bulkSum']): ?>
														<?php echo  $cartProduct["unit_mount"] ?> X <?php echo $cartProduct["unit_sum"]; ?> =  &#8362; <?php echo ((int)$cartProduct['unit_mount'] * (int)$cartProduct['unit_sum']) - (((int)$cartProduct['unit_mount'] * (int)$cartProduct['unit_sum']) * (float)$cartProduct['unit_bulkPrecent']) ?>										
													<?php else : ?>
														<?php echo $cartProduct["unit_mount"] ?> X <?php echo $cartProduct["unit_sum"]; ?> =  &#8362; <?php echo $cartProduct["unit_mount"] * $cartProduct["unit_sum"]; ?>										
													<?php endif; ?>										
												</span>												
											</div>
											<div>

											 <?php if(!empty($cartProduct["unit_type"])): ?>
											 	<span style="margin-right: 10px;"> סוג  - <?php echo $cartProduct["unit_type"] ?></span>
											 <?php endif; ?>																						 
											</div>

										

										</form>

										</div>
										</div>
		                              <div class="clearfix"></div>
	                              </div>
	                            </div>
	                           <?php endforeach; ?> 
	                           
	                           
								<div class="title" style="height: 50px; background-color: #f7f7f7; color: #f04a7e;  font-size: 23px;  padding: 8px;">
									<div style='float:left; width:45%;'>
										סה"כ &nbsp;&nbsp;&nbsp;<span id="showTotal2"><?php echo $_SESSION['cartAddSum'] ?> ש"ח</span>	 
									</div>
									<div style='float:left; width:45%; font-size:18px;margin-top: 6px;color:#b9214c;'>
											
									<?php
											$vatDivisor = 1 + ($site_info['tax'] / 100);
											$price = $_SESSION['cartAddSum'];
											$priceBeforeVat = $price / $vatDivisor;
											?>
											לפני מע"מ : <?php echo number_format($priceBeforeVat, 2) ." &#8362;"; ?>	 
									</div>

								</div>
				    			    
   
				    	</div>
						<div class="row">

						<div class="col-md-12">
							
							
							<div  style="height: 100px; margin: auto;">
							
								<div class="row">
									<div class="col-md-4 col-xs-12" style="    margin-top: 20px;">
										<img class="goToPayPal" src="https://www.paypal.com/he_IL/i/btn/x-click-but01.gif" onclick="gotoPaymentMode('paypal')" style="border-radius: 8px; width: 100px;" alt="by paypal" />
									</div>
									<div class="col-md-4 col-xs-12" style="    margin-top: 20px; display: none;">
										<img class="goToPhone" src="images/phonePaimentPic.png" onclick="gotoPaymentMode('phone')" alt="by credit" style="border-radius: 8px; width: 180px;" />
									</div>
									
									<div class="col-md-4 col-xs-12" style="    margin-top: 20px;">
										<img class="goToCredit" src="images/creditPaimentPic.png" onclick="gotoPaymentMode('credit')" alt="by credit"style="border-radius: 8px; width: 180px;" />
									</div>			
								</div>
    
							</div>	
									
							<form id="phoneZone" action="cart.php" method="post" style="margin-top: 20px; height:420px; margin-right: 10px; display: none;" onsubmit="return validatePhoneForm()">					
									<div style="width: 61%; height: 40px; text-align: right; font-weight: bold;">
										<div style="float: right;">פרטי המזמין</div>
										<div style="float: left;">&nbsp;</div>
									</div>
									<div style="width: 100%; float: right;">
										<div style="width: 100%; clear: both; height: 44px;">
											<div style="width: 130px; float: right; height: 30px;">
												שם פרטי :
											</div>
											<div style="width: 197px; float: right; height: 30px;">
												<input id="nameRegP" type="text" name="firstName" style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;"  />
												<img id="checkMyNameP" style="height: 16px;float: left; width: 16px; display: none; position: relative; top: 3px;" src="" alt="My Name" />
											</div>	
										</div>	
										<div style="width: 100%; clear: both;    height: 44px;">
											<div style="width: 130px; float: right; height: 30px;">
												שם משפחה :
											</div>
											<div style="width:197px; float: right; height: 30px;">
												<input id="secondNameP" type="text" name="secondName" style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;"    />
												<img id="checkMySecondNameP" style="height: 16px;float: left; display: none; width: 16px;position: relative; top: 3px;" src="" alt="My Last Name" />
											</div>	
										</div>						
										<div style="width: 100%; clear: both;    height: 44px;">
											<div style="width: 130px; float: right; height: 30px;">
												טלפון :
											</div>
											<div style="width: 197px; float: right; height: 30px;">
												<input id="phoneP" type="text" name="phone" style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;" />
												<img id="checkMyPhoneP" alt="" style="height: 16px;float: left; width: 16px; display: none;position: relative; top: 3px;" src="" alt="My Phone" />
											</div>	
										</div>	
										<div style="width: 100%; clear: both;    height: 44px;">
											<div style="width: 130px; float: right; height: 30px;">
												דואר אלקטרוני :
											</div>
											<div style="width: 197px; float: right; height: 30px;    height: 44px;">
												<input id="emailValP" type="text" name="email" style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;"  />
												<img id="checkMyEmailP" style="height: 16px;float: left; width: 16px;position: relative; display: none; top: 3px;" src="" alt="My Email" />
											</div>	
										</div>
									
									</div>
									
									<div style="width: 400%; float: right;">	
				
										
										<div style="width: 100%; clear: both; display: none;">
											<div style="width: 130px; float: right; height: 30px;">
												סה"כ
											</div>
											<div style="width: 130px; float: right; height: 30px;">
												<?php if(isset($_SESSION['cartAddSum']) && !empty($_SESSION['cartAddSum'])): ?>
													<input type="hidden" id="cartSum" value="<?php echo $_SESSION['cartAddSum'] ?>" />
													<div id="showTotal">
													<?php echo $_SESSION['cartAddSum'] ?>
													</div>
												<?php endif; ?>
											</div>	
										</div>

										<div style="width: 100%; clear: both;">
											
				          					<div style="width: 100%; height: 70px; clear: both;">
												<div style="float: right; margin-right: 110px;">
													
													<div style="width: 100px;position: relative;top: 20px;">
														<input type="submit" value="2" name="payMode" style="font-size: 1px;background: url('images/phonePaimentPicSmall.png'); width: 104px; cursor:pointer; height: 35px;background-repeat: no-repeat;"  />
													</div>
												</div>
											</div>	
																
										</div>
										<div style="width: 100%; clear: both; color: red;text-align: center;padding-top: 15px;">
											<div id="notValilatREP"></div>
										</div>
									</div>																																	
								</form>										
									
								<!-- https://www.paypal.com/cgi-bin/webscr -->									
								<form id="paypalZone" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="height: 420px; margin-right:20px; float: right; margin-top: 50px;  display: none;" onsubmit="return validatePayPal()">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="upload" value="1" />
									<input type="hidden" name="business" value="payment@migvanhome.co.il" />
																											
									<input id="paypalShipping" type="hidden" name="shipping_1" value="<?php echo $shipmentCost ?>" style="width: 90%;height: 60px;padding: 3px;    border: 1px solid #222; border: 1px solid #222;" />
										
										
									<div style="width: 100%; clear: both;height:70px; font-size: 12px; height: 50px;">
										<label style="font-size: 18px;">דואר אלקטרוני</label>
										<input type="email" name="paypalEmail" id="paypalEmail" maxlength="25" style="border-radius:none;">
										<img id="checkMyEmail_b" style="height: 16px;  display: none; width: 16px;position: relative; top: -3px;" src="" alt="email" />
									</div>		

									<div style="width: 100%; clear: both;height:70px; font-size: 12px; height: 50px;">
										<label style="font-size: 18px;">טלפון</label>
										<input type="text" name="paypalphone" id="paypalPhone" maxlength="25" style="border-radius:none;">
										<img id="checkMyPhone_pp" style="height: 16px;  display: none; width: 16px;position: relative; top: -3px;" src="" alt="phone" />
									</div>										

			   						<div style="width: 100%; clear: both;height:85px;">
											<div style="width: 130px; float: right; height: 30px; font-size: 20px;">
												שיטת משלוח
											</div>
											<div style="width:280px; float: right; height: 30px;">
											<select id="deliveryType" class="deliveryType" name="deliveryType" onchange="deliveryChangeP()"  style="font-size: 20px; width: 250px;">
												<option selected="selected" disabled="disabled" value="">בחר שיטת משלוח</option>
												<option id="post" value="<?php echo $shipmentCost ?>" data-delivery_type="0000">
													<?php echo ' משלוח בדואר רשום '.$shipmentCost.' שח'  ?>
												</option>												
												<option id="shlihim" value="<?php echo $expressCost ?>" data-delivery_type="3333">דואר שליחים <?php echo $expressCost ?>  שח </option>													
												<option id="telAviv" value="0" data-delivery_type="1111">איסוף עצמי : אלנבי 94 ת"א</option>
												<option id="rehovot" value="0" data-delivery_type="2222">איסוף עצמי : פנחס בן דוד 1, רחובות</option>
											
											</select>
												<img id="checkdeliveryTypePayPal"  style="height: 16px; width: 16px;   position: relative; top: -3px; display: none;" src="" alt="cant stay empty" />
											</div>	
									</div>								
									
									
									<div>* פרטי הנמען ילקחו מחשבון PayPal,  לשינוי פרטים יש לרשום בהערות חשבון PayPal</div>
									
									<br>
									<div style="width: 100%; clear: both;height:70px; font-size: 12px; height: 100px;">
										<input type="checkbox" name="aggremante" id="aggremantePayPal"  />
										
										<span id="aggremanteMsgPayPal" style="font-size: 18px;">* קראתי את תקנון האתר, ואני מסכים לתנאים המפורטים בו </span>
										
										<a href="agreement.php" style="color: red;" target="_blank">(תקנון האתר)</a>
									</div>
									<?php $counterNG = 1; ?>				
									
									<!-- שליחת כמות ומחיר עבור כל מוצר בודד פיפאל עושים את החישוב הכללי -->
									<?php foreach ($_SESSION['cart'] as $cartProduct): ?>
									
										<input type="hidden" name="item_name_<?php echo $counterNG ?>" value="<?php echo $cartProduct['unit_name']; ?>" />
										<input type="hidden" name="quantity_<?php echo $counterNG ?>" value="<?php echo $cartProduct['unit_mount']; ?>" />										
											<?php 
											if($cartProduct['unit_mount'] >= $cartProduct['unit_bulkSum']){
												$itemPrice = ((int)$cartProduct['unit_sum'] -((int)$cartProduct['unit_sum'] * (float)$cartProduct['unit_bulkPrecent']));
											}else{
												$itemPrice = $cartProduct['unit_sum'];
											}						
											?>
											<input type="hidden" name="amount_<?php echo $counterNG ?>" value="<?php echo $itemPrice; ?>" />
										
										<?php $counterNG++ ?>
									<?php endforeach; ?>
									
									<input type="hidden" name="currency_code" value="ILS" />
																		
									<input type="image"  src="https://www.paypal.com/he_IL/i/btn/x-click-but01.gif" id="paypalsubmit" style="width: 97px;" alt="Make payments with PayPal - it's fast, free and secure!" />
									<input type="hidden" id="delivery_details" value="<?php echo strip_tags($_SESSION['productsNames']); ?>">
								</form>								
													
							
							<form id="creditZone" action="cart.php" method="post" style="margin-top: 20px; height:420px; margin-right: 10px;display: none;" onsubmit="return validateForm()">
								<input type="hidden" name="innerGuid" value="<?php echo $_SESSION['innerGuid']; ?>" />
								<input type="hidden" id="cartSum" name="deliveryType" value="<?php echo $_SESSION['cartAddSum'] ?>" />
								<input type="hidden" id="getDeleiveryType" name="getDeleiveryType" value="" />
								
		   						<div style="width: 100%; clear: both;height:70px;">
									<div style="width: 130px; float: right; height: 30px; font-size: 20px;">
										שיטת משלוח
									</div>
									<div style="width:280px; float: right; height: 30px;">
									<select id="deliveryType" class="deliveryType" name="deliveryType" onchange="deliveryChangeP()"  style="font-size: 20px; width: 250px;">
										<option selected="selected" disabled="disabled" value="">בחר שיטת משלוח</option>
										<option id="post" value="<?php echo $shipmentCost ?>" data-delivery_type="0000">
											<?php echo ' משלוח בדואר רשום '.$shipmentCost.' שח'  ?>
										</option>
										<option id="shlihim" value="<?php echo $expressCost ?>" data-delivery_type="3333">דואר שליחים <?php echo $expressCost ?>  שח </option>							
										<option id="telAviv" value="0" data-delivery_type="1111">איסוף עצמי : אלנבי 94 ת"א</option>
										<option id="rehovot" value="0" data-delivery_type="2222">איסוף עצמי : פנחס בן דוד 1, רחובות</option>
									
									</select>																		
									
									<img id="checkdeliveryType" style="height: 16px; width: 16px;   position: relative; top: -3px; display: none;" src="" alt="סוג משלוח" />
									</div>											
								</div>
																	
								<div style="width: 61%; height: 40px; text-align: right; font-weight: bold;">
									<div style="float: right;">פרטי המזמין</div>
									<div style="float: left;">&nbsp;</div>
								</div>
								<div style="width: 100%;">
									<div style="width: 100%; clear: both;height:70px;">
										<div style="width: 130px; float: right; height: 30px;">
											שם הנמען :
										</div>
										<div style="width:250px; float: right; height: 30px;">
											<input style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;" id="nameReg" type="text" name="firstName"  />
											<img id="checkMyName" style="height: 16px; width: 16px;  display: none; position: relative; top: -3px;" src="" alt="error name" />
										</div>	
									</div>	
									<div style="width: 100%; clear: both;height:70px;">
										<div style="width: 130px; float: right; height: 30px;">
											קבלה על שם :
										</div>
										<div style="width:250px; float: right; height: 30px;">
											<input style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;" id="bankClientName" type="text" name="bankClientName"   />
											<img id="checkMybankClientName" style="height: 16px; width: 16px;position: relative; display: none; top: 3px;" src="" alt="My bank Client Name" />
										</div>	
									</div>						
									<div style="width: 100%; clear: both;height:70px;">
										<div style="width: 130px; float: right; height: 30px;">
											טלפון :
										</div>
										<div style="width:250px; float: right; height: 30px;">
											<input style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;" id="phone" type="text" name="phone" />
											<img id="checkMyPhone" alt="" style="height: 16px;  display: none; width: 16px;position: relative; top: -3px;" src="" alt="error phone" />
										</div>	
									</div>	
									<div style="width: 100%; clear: both;height:70px;">
										<div style="width: 130px; float: right; height: 30px;">
											דואר אלקטרוני :
										</div>
										<div style="width:250px; float: right; height: 30px;">
											<input style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;" id="emailVal" type="text" name="email"  />
											<img id="checkMyEmail" style="height: 16px;  display: none; width: 16px;position: relative; top: -3px;" src="" alt="error email" />
										</div>	
									</div>
									<div style="width: 100%; clear: both;height:70px;">
										<div style="width: 130px; float: right; height: 30px;">
											כתובת משלוח :
										</div>
										<div style="width:250px; float: right; height: 30px;">
											<input style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;" id="deliveryAdress" type="text" name="deliveryAdress"   />
											<img id="checkMyDeliveryAdress" style="height: 16px; width: 16px; display: none;position: relative; top: -3px;" alt="My Delivery Adress" src="" />
										</div>	
									</div>		
									<div style="width: 100%; clear: both;height:70px;">
										<div style="width: 130px; float: right; height: 30px;">
											מיקוד :
											<a href="http://www.israelpost.co.il/zipcode.nsf/demozip" target="_blank" style="font-size: 12px; color: red;">איתור מיקוד</a>
										</div>
										<div style="width:250px; float: right; height: 30px;">
											<input style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;" id="zipCode" type="text" name="zipCode"  />
											<img id="checkMyzipCode" style="height: 16px; width: 16px;position: relative; display: none; top: 3px;" src="" alt="My zip Code" />								
											
										</div>	
									</div>	

									<div style="width: 100%; clear: both;height:70px; display: none;">
										<div style="width: 130px; float: right; height: 30px;">
											ח"פ / ת.ז :
										</div>
										<div style="width:250px; float: right; height: 30px;">
											<input style="width: 90%;height: 30px;padding: 3px; border: 1px solid #222; border: 1px solid #222;" id="tzHp" type="text" name="TZ" />
											<img id="checkMytzHp" style="height: 16px; width: 16px;position: relative; top: -3px; display: none;" src="" alt="My Id Number" />
										</div>	
									</div>	
								
									<div style="width: 100%; clear: both;height:70px;  height: 124px;">
										<div style="width: 130px; float:right; height: 30px;">
											הערות : 
										</div>
										<div style="width: 250px; float:right; height: 30px;">
											<textarea name="notes" rows="4" cols="30" style="resize:none;border: 1px solid #222;"></textarea>
										</div>
									</div>								
								
									
									<div style="width: 100%; clear: both;height:70px; font-size: 12px; height: 50px;">
										<input type="checkbox" name="aggremante" id="aggremante"  />
										<span id="aggremanteMsg" style="font-size: 18px;">* קראתי את תקנון האתר, ואני מסכים לתנאים המפורטים בו </span>
										<a href="agreement.php" style="color: red;" target="_blank">(תקנון האתר)</a>
									</div>
							
									<div style="width: 100%;clear: both;height:70px;color: red;text-align: center;font-size: 20px;">
										<div id="notValilatRE"></div>
									</div>									
									
									<div style="width: 100%;clear: both;height: 67px;text-align: center;">
										<input type="submit" value="1" name="payMode" style="float: right; margin:auto;font-size: 1px;background: url('images/creditPaimentPic.png'); width: 147px; cursor:pointer; height: 46px;"  />																		
									</div>

								</div>
							</form>	
							
							
					</div>
					<br/>
					<div class="col-md-12" style="clear: both;    margin-top: 100px;">	
						<div class="col-md-6 hideOnMobile" style="text-align: center;">		
							<img src="images/ssl_certificate_logo.png" style="width: 180px; margin-right: 7px;" alt="ssl" />
							<div style="width: 100%;">
								<img src="images/SSL2048.png" style="width: 90px; margin-right: 1px; margin-top: 10px;" alt="ssl2048" />
								<img src="images/ssl_lock.png" style="width: 90px; margin-right: 1px; margin-top: 10px;" alt="ssllock" />
							</div>
						</div>
						
						<div class="col-md-6" style="padding-top: 32px; padding: 0px;">
							<br><br>
							<div style="width: 100%; text-align: center; ">
								<img style="width: 90%;" src="images/creditPicFinel.jpg" alt="pay options pic" />
							</div>
						</div>				
					</div>
				</div>
					<div class="clearfix"> </div>
					</div>
				</div>
			</div>

			<?php require_once 'parts/sidebar.php'; ?>
			<div class="clearfix"> </div>
		</div>

		<?php require_once 'parts/footer.php'; ?>
		
		<script type="text/javascript" src="js/cart_setting_js.js?v=<?php echo rand(100,1000); ?>"></script>
	 </div>
		
</body>
</html>