<?php
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();
?>


<!DOCTYPE html>
<html>
<head>
<title>סוגי גרסאות בתקן DisplayPort </title>
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
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">סוגי גרסאות בתקן DisplayPort </h3>
					<div class="bottom-grid">
					
								<div style="min-height: 700px;">
				<div style="padding: 30px;">
<h1 style="color: #ff00ff; font-size: 28px;">סוגי גרסאות בתקן DisplayPort </h1>
<br /><br />
<table border="1" style="border-collapse: collapse; width: 100%;">
	<tr>
		<th style="background-color: #000;"></th>
   	<th>DisplayPort 1.0</th>
		<th>DisplayPort 1.1</th>
		<th>DisplayPort 1.2</th>
		<th>DisplayPort 1.3</th>
    <th>DisplayPort 1.4</th>
		<th>DisplayPort 2.0</th>
	</tr> 
  <tr>
		<td>תאריך הכרזה</td>
   	<td>05.2006</td>
		<td>05.2007</td>
		<td>01.2010</td>
		<td>09.2014</td>
		<td>03.2016</td>	
    <td>06.2019</td>
	</tr>
	<tr>
		<td>רזולוציה</td>
    <td>1080p@60Hz</td>
		<td>1440p@60Hz</td>
		<td>4K@60Hz</td>
		<td>8K@60Hz</td>
		<td>8K@60Hz</td>	
    <td>8K@60Hz</td>
	</tr>
	<tr>
		<td>רוחב פס מירבי</td>
   	<td>10.8Gbps</td>
		<td>10.8Gbps</td>
		<td>21.60Gbps</td>
		<td>32.4Gbps</td>
		<td>32.4Gbps</td>	
    <td>80Gbps</td>
	</tr>	
	<tr>
		<td>עומק צבע</td>
   	<td>24bit</td>
		<td>24bit</td>
		<td>24bit</td>
		<td>24bit</td>
		<td>24bit</td>	
    <td>48bit</td> 
	</tr>					    
  <tr>
		<td>ערוצי קול</td>
   	<td>8</td>
		<td>8</td>
		<td>8</td>	
    <td>8</td>
		<td>32</td>
    <td>32</td>
	</tr>
	<tr>
		<td>קצב דגימת אודיו</td>
   	<td>192kHz</td>
		<td>192kHz</td>
		<td>768kHz</td>
		<td>768kHz</td>
		<td>1536kHz</td>
    <td>1536kHz</td>
	</tr>
 	<tr>
		<td>הגנת תוכן</td>
		<td>&#10006;</td>
    <td>HDCP 1.3</td>
		<td>HDCP 1.3</td>
		<td>HDCP 2.2</td>	
		<td>HDCP 2.2</td>
    <td>HDCP 2.2</td>
	</tr>
  <tr>
		<td>דחיסה</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>	
    <td>DSC 1.2</td>
		<td>DSC 1.2a</td> 
	</tr>
  <tr>
		<td>דחיסה</td>
		<td>HBR</td>
		<td>HBR</td>
		<td>HBR2</td>
		<td>HBR3</td>	
    <td>HBR3</td>
		<td>UHBR 20</td> 
	</tr>
  <tr>
		<td>תלת מימד</td>
		<td>&#10006;</td>
    <td>&#10004;</td>
		<td>&#10004;</td>
		<td>&#10004;</td>
		<td>&#10004;</td>
    <td>&#10004;</td>
	</tr>
	<tr>
		<td>HDR</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10004;</td>
    <td>&#10004;</td>
	</tr>	
 	<tr>
		<td>Multi-stream transport</td>
		<td>&#10006;</td>
		<td>&#10006;</td>
		<td>&#10004;</td>
		<td>&#10004;</td>
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


