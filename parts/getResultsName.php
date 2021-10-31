<?php
require_once '../classes/product.class.php';

$txt = $_GET["sitetxt"];

$names = Product::getRuseltsByClick($txt);



foreach ($names as $names){
  echo $names[0].",";
}
?>