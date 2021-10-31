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
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">טעינה אלחוטית QI </h3>
					<div class="bottom-grid">
					
								<div style="min-height: 700px;">
				<div style="padding: 30px;">
<h1 style="color: #ff00ff; font-size: 28px;">סוגי גרסאות בתקן HDMI </h1>
<br /><br />
<table border="1" style="border-collapse: collapse; width: 100%;">
	<tr>
		<th style="background-color: #000;"></th>
		<th>HDMI 1.0</th>
		<th>HDMI 1.1</th>
		<th>HDMI 1.2</th>
		<th>HDMI 1.3</th>
    <th>HDMI 1.4</th>
		<th>HDMI 2.0</th>
   	<th>HDMI 2.1</th>
	</tr> 
  <tr>
		<td>תאריך הכרזה</td>
		<td>12.2002</td>
		<td>05.2004</td>
		<td>08.2005</td>
		<td>06.2006</td>	
    <td>05.2009</td>
		<td>04.2013</td> 
    <td>2017</td>
	</tr>
	<tr>
		<td>רזולוציה</td>
		<td>1080p</td>
		<td>1080p</td>
		<td>1080p</td>
		<td>2K</td>	
    <td>4K</td>
		<td>4K</td> 
    <td>8K</td>
	</tr>
	<tr>
		<td>קצב פריימים</td>
		<td>24fbs</td>
		<td>24fbs</td>
		<td>24fbs</td>
		<td>24fbs</td>	
    <td>24fbs</td>
		<td>60fbs</td> 
    <td>120fbs</td>
	</tr>	
	<tr>
		<td>רוחב פס מקסימלי</td>
		<td>4.95Gbps</td>
		<td>4.95Gbps</td>
		<td>4.95Gbps</td>
		<td>10.2Gbps</td>	
    <td>10.2Gbps</td>
		<td>18Gbps</td> 
    <td>48Gbps</td>
	</tr>	
	<tr>
		<td>רענון פיקסלים</td>
		<td>165MHz</td>
		<td>165MHz</td>
		<td>165MHz</td>
		<td>340MHz</td>
		<td>340MHz</td>
		<td>600MHz</td>
    <td>1200MHz</td>
	</tr>
	<tr>
		<td>עומק צבע</td>
		<td>24bit</td>
		<td>24bit</td>
		<td>24bit</td>
		<td>48bit</td>	
    <td>48bit</td>
		<td>48bit</td> 
   	<td>48bit</td>
	</tr>					    
  <tr>
		<td>ערוצי קול</td>
		<td>8</td>
		<td>8</td>
		<td>8</td>
		<td>8</td>	
    <td>8</td>
		<td>32</td>
    <td>32</td>
	</tr>
	<tr>
		<td>קצב דגימת אודיו</td>
		<td>768kHz</td>
		<td>768kHz</td>
		<td>768kHz</td>
		<td>768kHz</td>	
    <td>768kHz</td>
		<td>1536kHz</td>
    <td>1536kHz</td>
	</tr>
 	<tr>
		<td>הגנת תוכן</td>
		<td>HDCP 1.2</td>
		<td>HDCP 1.2</td>
		<td>HDCP 1.2</td>
		<td>HDCP 1.2</td>	
    <td>HDCP 1.4</td>
		<td>HDCP 2.2</td>
    <td>HDCP 2.2</td>
	</tr>
  <tr>
		<td>תלת מימד</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10004;</td>
		<td>&#10004;</td>
    <td>&#10004;</td>
	</tr>
  <tr>
		<td>DTS-HD/Dolby TrueHD</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10004;</td>	
    <td>&#10004;</td>
		<td>&#10004;</td> 
    <td>&#10004;</td>
	</tr>
  <tr>
		<td>מסך 21:9</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>	
    <td>&#10006;</td>
		<td>&#10004;</td>
    <td>&#10004;</td>
	</tr>
  <tr>
		<td>ערוץ HDMI Ethernet</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10004;</td>
		<td>&#10004;</td>
    <td>&#10004;</td>
	</tr>		
  <tr>
		<td>Dual Viewing</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>	
    <td>&#10006;</td>
		<td>&#10004;</td> 
    <td>&#10004;</td>
	</tr>	
	<tr>
		<td>CES 2.0</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10004;</td>
    <td>&#10004;</td>
	</tr>	
 	<tr>
		<td>HDR</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10004;</td>
    <td>&#10004;</td>
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


