<?php
require_once "conect.class.php";

class Users {

	public function __construct(){}

	private $id;
	private $name;
	private $email;

	
	public function getId() {
		return $this->id;
	}	
	public function getName() {
		return $this->name;
	}
	public function getEmail() {
		return $this->email;
	}


	public  function initSelfR($row) {
		$this->id 			 = $row["id"];
		$this->name			 = $row["name"];
		$this->email		 = $row["email"];
	}



	public static function addNewUser($email,$pass,$name){

		$con = Conect::connectToDB();
				
		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);
		$name = mysqli_real_escape_string($con,$name);
		
		
		$result = mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email'");
		
		$if_result = mysqli_num_rows($result);
		
		if($if_result!=0){
			return "not_allwod";
		}else{
			
			mysqli_query($con,"INSERT INTO `users`( `name`, `password`, `email`,`valid`) VALUES ('$name','$pass','$email',0)");
			return "send_email_validation";
		}
		
		mysqli_close($con);

	}

	
	public static function logInUser($uemail, $upass){
		
		$con = Conect::connectToDB();
		
		$email = mysqli_real_escape_string($con,$uemail);
		$pass = mysqli_real_escape_string($con,$upass);
		
		$result = mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email' && `password`='$pass' AND `valid`=1");
		
		$if_result = mysqli_num_rows($result);
		
		if($if_result!=0){
			$user = $row = mysqli_fetch_array($result);
			
			mysqli_close($con);
			
			return $user;
		}else{
			
			mysqli_close($con);
			return "not_allwod";
		}
	}
	
	
	
	public static function getWishlistIds($uId){
		$con = Conect::connectToDB();
		
		
		$result = mysqli_query($con,"SELECT `prod_id` FROM `users_wishlist` WHERE `user_id`=$uId");
		
		while ($row = mysqli_fetch_array($result))  {
			$userWishlistIds[]=$row["prod_id"];
		}
		
		return $userWishlistIds;
		
		mysqli_close($con);
	}
	
	

}





?>