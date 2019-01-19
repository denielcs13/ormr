<?php include_once '../../config/config.php';
$DB = new DBHandler();
if(isset($_POST["update_user_id"]) && strlen($_POST["update_user_id"])>0){
	$user_id			=$_POST["update_user_id"];
	$hotel_id			=$_POST["update_hotel_id"];
	$name				=$_POST["user_name"];
	$email				=$_POST["user_emailid"];
	$mobile				=$_POST["user_mobile"];
	$hotel_name			=$_POST["user_tagncn"];
	$username			=$_POST["user_uname"];
	$password			=$_POST["user_pass"];
	
	//$up_hotel_detail	=$_POST["up_hotel_detail"];
	$website		=$_POST["user_web"];
	//$hotel_rating		=$_POST["hotel_rating"];
	$hotel_address		=$_POST["user_addr"];
	$hotel_landmark		=$_POST["user_landm"];
	$commission		=$_POST["user_comsn"];
	$longitude		=$_POST["user_lon"];
	$lattitude		=$_POST["user_lat"];
	
	$alt_email		=$_POST["user_altemail"];
	$land_line		=$_POST["user_landl"];
	//$alt_landline		=$_POST["alt_landline"];
	$property_type		=$_POST["agency_type"];
	//$country		=$_POST["country"];
		$state		=$_POST["user_state"];
		$city		=$_POST["user_city"];
	if(empty($hotel_id)){
		$count=$DB->numRows($conn,"SELECT `username` FROM `login` WHERE `username`='".$username."'");
	if($count>0){
		echo '<div class="alert alert-danger"> UserName already Taken</div>';
	}else {	
		
		//$serise=$DB->runQuery($conn,"select serise from ch_user where id='".$user_id."'");
		//$hotelcount=$DB->numRows($conn,"select username from ch_hms where user_id='".$user_id."'");
		//$shotelid =$serise[0]["serise"].($hotelcount+1);
            $Q1="INSERT INTO `login`(`username`, `name`, `email`, `password`, `mobile`, `agent`, `country`, `state`, `city`, `commission`, `longitude`,`latitude`, `website`, `address`, `landmark`, `alt_email`, `landline`, `agency_type`,`admin_id`, `createdOn`) VALUES('".$conn->real_escape_string($username)."','".$conn->real_escape_string($name)."','".$email."','".md5($password)."','".$mobile."','".$conn->real_escape_string($hotel_name)."','India','".$state."','".$city."','".$commission."','".$longitude."','".$lattitude."','".$website."','".$conn->real_escape_string($hotel_address)."','".$conn->real_escape_string($hotel_landmark)."','".$alt_email."','".$land_line."','".$property_type."','".$user_id."',NOW())";    
            //echo $Q1;
		$insert=$DB->insertQuery($conn,"INSERT INTO `login`(`username`, `name`, `email`, `password`, `mobile`, `agent`, `country`, `state`, `city`, `commission`, `longitude`,`latitude`, `website`, `address`, `landmark`, `alt_email`, `landline`, `agency_type`,`admin_id`, `createdOn`) VALUES('".$conn->real_escape_string($username)."','".$conn->real_escape_string($name)."','".$email."','".md5($password)."','".$mobile."','".$conn->real_escape_string($hotel_name)."','India','".$state."','".$city."','".$commission."','".$longitude."','".$lattitude."','".$website."','".$conn->real_escape_string($hotel_address)."','".$conn->real_escape_string($hotel_landmark)."','".$alt_email."','".$land_line."','".$property_type."','".$user_id."',NOW())");
		if($insert){
			$hotel_id=$conn->insert_id;
			//include 'hotel-upload-image.php';
			echo 1;
		}else{
			echo '<div class="alert alert-danger"> Hotel is not Register</div>';
		} 
	}		
	}else{		
	$update=$DB->updateQuery($conn,"UPDATE `login` SET  `name`='".$conn->real_escape_string($name)."',`email`='".$email."',`password`='".md5($password)."',`mobile`='".$mobile."',`agent`='".$conn->real_escape_string($hotel_name)."',`state`='".$state."',`city`='".$city."',`commission`='".$commission."',`longitude`='".$longitude."',`latitude`='".$lattitude."',`website`='".$website."',`address`='".$conn->real_escape_string($hotel_address)."',`landmark`='".$conn->real_escape_string($hotel_landmark)."',`alt_email`='".$alt_email."',`landline`='".$land_line."',`agency_type`='".$property_type."' WHERE admin_id='".$user_id."' && id='".$hotel_id."'");
		if($update){			
			//include 'hotel-upload-image.php';
			echo 2;
		}else{
			echo '<div class="alert alert-danger"> Hotel is not Updated Successfully</div>';
		} 	
	}
}
?>