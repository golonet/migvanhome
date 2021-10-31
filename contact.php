<?php
session_start();

require_once 'classes/users.class.php';
require_once 'classes/product.class.php';
$user_msg = "";
$result = "";

if(isset($_REQUEST['uemail']) && isset($_SESSION['formFlager']) && isset($_REQUEST['flager']) && $_REQUEST['flager']==$_SESSION['formFlager']){


	$uemail   = $_REQUEST['uemail'];
	$upass    = $_REQUEST['upass'];

	$result = Users::logInUser($uemail, $upass);
	
	if($result=="not_allwod"){
		$user_msg="* חשבון זה אינו נמצא במערכת או שאחד מהפרטים אינו נכון";
		
	}else{
		$_SESSION['user_name'] = $result['name'];
		$_SESSION['user_id']   = $result['id'];
		header("Location:index.php");
	}
	
}


if(isset($_REQUEST['flager']) && isset($_REQUEST['name']) && isset($_REQUEST['g-recaptcha-response'])){

	$name 		= $_REQUEST["name"];
	$mail 		= $_REQUEST["email"];
	$subject 	= $_REQUEST["masseg"];
	
	$to = 'info@migvanhome.co.il';
	$from = 'best-store';
	$headers = "From: $from" . "\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=utf-8";
	
	$massage ="
	שם : $name
	מייל : $mail
	כותב : $subject
	";
	
	mail($to,"From : $mail","$massage", $headers);
	$mailIsSend = "<div class='fullWidth' style='color: #63ff63;padding: 10px;background-color: #717171;text-align: center;'>ההודעה נשלחה בהצלחה ניצור איתך קשר בהקדם</div>";
}

?>
<!DOCTYPE html>
<html>
<head>
<title>צור קשר</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>

<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">ראשי</a><b>&#9668;</b><span style="color: #4cb1ca;  text-decoration: none;  font-weight: 800;">צור קשר</span></h6>
		</div>
		<div class="content">
		<div class="contact" style="direction: rtl;">

				<div class="col-md-4 contact-bottom">
					<h3>מידע</h3>
					<ul class="social ">
						<li><span>נקודות איסוף בתיאום מראש</span></li>
						<li>אלנבי 94 תל אביב | א - ה : 19:00 - 10:00, ו : 14:00 - 10:00</li>
						<li><span>מגוון הום ,פנחס בן דוד 1 רחובות | א - ה : 19:00 - 10:00</span></li>						
					</ul>
					<hr style="padding: 1px; background-color: #000;">
							
					 <div style="width: 100%; clear: both;">       
				        <i class="ion-ios-email-outline" style="float: right;margin-left: 30px;"></i>   
			            <p>ת.ד 29040 , תל אביב   | מיקוד 6129001</p>
					 </div>							
							
					<div class="map">
						<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAjTQ0w0pJn2d1deLB8TnZBhAAByjAFCac'></script>
						<div style='overflow:hidden;height:370px;width:100%;'><div id='gmap_canvas' style='height:350px;width:100%;box-shadow: 0px 0px 14px #444; border-radius: 15px;'></div>
						<!-- 
						<div><small><a href="http://embedgooglemaps.com">embed google maps</a></small></div>
						<div><small><a href="freedirectorysubmissionsites.com">click</a></small></div>
						 -->
						
						<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
						</div>
						<script type='text/javascript'>function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(32.066297,34.771616),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(32.066297,34.771616)});infowindow = new google.maps.InfoWindow({content:'נקודת איסוף : אלנבי 94, תל אביב .<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
															
					</div>
				</div>
				<div class="col-md-8 contact-top">
					<?php if (isset($mailIsSend)){echo $mailIsSend;} ?>
					<h3>צור קשר</h3>
					<form id="contactForm1" action="contact.php" method="post">					
						<?php
							$flager = mt_rand(100000, 999999); 
							$_SESSION['formFlager'] = $flager;
			     		?>				
			     	<input type="hidden" name="flager" value="<?php echo $flager; ?>">					
					
					<div>
						<div>* שם </div>
						<input id="name" type="text" name="name">
						<div class="errMsg" style="margin-left: 100px; color: red;"></div> 
					</div> 				
					<div> 	
						<div class="me-at">* אימייל </div>
						<input id="email" type="text" name="email"> 
						<div class="errMsg" style="margin-left: 100px; color: red;"></div> 
					</div>
					<div> 
						<div class="word-in">&nbsp; הודעה  </div>
						<textarea id="masseg" name="masseg"> </textarea>
					</div>			
					<br>	
					   <div class="g-recaptcha" data-sitekey="6LcNdb4UAAAAADtI_bqJxdpfEwqLNplj8Eo4jcto"></div>
					
						<input type="submit" value="שלח"> 
					</form>
				</div>				
			<div class="clearfix"> </div>
		</div>

			<div class="clearfix"> </div>
		</div>
	
		<?php require_once 'parts/footer.php'; ?>
	 </div>
		<script type="text/javascript">


				 $('#contactForm1').on('submit',function(event){
					 event.preventDefault();
					
					var flag = true;
					var name   = $("#name").val();
					var email = $("#email").val();
					var captcha = grecaptcha.getResponse();


					 if(captcha.length == '' || typeof captcha=== "undefined"){ 

						 alert("חובה לסמן אני לא רובוט");								 					
						 flag = false;
						 
					}				
					
					 if(name.length < 2 || !isNaN(name)){ 
						 
						 $("#name").css("border","2px solid red");
						 $("#name").parent("div").find(".errMsg").html("יש להוסיף שם תקין");			 
						 
						 flag = false;
						 
					}
					 else{
						 $("#name").css("border","1px solid #ccc");
						 $("#name").parent("div").find(".errMsg").html("");
					 } 

					//email
					var regTest = /^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/;
					
					 if(regTest.test(email)==false) {
						 $("#email").css("border","2px solid red");
						 $("#email").parent("div").find(".errMsg").html("יש להוסיף כתובת אימייל תקינה");	
						 flag = false;
						} 
					 else{
						 $("#email").css("border","1px solid #ccc");
						 $("#email").parent("div").find(".errMsg").html("");
					 } 

					 if (flag) this.submit();
					
			});

					//one num ,one letter,one spesial char(not at start)
			 //var regPassword = new RegExp(/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{6,10}$/);
			
		</script>
</body>
</html>