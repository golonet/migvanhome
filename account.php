<?php
session_start();

require_once 'classes/users.class.php';
require_once 'classes/product.class.php';
$user_msg = "";
$result = "";

if(isset($_REQUEST['uemail']) && isset($_REQUEST['flager']) ){
	

	$uemail   = $_REQUEST['uemail'];
	$upass    = $_REQUEST['upass'];

	$result = Users::logInUser($uemail, $upass);
	
	if($result=="not_allwod"){
		$user_msg="* חשבון זה אינו נמצא במערכת או שאחד מהשדות אינו נכון";
		
	}else{
		$_SESSION['user_name'] = $result['name'];
		$_SESSION['user_id']   = $result['id'];
		
		$uwl =  Users::getWishlistIds($_SESSION['user_id']);
		
		if(empty($uwl)){
			$_SESSION['user_wishlist'] = array();
		}else{
			$_SESSION['user_wishlist'] = Users::getWishlistIds($_SESSION['user_id']);
		}
		

		header("Location:index.php");
	}
	
}

if(isset($_REQUEST['clientMsg'])){
	$user_msg = "* כדי להשתמש ברשימת המשאלות יש תחילה להתחבר או ליצור לחשבון ";
}

?>
<!DOCTYPE html>
<html>
<head>
<title>החשבון שלי</title>
<meta name="keywords" content="" />
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
		<div class="col-md-9">
			<div class="account-in" style="direction: rtl;">
					<h2 style="padding: 0px;">כניסה לחשבון שלי</h2>
					<br/><br/>
	     			<div style="text-align: center;">
	     				<h4 style="color: #f02b63;font-size: 20px;text-align: right;direction: rtl;"><?php echo $user_msg ?></h4>
	     			</div>		
	     			
					<div class="col-md-5 left-account " style="">
									
						
						<div class="clearfix"> </div>
					</div>	     							
					<div class="col-md-7 account-top">
				
						<?php
							$flager = mt_rand(100000, 999999); 
							$_SESSION['formFlager'] = $flager;
			     		?>			     			
						<form action="account.php" method="post" onsubmit="javascript: return bestStoreConect()">						
							<input type="hidden" name="flager" value="<?php echo $flager; ?>">
							<div> 	
								<span>* אימייל</span>
								<input id="uemail"  type="text" name="uemail">
								<div class="errMsg" style=" color: red;"></div> 
							</div>
							<div> 
								<span class="pass">* סיסמא</span>
								<input id="upass"  type="password" name="upass">
								<div class="errMsg" style="color: red;"></div>
							</div>	
							<div>			
								<input type="submit" value="התחבר" style="float: right;  margin: 10px 10px;width: 200px;">								
							</div> 
						</form>
						
					</div>

				<div class="clearfix"> </div>
			</div>
		</div>
			<?php require_once 'parts/sidebar.php'; ?>
			<div class="clearfix"> </div>
		</div>
	
		<?php require_once 'parts/footer.php'; ?>
	 </div>
		<script type="text/javascript">
			function bestStoreConect(){
				var flag = true;

				var upass  = $("#upass").val();
				var uemail = $("#uemail").val();

				//email
				var regTest = /^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/;
				
				 if(regTest.test(uemail)==false) {
					 $("#uemail").css("border","2px solid red");
					 $("#uemail").parent("div").find(".errMsg").html("יש להוסיף כתובת אימייל תקינה");	
					 flag = false;
					} 
				 else{
					 $("#uemail").css("border","1px solid #ccc");
					 $("#uemail").parent("div").find(".errMsg").html("");
				 } 


				 //pass
				 var regPassword = new RegExp(/^(?=.*[a-zA-Z])(?=.*\d)[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{6,10}$/);
					
					 if(regPassword.test(upass)==false) {
						 $("#upass").css("border","2px solid red");
						 $("#upass").parent("div").find(".errMsg").html("הסיסמה חייבת להכיל בין 6-10 תווים באנגלית ולפחות מספר אחד");	
						 flag = false;
						} 
					 else{
						 $("#upass").css("border","1px solid #ccc");
						 $("#upass").parent("div").find(".errMsg").html("");
					 } 

					
				return flag;
			}

					//one num ,one letter,one spesial char(not at start)
			 //var regPassword = new RegExp(/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{6,10}$/);
			
		</script>
</body>
</html>