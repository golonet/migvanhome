<?php
require_once '../../classes/conect.class.php';
	//header("Content-Type: text/xml");
//mysql_query(
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
	<?php 
	
   $con = Conect::connectToDB();
   $result = array();
   
   $subcategory = mysqli_query($con,"SELECT distinct(`category_name`) FROM `products`");

  // print_r($subcategory);
   $category = array();
   while ($row = mysqli_fetch_array($subcategory))  {
		$category[] = $row[0];
	}
	/*
	$files = glob('zap_files/*.{xml}', GLOB_BRACE);
	
	foreach($files as $file) {
	 	if ($file=='zap_files/zap_products_0.xml'){
	 		
	 		unlink('zap_files/zap_products_0.xml');
	 	}
	}
	*/
	
	$files = glob('zap_files/*.{xml}', GLOB_BRACE);
	$counter = 0;
	
	echo "<ul>";
	foreach($files as $file) {
	 	
		echo "<li><a href='zap_files/zap_products_$counter.xml'>$category[$counter]</a></li>";

		$counter++;
	}
	echo "</ul>";

	mysqli_close($con);
	?>
	</body>
</html>