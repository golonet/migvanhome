<?php
require_once '../../classes/conect.class.php';
	//header("Content-Type: text/xml");
	$date = date("d/m/Y");
	
   $con = Conect::connectToDB();
   $result = array();
   
   $subcategory = mysqli_query($con,"SELECT distinct(`category_name`) FROM `products`");

  // print_r($subcategory);
   $category = array();
   while ($row = mysqli_fetch_array($subcategory))  {
		$category[] = $row[0];
	}
	
	$counter = 0;
	foreach ($category as $category){
	
		$dom = new DOMDocument('1.0', 'UTF-8');
		$dom->formatOutput = true;
	
		$fp = fopen("zap_files/zap_products_$counter.xml", "a");
		$count = fread($fp, 11024);
		
	 
	   $result = array();
	   
	   $result = mysqli_query($con,"SELECT * FROM `products` where `category_name` = '$category'");   		
		
	   $store = $dom->createElement("STORE");
	   
	   $dom->appendChild($store);	  
	   $store->setAttribute("URL", "http://www.migvanhome.co.il/");
	   $store->setAttribute("DATE", $date);
	   $store->setAttribute("NAME", "BestStore");
	   $store->setAttribute("STATUS", "ONLINE");	   
	   
	   $products = $store->appendChild($dom->createElement("PRODUCTS"));	
   	   
      while ($row = mysqli_fetch_array($result))  {

     	$description 	 	 = html_entity_decode($row["description"]);
		$description	     = preg_replace('/[^A-Za-z0-9 !@#$%^&*().]/u','', strip_tags($description));
   		$id					 = $row["id"];
		$name				 = htmlspecialchars($row["name"]);
		$description 	 	 = htmlspecialchars($description);
		$delivery_time 	 	 = $row["delivery_time"];
		$warranty 	 		 = $row["warranty"];
		$model 	 		     = $row["model"];
		$shipment_cost 	 	 = $row["shipment_cost"];								
		$manufacturer_name 	 = htmlspecialchars($row["manufacturer_name"]);		
		$img_path		 	 = htmlspecialchars($row["img_path"]);
		$price 	 			 = $row["price"];	
		
		$product = $products->appendChild($dom->createElement("PRODUCT"));
		
		$product->appendChild($dom->createElement("PRODUCT_URL", "http://www.migvanhome.co.il/product.php?pid=$id"));
		$product->appendChild($dom->createElement('PRODUCT_NAME', "$name"));
		$product->appendChild($dom->createElement('MODEL', "$model"));
		$product->appendChild($dom->createElement('DETAILS', "$description"));	
		$product->appendChild($dom->createElement('CATALOG_NUMBER', "$id"));
		$product->appendChild($dom->createElement('CURRENCY', "ILS"));
		$product->appendChild($dom->createElement('PRICE', "$price"));		
		$product->appendChild($dom->createElement('SHIPMENT_COST', "$shipment_cost"));	
		$product->appendChild($dom->createElement('DELIVERY_TIME', "$delivery_time"));		
		$product->appendChild($dom->createElement('MANUFACTURER', "$manufacturer_name"));	
		$product->appendChild($dom->createElement('WARRANTY', "$warranty"));	
		$product->appendChild($dom->createElement('IMAGE', "http://www.migvanhome.co.il/images/prudact/$img_path"));		
		$product->appendChild($dom->createElement('TAX', 1));			
		
      }
      
		$fp = fopen("zap_files/zap_products_$counter.xml", "w");
		
		$counter++;
		//$count = '<urlset> ';
		fwrite($fp, $count);
		
		$count = $dom->saveXML();
		fwrite($fp, $count);
		fclose($fp);
		
		    
		
	}
	
	mysqli_close($con);
	echo "Done";
	
   
	



?>