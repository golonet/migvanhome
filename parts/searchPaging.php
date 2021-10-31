<?php
require_once 'classes/conect.class.php';
	$con = Conect::connectToDB();
	
	if(isset($_REQUEST['byText'])){
		$byText = htmlspecialchars($_REQUEST['byText']);
		$byText = str_replace("`","",$byText);
		$byText = str_replace("'","",$byText);
		
		$num = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `products` WHERE name LIKE '%$byText%' OR manufacturer_name = '$byText' OR manufacturer = '$byText'"));
		$cid = $_REQUEST['byText'];
		
	}else if(isset($_REQUEST['byTextSubCategory'])){
		$byText = htmlspecialchars($_REQUEST['byTextSubCategory']);
		$num = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `products` WHERE `category_name` = '$byText'"));
		$cid = $_REQUEST['byTextSubCategory'];

	}else if(isset($_REQUEST['manufacturer'])){
		$byManu = htmlspecialchars($_REQUEST['manufacturer']);
		$num = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `products` WHERE manufacturer_name = '$byManu' OR manufacturer = '$byManu'"));
		$cid = $_REQUEST['manufacturer'];

	}
	
	$thispage = "search.php";
	$by_price="";
	
	if($orderByPrice==1){
		$by_price="&byPrice=1";
	}

	mysqli_close($con);
	
    $per_page = 15; // Number of items to show per page
    
    $showeachside = 4; //  Number of items to show either side of selected page

    if(empty($start))$start=0;  // Current start position

    $max_pages = ceil($num / $per_page); // Number of pages

    $cur = ceil($start / $per_page)+1; // Current page number
    
   
?>


<!-- from search box  -->
<?php
if(isset($_REQUEST['byText'])){
	
	$pageParm = "byText";
	
}elseif(isset($_REQUEST['byTextSubCategory'])){
	
	$pageParm = "byTextSubCategory";
	
}elseif(isset($_REQUEST['manufacturer'])){
	
	$pageParm = "manufacturer";
	
}else{
	$pageParm = "";
}

?>



<?php if($max_pages>1): ?>
<ul class="start" style="direction: ltr;">
 
<?php if(!$start < 1) :?>
<?php $prePage = $start-15 ?>

<li class="arrow">
	<a href="<?php echo $thispage.'?start='.$prePage.'&max=15&'.$pageParm.'='.$cid.$by_price ?>">&laquo;</a>
</li>

<?php endif; ?>
 
<?php 
$eitherside = ($showeachside * $per_page);
if($start+1 > $eitherside)print (" .... ");
$pg=1;

for($y=0;$y<$num;$y+=$per_page)
{
    $class=($y==$start)?"thisPage":"pageLink";
    if(($y > ($start - $eitherside)) && ($y < ($start + $eitherside)))
    {
?>
<li>
	<a class="<?php print($class);?>" href="<?php echo("$thispage".($y>-1?("?start=").$y:""))."&max=$per_page&".$pageParm."=$cid".$by_price;?>"><?php print($pg);?></a>
</li>
<?php
    }
    $pg++;
}
if(($start+$eitherside)<$num)print (" .... ");

?>



<?php if($cur!=$max_pages): ?>
<?php $nextPage = $start+15 ?>

<li>
	<a href="<?php echo $thispage.'?start='.$nextPage.'&max=15&'.$pageParm.'='.$cid.$by_price ?>">&raquo;</a>
</li>
<?php endif; ?>
</ul>

<?php endif; ?>

