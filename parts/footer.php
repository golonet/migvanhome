<?php
$show_msg =false;
if(isset($_REQUEST['cartAddId'])){
	$show_msg = true;
}

?>


	<div class="footer">
	
		<?php if($show_msg): ?>	
			<div class="dialog">
				<span class="closePopUpWindow hide_me" style="font-size: 28px;">X</span>
				
				<br>
				<button class="btn_ng" onclick="location.href = 'cart.php';">לעגלת הקניות</button>
				<button class="btn_ng hide_me">להמשיך בקנייה</button>
				
			</div>
		<?php endif; ?>	
	
	<div id="openByPhoneWindow" style="width: 360px;min-height: 290px;position: fixed;top: 50px;background-color: rgb(255, 255, 255); left: calc(50% - 180px); cursor:pointer; border: 2px solid #000; display: none; padding: 10px;">
		<img class="closePByEmail" alt="close" src="images/notValid.png" style="position: absolute;right: -8px; top: -9px; width: 20px; cursor: pointer;">
		<h3 style="text-align: center;color: #ff6000;">הזמנה דרך האימייל</h3>
		<br><br>
		<form id="sendEmailNotification" action="index.php" method="post" style="direction: rtl;">
				<?php
					$flager = mt_rand(100000, 999999); 
					$_SESSION['formFlager'] = $flager;
	     		?>				
		     	<input type="hidden" name="flager" value="<?php echo $flager; ?>">			
				<span>שם : </span>
				<input id="by_phone_un" type="text" name="by_phone_un">		
				<br/><br/>
				<span>טלפון : </span>
				<input type="text" id="by_phone_up" name="by_phone_up">
				
				<br/><br/>
				<span>אימייל : </span>
				<input type="text" id="by_email_up" name="by_email_up">					
					
				<br/><br/>
				<span>הערות : </span>
				<br/>
				<textarea rows="4" cols="30" id="by_phone_uc" name="by_phone_uc"></textarea>
				<br/>	
				<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LcNdb4UAAAAADtI_bqJxdpfEwqLNplj8Eo4jcto"></div>
				<div style="width: 100%; text-align: center; margin-top: 10px;">
					<input type="submit" value="שלח" style="width: 70px; margin: auto;">
				</div>		
		</form>
	</div>	
	
		<div style="min-height: 60px;width: 100%;    background: #000000;border-radius: 5px;padding: 5px;">
				<?php $i=0; ?>
				<?php foreach($manufacturerNames as $manufacturerName): ?>
					<?php $color = ($i & 1) ? '#f02b63' : '#fff'; ?>
					<a href="search.php?manufacturer=<?php echo $manufacturerName->getName() ?>" style="padding: 6px;color:<?php echo $color; ?>"><?php echo $manufacturerName->getName() ?></a>
					<?php $i++; ?>
				<?php endforeach; ?>		
		
		</div>
	
		<div class="row hideOnMobile" style="margin: 0; direction: rtl; background-color: #000; margin-top: 20px;border-radius: 5px;padding-top: 8px;">
			<div class="col-md-4">
				<div style="width: 100%;margin-bottom: 7px;">
					<a style="color:#fff; font-size: 18px;text-decoration:underline;padding-top: 5px;" href="carsSybols.php?ty=nora" target="_blank">התאמת נורות לרכב</a>
				</div>			
				<div style="width: 100%; margin-bottom: 7px; clear: both;">
					<a style="color:#fff; font-size: 18px;text-decoration:underline;    padding-top: 5px;" href="carsSybols.php?ty=mag" target="_blank">התאמת מגבים לרכב</a>
				</div>	
				<div style="width: 100%; margin-bottom: 7px; clear: both;">
					<a style="color:#fff; font-size: 18px;text-decoration:underline; padding-top: 5px;" href="https://ps-1980.com" target="_blank">מחירון חלפי רכב</a>
				</div>				
			</div>
			<div class="col-md-4">
				<div style="width: 100%;">
					<a style="color:#fff; font-size: 18px;text-decoration:underline;padding-top: 5px;" href="buyingGuide.php" target="_blank">מדריכי קניה</a>
				</div>	
				
				<div style="width: 100%; margin-top: 7px;">
					<a style="color:#fff; font-size: 18px;text-decoration:underline;padding-top: 5px;" href="siteInfo.php" target="_blank">מידע</a>
				</div>	
			</div>

			<div class="col-md-4">
				<div style="width: 100%; ">
					<a href="agreement.php" target="_blank" style="color:#fff; font-size: 18px;text-decoration:underline;padding-top: 5px;">תקנון אתר</a>
				</div>	
				<div style="width: 100%; margin-top: 7px;">
					<a href="serviceWarranty.php" target="_blank" style="color:#fff; text-decoration:underline; font-size: 18px;padding-top: 5px;">שירות ואחריות</a>
				</div>	
				<div style="width: 100%; margin-top: 7px;">
					<a style="color:#fff; font-size: 18px;text-decoration:underline;padding-top: 5px;" href="downloads.php" target="_blank">הורדות</a>
				</div>			
			</div>			
		</div>
	
	

	
		<p class="footer-class" style="margin-top: 15px;">©  , 2014 כל הזכויות שמורות <a href="credit_types.php" style="text-decoration: underline; color: red;">קניות באינטרנט</a> &nbsp; | &nbsp;   
			<a style="color: #1086A3;" target="_blank" class="footerLogo" href="https://www.golonet.co.il/"><img style="position: relative; top: -2px; width: 18px;" src="images/footerLogo.png" alt="Golonet.co.il"> Golonet.co.il </a>
			נבנה ע"י
		</p>
		
			<a href="#home" class="scroll to-Top" style="margin-top: 15px;" title="חזור למעלה">חזור למעלה</a>
	<div class="clearfix"> </div>
	
	
		<div class="ngHeaderBottom" style="width: 100%; height: 60px; background-color: #f00; position:fixed; bottom: 0px; left: 0px; text-align: right;">
			<div class="bottom_menu moreInfo" style="border-bottom: none;">
				מידע נוסף
				<div class="mobileMoreInfoArea">
					<a href="agreement.php" target="_blank">תקנון אתר</a><div class="spacer"></div>
					<a href="serviceWarranty.php" target="_blank" >שירות ואחריות</a><div class="spacer"></div>
					<a href="downloads.php" target="_blank">הורדות</a><div class="spacer"></div>
					<a href="buyingGuide.php" target="_blank">מדריכי קניה</a><div class="spacer"></div>
					<a href="siteInfo.php" target="_blank">מידע</a><div class="spacer"></div>
					<a href="carsSybols.php?ty=nora" target="_blank">התאמת נורות לרכב</a><div class="spacer"></div>
					<a href="carsSybols.php?ty=mag" target="_blank">התאמת מגבים לרכב</a>
				</div>				
			</div>			
			<?php if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])): ?>
				<a class="bottom_menu" href="index.php?logout=1">
					התנתק
				</a>					
			<?php else: ?>
				<a class="bottom_menu" href="account.php">			
					התחבר
				</a>
			<?php endif; ?>				
			<a class="bottom_menu" href="contact.php">
				צור קשר
			</a> 				
			<a class="bottom_menu" href="cart.php">				
				עגלה
			</a> 							
			<a class="bottom_menu"  href="tel:053-3031971">							
				התקשר <i class="fa fa-phone"></i>
			</a> 														 
		</div>	
	
	</div>
	
	<script type="text/javascript" src="js/bootstrap.js"></script>
	 
	<script src="https://golonet.co.il/assets/js/ngMaster_Accessibility.js?curClientKey=65468485&lang=HE"></script>
	 
	<script type="text/javascript" src="js/getResultsName.js?v=4"></script>
	<script type="text/javascript" src="js/internal_scripts.js?v=4"></script>
	