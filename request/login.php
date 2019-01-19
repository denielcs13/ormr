<?php include_once '../../config/config.php';
$DB = new DBHandler();
if(isset($_POST["scar_username"]) && strlen($_POST["scar_username"])>0 && isset($_POST["scar_password"]) && strlen($_POST["scar_password"])>0){
	$username=$_POST["scar_username"];
	$password=md5($_POST["scar_password"]);
	
	$query=$DB->runQuery($conn,"SELECT `id`, `uname`, `pass`, `name` FROM `administrator` WHERE `uname`='$username'");	
	if(empty($query)){
		echo '<div class="alert alert-danger">UserName not Found.</div>';
	}else if($query[0]['pass'] !=$password){
		echo '<div class="alert alert-danger"> Password is Wrong.</div>';
	}  else{
		$_SESSION["rac_super_admin_id"]=$query[0]['id'];		
		echo 1;	
}
}

if(isset($_POST["hotel_username"]) && strlen($_POST["hotel_username"])>0 && isset($_POST["hotel_password"]) && strlen($_POST["hotel_password"])>0){
	$username=$_POST["hotel_username"];
	$password=md5($_POST["hotel_password"]);
	$query=$DB->runQuery($conn,"SELECT `id`, `username`, `email`, `mobile`, `country`, `password`, `at_home`, `status`, `admin_id` FROM `login` WHERE `username`='$username'");
	
	if(empty($query)){
		echo '<div class="alert alert-danger"> UserName not Found.</div>';
	}else if($query[0]['password'] !=$password && empty($_POST['login_type'])){
		echo '<div class="alert alert-danger"> Password is Wrong.</div>';
	} else if($query[0]['admin_id'] !=1 || $query[0]['status'] !=1){
		echo '<div class="alert alert-danger"> Your Account is De-Activated.</div>';
	} else{
		unset($_SESSION["rac_login_type"]);
		$_SESSION["rac_admin_id"]=$query[0]['id'];
		$_SESSION["rac_login_type"]=$_POST['login_type'];
                $_SESSION['username']=$query[0]['id'];
		echo 1;
	}
}


if(isset($_POST["password_reset"]) && strlen($_POST["password_reset"])>0 && isset($_POST["password_reset_type"]) && strlen($_POST["password_reset_type"])>0){
	echo '<div class="modal-header">
	<button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
	<h4 class="modal-title">Reset Password</h4>
	</div>
	<div class="modal-body"><div class="col-md-12" id="error-password"></div><input type="hidden" value="'.$_POST["password_reset_type"].'" id="reset_password_reset_type"/><div class="col-md-9 log-input"><input type="text" placeholder="Enter Your Email ID" class="form-control" id="reset_emailid" /></div><div class="col-md-3"><a href="#" class="btn btn-success" id="reset_submit">Submit</a></div><table style="clear: both;"></table></div> <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button></div>';
}

if(isset($_POST["reset_password_email"]) && strlen($_POST["reset_password_email"])>0 && isset($_POST["reset_password_reset_type"]) && strlen($_POST["reset_password_reset_type"])>0){
	$email=$_POST["reset_password_email"];
	$reset_type=$_POST["reset_password_reset_type"];
	if($reset_type==1){
	$query=$DB->runQuery($conn,"select id,password,admin,user,status,name,agent_logo from ch_user where email='$email'");
 	
	if(empty($query)){
		echo '<div class="alert alert-danger">Email ID is not found in our system</div>';
	} else if($query[0]['admin'] !=1 || $query[0]['status'] !=1 || $query[0]['user'] !=1){
		echo '<div class="alert alert-danger"> Your Account is De-Activated.</div>';
	}else{
		$cnt=(strlen($query[0]['id'])>1)?substr($query[0]['id'],0,1):$query[0]['id']; 
		$otp=mt_rand(100, 999).$cnt.mt_rand(10, 99);
		$otp_query=$DB->runQuery($conn,"select id from ch_change_password where otp='$otp' && status='1'  && DATE(datetimes) ='".date('Y-m-d')."'"); 
		if(!empty($otp_query)){
		$otp=mt_rand(10, 99).$cnt.mt_rand(100, 999);
		$otp_query=$DB->runQuery($conn,"select id from ch_change_password where otp='$otp' && status='1' && DATE(datetimes) ='".date('Y-m-d')."' ");
		} 
		$refer=$_SERVER["HTTP_REFERER"];
		$remote=$_SERVER["REMOTE_ADDR"];
		$server=$_SERVER["SERVER_ADDR"];
		$query_insert=$DB->insertQuery($conn,"insert into ch_change_password (otp,email,request_type,table_name,refer,ip_remote,ip_server,`datetimes`) values ('".$otp."','".$email."','".$reset_type."','ch_user','".$refer."','".$remote."','".$server."','".date("y-m-d H:i:s")."')");	
		if($query_insert){
		$to =$email;
		$sub='Dear '.$query[0]['name'].' Reset Password';
		$body='<img src="'.$query[0]['agent_logo'].'" style="width: 150px;   height: 80px;float: left;"/><br/>Dear '.$query[0]['name'].',<br/> Verification Code : '.$otp.' <br/>Please <a href="http://'.$_SERVER["HTTP_HOST"].'/password">Click Here</a> if you want to Change your Password.';
		$from='info@c2shub.com';
		include '../pages/send-mail.php';
		//echo "1";
		}else{
		echo '<div class="alert alert-danger"> Please Request Again To Reset Your Password.</div>';	
		} 
	}
	}else if($reset_type==2){
	
	echo '<div class="alert alert-danger"> Please Contact Your Agent to Reset your Password.</div>';
	/* $query=$DB->runQuery($conn,"select name,id,password,username,status,use_type from ch_other_user where username='$email'");
	if(empty($query)){
		echo '<div class="alert alert-danger">Email ID is not found in our system</div>';
	}else if($query[0]['status'] ==0){
		echo '<div class="alert alert-danger"> Your Account is De-Activated.</div>';
	}else{
		$to =$email;
		$sub='Dear '.$query[0]['name'].' Reset Password';
		$body='Dear '.$query[0]['name'].',<br/> Verification Code : '.$otp.' <br/>Please <a href="'.$_SERVER["HTTP_HOST"].'/password?'.base64_encode($email.'/'.$reset_type).'">Click Here</a> if you want to Change your Password.';
		$from='info@c2shub.com';
		include '../pages/send-mail.php';
		//echo "1";
	} */
	} 
}

if(isset($_POST["verification_code"]) && strlen($_POST["verification_code"])>0){
	$otp=$_POST["verification_code"];
	$otp_query=$DB->runQuery($conn,"select id,request_type,email,table_name from ch_change_password where otp='$otp' && status='1' && DATE(datetimes) ='".date('Y-m-d')."' ");
	if(!empty($otp_query)){
	$query=$DB->runQuery($conn,"select * from ".$otp_query[0]["table_name"]." where email='".$otp_query[0]["email"]."'");	
	if(empty($query)){
		echo '<div class="alert alert-danger">Email ID is not Found.</div>';
	}else if($query[0]['admin'] !=1 || $query[0]['status'] !=1 || $query[0]['user'] !=1){
		echo '<div class="alert alert-danger"> Your Account is De-Activated.</div>';
	} else{		
	$_SESSION["new_password_update"]=$query[0]['id'];
	echo 1;
	}
	
	}else{
	echo '<div class="alert alert-danger"> Your OTP has been Expired.</div>';		
	}
}
if(isset($_POST["get_password"]) && strlen($_POST["get_password"])>0){
	$otp=$_POST["get_password"];
	echo  '<div id="error-verification"></div><form  style="margin-bottom: 10px;"><div class="log-input"> <input type="password" class="lock" placeholder="********" value="" id="reset-newpassword" /></div><div class="log-input"><input type="password" class="lock" placeholder="******" value="" id="reset-newpassword1" /><input type="hidden" value="'.$_SESSION["new_password_update"].'" id="password_user_id" /><input type="hidden" value="reset_password" id="request_from" /><div class="clearfix"></div></div><input type="button" class="btn-info btn btn-block" value="Proceed" id="new-password"></form>';
	}
?>