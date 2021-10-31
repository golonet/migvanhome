<?php
session_start();


require_once 'classes/users.class.php';
require_once 'classes/product.class.php';
$user_msg = "";
$result = "";


if(isset($_REQUEST['uemail']) && isset($_REQUEST['uname']) && isset($_REQUEST['upass']) ){
	//echo $_SESSION['formFlager']."=".$_REQUEST['flager'];
	$uname    = mysql_real_escape_string($_REQUEST['uname']);
	$uemail   = mysql_real_escape_string($_REQUEST['uemail']);
	$upass    = mysql_real_escape_string($_REQUEST['upass']);

	$result = Users::addNewUser($uemail, $upass, $uname);
	
	if($result=="not_allwod"){
		$user_msg="חשבון זה כבר נמצא במערכת ,לא ניתן להרשם שוב";
		
	}elseif ($result=="send_email_validation"){
		$user_msg="ההרשמה בוצעה בהצלחה , בדקות הקרובות ישלח לך אימייל <br/> יש ללחוץ על הלינק שנשלח לסיום ההרשמה";
		
		$to 	 = $uemail;
		
		$subject = 'best-store - הרשמה';
		$headers = "From: best-store" . "\r\n";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=utf-8";
		 
		$replymessage = "<html>
		<head>
		<meta http-equiv='content-type' content='text/html; charset=utf-8' />
		</head>
		<body style='direction:rtl;'>
			<h2>ברוכים הבאים ל best-store </h2>
			<a href='https://www.migvanhome.co.il/parts/userEmailValidation.php?flagg=892347d7899s97987987x789&email=$uemail'>יש ללחוץ כאן לסיום ההרשמה</a>
		</body>
		</html>
		";
		
		mail($to, "From : $subject","$replymessage", $headers);
		
	}else{
		$user_msg = "שגיאת מערכת";
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
<title>הרשמה</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">ראשי</a><b>&#9668;</b><span style="color: #4cb1ca;  text-decoration: none;  font-weight: 800;">קטגוריות</span></h6>
		</div>
		<div class="content">
		<div class="col-md-9">
			<div class="account-in register-top" style="direction: rtl;">
				<h2 style="color: #f02b63; text-align: center;">הרשמה</h2>
				<div class="account-top register">
					<?php		
					if(!isset($_SESSION['formFlager'])){
						$_SESSION['formFlager'] = mt_rand(100000, 999999);
					}
		     		?>	
		     		
		     		<?php if($result=="send_email_validation"): ?>
		     			<div style="text-align: center;">
		     			<h4 style="color: #f02b63;font-size: 30px;text-align: right;direction: rtl;"><?php echo $user_msg ?></h4>
		     			</div>
		     		<?php else : ?>
		     			<h4 style="color: red;direction: rtl;"><?php echo $user_msg ?></h4>
						<form action="register.php" method="post" onsubmit="javascript: return bestStoreRegister()">
							<input type="hidden" name="flager" value="<?php echo $_SESSION['formFlager']; ?>">
							<div> 	
								<span>* שם &nbsp;&nbsp;&nbsp;</span>
								<input id="uname" type="text" name="uname">
								<div class="errMsg" style="margin-left: 100px; color: red;"></div> 
							</div>
							<div> 	
								<span>* אימייל</span>
								<input id="uemail"  type="text" name="uemail">
								<div class="errMsg" style="margin-left: 100px; color: red;"></div> 
							</div>
							<div> 
								<span class="pass">* סיסמא</span>
								<input id="upass"  type="password" name="upass">
								<div class="errMsg" style="margin-left: 100px; color: red;"></div>
							</div>				
							<input type="submit" value="שלח"> 
						</form>
		     		<?php endif; ?>				

				</div>
					
			</div>	
		</div>
			<?php require_once 'parts/sidebar.php'; ?>
			<div class="clearfix"> </div>
		</div>
	
		<?php require_once 'parts/footer.php'; ?>
	 </div>
		<script type="text/javascript">
			function bestStoreRegister(){
				var flag = true;

				var uname   = $("#uname").val();
				var upass  = $("#upass").val();
				var uemail = $("#uemail").val();

				//  name
				
				 if(uname.length < 2 || !isNaN(uname)){ 
					 
					 $("#uname").css("border","2px solid red");
					 $("#uname").parent("div").find(".errMsg").html("יש להוסיף שם תקין");			 
					 
					 flag = false;
					 
				}
				 else{
					 $("#uname").css("border","1px solid #ccc");
					 $("#uname").parent("div").find(".errMsg").html("");
				 } 

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