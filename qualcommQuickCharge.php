<?php
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();
?>


<!DOCTYPE html>
<html>
<head>
<title>סוגי גרסאות בתקן HDMI </title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">טעינה מהירה  Qualcomm Quick Charge</h3>
					<div class="bottom-grid">
					
								<div style="min-height: 700px;">
				<div style="padding: 30px;">
<h1 style="color: #ff00ff; font-size: 28px;">הבדלים בין סוגי גרסאות Quick Charge 1-4</h1>
<br /><br />
<table border="1" style="border-collapse: collapse; width: 100%;">
	<tr>
		<th style="background-color: #000;"></th>
		<th>Quick Charge 1.0</th>
		<th>Quick Charge 2.0</th>
		<th>Quick Charge 3.0</th>
		<th>Quick Charge 4.0</th>
	</tr> 
  <tr>
		<td>תאריך הכרזה</td>
		<td>2013</td>
		<td>2014</td>
		<td>2016</td>
		<td>2017</td>	
	</tr>
	<tr>
		<td>מתח</td>
		<td>5V</td>
		<td>5-9-12V</td>
		<td>3.6-20V</td>
		<td>3.6-20V</td>	
	</tr>
	<tr>
		<td>זרם</td>
		<td>2A</td>
		<td>1.67A-2A-3A</td>
		<td>2.6A-4.6A</td>
		<td>2.6A-4.6A</td>	
	</tr>	
	<tr>
		<td>טעינה מירבית</td>
		<td>5V-10W</td>
		<td>9V-18W</td>
		<td>12V-36W</td>
		<td>20V-100W</td>	
	</tr>	
	<tr>
		<td>USB-PD</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10004;</td>
	</tr>
	<tr>
		<td>מתח אופטימלי</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>INOV 1.0/2.0</td>
		<td>INOV 3.0</td>	
	</tr>					    
  <tr>
		<td>טעינה מקבילה</td>
		<td>&#10006;</td>
		<td>Dual Charge</td>
		<td>Dual Charge+</td>
		<td>Dual Charge++</td>	
	</tr>
	<tr>
		<td>מתח גבוה</td>
		<td>&#10006;</td>
		<td>HVDCP</td>
		<td>HVDCP+</td>
		<td>HVDCP++</td>	
	</tr>
 	<tr>
</table>

<br /><br />
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
	 </div>
		
</body>
</html>


