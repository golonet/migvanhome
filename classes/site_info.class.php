<?php 
require_once "conect.class.php";


Class Siteinfo{


	public static function getSiteInfo(){

		$con = Conect::connectToDB();

		$result = mysqli_query($con,"SELECT * FROM `site_info`" );

		$row = mysqli_fetch_array($result);

        return $row;		

    }

}
?>