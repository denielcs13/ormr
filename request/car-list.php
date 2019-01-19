<?php include_once '../../config/config.php';
include('../../config/pagination.php');
error_reporting(0);
$page	= new page();
$DB = new DBHandler();
$per_page = 15;
if(isset($_POST["page"])){
 $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); 
	if(!is_numeric($page_number)){die('Invalid page number!');}
}else{
    $page_number = 1;

}
if(isset($_POST["user_view"]) && strlen($_POST["user_view"])>0 && isset($_POST["view_user_id"]) && strlen($_POST["view_user_id"])>0){
	$user_id=$_POST["view_user_id"];
	$condition=array();
	if(!empty($_POST["user_name"])){	
		$condition[]="c_name='".$_POST["user_name"]."'";
	}
	$condition[]="admin_id='$user_id'";
	 $htl_qry="SELECT `c_id`, `c_name`, `c_image`, `admin_id`, `c_status` FROM `cars` LEFT OUTER JOIN administrator ON administrator.id=cars.admin_id where ".implode(" && ",$condition)." order by cars.c_id desc";
         //echo $htl_qry;
         $query_htl=$DB->numRows($conn,$htl_qry);
	if(empty($query_htl)){
		echo '<div class="alert alert-danger"> No record Found.</div>';
	} else{
 $totalpages = ceil($query_htl/$per_page);
 $page_position = (($page_number-1) * $per_page);
 $cnt=$page_position+1;
 $htl_qry .=" LIMIT $page_position, $per_page";
 $query=$DB->runQuery($conn,$htl_qry);
		echo '<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>											
											<th>Car Name</th>
											<th>Image</th>                                                                                        
											<th>Status</th>											
											<th ';
											echo ($user_id==2)?'colspan="7"':'colspan="6"';
											echo 'style="text-align:center;">Action</th>										</tr>
									</thead>
									<tbody>
										';//$cnt=1;
									foreach($query as $val){
										$status=($val["c_status"]==1)?'<a href="#" data-hotel_id="'.$val["c_id"].'" title="Admin Active" class="btn btn-xs btn-success" id="hotel_status" data-status="'.$val["c_status"].'"><i class="fa  fa-plus-circle"></i> Active</a>':'<a href="#" data-hotel_id="'.$val["c_id"].'" title="Admin Active" class="btn btn-xs btn-danger" id="hotel_status" data-status="'.$val["c_status"].'"><i class="fa  fa-minus-circle"></i> In-active</a>';
										
										echo '<tr><td>'.$cnt.'</td>';										
										echo '<td>'. $val["c_name"].'</td><td><img src="../car_images/'.$val["c_image"].'" style="height:100px;width:100px;" /></td><td >'.$status.'</td><td><a class="btn btn-xs btn-warning" href="car-ra-details?token='.$val["c_id"].'"><i class="fa fa-file-o"></i> View</a></td><td><a href="car-ra-add?token='.$val["c_id"].'" title="Edit" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
										';
										if($user_id==2){
										echo '<td><a href="hotel-room?token=agent&&access='.$val["driver_id"].'" title="Rooms" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Rooms</a></td>';	
										}
										
//										echo '<td><a title="Login" class="btn btn-xs btn-info" id="admin_hotel_login" data-username="'.$val["username"].'" data-password="'.$val["password"].'"><i class="fa fa-unlock"></i> Login</a></td></tr>';
$cnt++;
										}
										
										echo '
									</tbody>
								</table><center>';
	echo $page->fun_pagination($per_page, $page_number, $query_htl, $totalpages);
	echo '</center>';
	}
}
if(isset($_POST["hotel_id"]) && strlen($_POST["hotel_id"])>0 && is_numeric($_POST["hotel_id"]) && isset($_POST["hotel_userid"]) && strlen($_POST["hotel_userid"])>0  && is_numeric($_POST["hotel_userid"]) ){
	$user_id=$_POST["hotel_userid"];
	$hotel_id=$_POST["hotel_id"];
	$hotel_status=$_POST["hotel_status"];
	$select=$DB->runQuery($conn,"SELECT `id` FROM `administrator` WHERE `id`='$user_id'");
	if(!empty($select)){
	if($hotel_status==0){
	$query=$DB->updateQuery($conn,"UPDATE `cars` SET `c_status`='1' WHERE `c_id`='$hotel_id' && `admin_id`='$user_id'");	
	}else{
	$query=$DB->updateQuery($conn,"UPDATE `cars` SET `status`='0' where c_id='$hotel_id' && admin_id='$user_id'");		
	}
	if($query){
		echo 1;
	} else{
		echo '<div class="alert alert-danger"> Status is not Update.</div>';
	}
	}else{
		echo '<div class="alert alert-danger">Data Not Found</div>';
	}
}
if(isset($_POST["view_hotel_detail"]) && strlen($_POST["view_hotel_detail"])>0 && is_numeric($_POST["view_hotel_detail"])){
$hotel_id=$_POST["view_hotel_detail"];
$query=$DB->runQuery($conn,"SELECT `id`, `username`, `email`, `mobile`, `country`, `password`, `at_home`, `status`, `admin_id` FROM `login` WHERE `id`='$hotel_id' order by id desc");
//$country=$DB->runQuery($conn,"select * from country where id='".$query[0]["country"]."'");
//$state=$DB->runQuery($conn,"select * from state where id='".$query[0]["state"]."'");
//$city=$DB->runQuery($conn,"select * from city where id='".$query[0]["city"]."'");
echo '<div class="modal-header">
<h5 class="modal-title">About '.$query[0]["username"].'</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

</div>
<div class="modal-body">
<table class="table">
						  <tbody>
							<tr>			  
							  
							 <td>UserName</td>
							 <td>'.$query[0]["username"].'</td>
							</tr>
							<tr>
							<td>Email</td>
							 <td>'.$query[0]["email"].'</td>							  							  
							</tr>
                                                        <tr>
                                                        <td>Mobile</td>
							<td>'.$query[0]["mobile"].'</td>
                                                        </tr>
							<tr>
							   <td>Country</td>
							  <td>'.$query[0]["country"].'</td>
							</tr>
							
						  </tbody>
						</table>
</div>';	
}


if(isset($_POST["hotel_home"]) && strlen($_POST["hotel_home"])>0 && is_numeric($_POST["hotel_home"])){
$hotel_id=$_POST["home_hotel_id"];
$hotel_userid=$_POST["home_hotel_userid"];
$hotel_home=$_POST["hotel_home"];
$query=$DB->updateQuery($conn,"UPDATE `login` SET `at_home`='".$hotel_home."' WHERE `id`='$hotel_id' AND `admin_id`='$hotel_userid'");
}
if(isset($_POST["update_hotel_password"]) && strlen($_POST["update_hotel_password"])>0 && is_numeric($_POST["update_hotel_password"])){
$hotel_id=$_POST["update_hotel_password"];
$hotel_name	=$_POST["update_hotel_name"];
echo '<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title">Change Password of '.$hotel_name.'</h4>
</div>
<div class="modal-body"><div id="error-password"></div><table class="table">
						  <tbody>
							<tr>
							  <td>New Password</td><td><input type="password" name="password" id="password" placeholder="New Password" class="form-control"></td>
							  
							  </tr>	<tr>
							  <td>Confirm Password</td><td><input type="password" name="con-password" id="con-password" class="form-control" placeholder="Confirm Password"></td></tr>
<tr>
<td colspan="2"><a href="#" name="change_password" id="change_password" data-hotel_id="'.$hotel_id.'" class="btn btn-info">Change</a></td> 	  </tr></table></div>';
}
if(isset($_POST["update_password_id"]) && strlen($_POST["update_password_id"])>0 && is_numeric($_POST["update_password_id"])){
$hotel_id=$_POST["update_password_id"];
$password	=$_POST["update_password"];
$update=$DB->updateQuery($conn,"update ch_hms set `password`='".md5($password)."',`stringpwd`='".$conn->real_escape_string($password)."' where id='".$hotel_id."'");
if($update){
	echo '<div class="alert alert-success"> Password is Updated Successfully</div>';
}else{
	echo '<div class="alert alert-danger"> Password is not Updated Successfully</div>';
}
}

if(isset($_POST["view_bank_detail"]) && strlen($_POST["view_bank_detail"])>0 && is_numeric($_POST["view_bank_detail"])){
$hotel_id=$_POST["view_bank_detail"];
$bank_id=$_POST["view_bank_id"];
echo '<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title">Bank Details </h4>
</div>
<div class="modal-body">';

if($bank_id>0){
	$query=$DB->runQuery($conn,"select id,contact_name,contact_number,bank_name,account_holder_name,account_number,ifsc_code from ch_hms_bank where hotel_id='$hotel_id' order by hotel_id desc");
	echo '<div id="error-bank"></div><div class="col-md-4">Account Name<br/><input type="text" value="'.$query[0]["bank_name"].'" id="b_bank_name" class="form-control" /></div>
<div class="col-md-4">Contact Name<br/><input type="text" value="'.$query[0]["contact_name"].'" id ="b_contact_name" class="form-control" /></div>
<div class="col-md-4">Contact Number<br/><input type="number" value="'.$query[0]["contact_number"].'" id="b_contact_number" class="form-control" /></div>
<div class="col-md-4"><br/>Account Holder Name<br/><input type="text" id="b_account_holder" value="'.$query[0]["account_holder_name"].'" class="form-control" /></div><div class="col-md-4"><br/>Account Number<br/><input type="number" id="b_account_number" value="'.$query[0]["account_number"].'" class="form-control" /></div>
<div class="col-md-4"><br/>IFSC Code<br/><input type="text" value="'.$query[0]["ifsc_code"].'" id= "b_ifsc_code" class="form-control" /></div><div class="col-md-4"></div><div class="col-md-4"><br/>
<input type="hidden"  id= "b_id" value="'.$query[0]["id"].'" />
<a href="#" class="btn btn-info btn-xs" data-hotel_id="'.$hotel_id.'" id="add_bank_detail">Update Bank Detail</a></div><div class="col-md-4"><br/><a href="#" class="btn btn-warning  btn-xs" id="list_bank_detail" data-hotel_id="'.$hotel_id.'">Bank Detail List</a></div>';
}else{
	echo '<div id="div_view_details"><div class="col-md-8"></div><div class="col-md-4"><a href="#" class="btn btn-info btn-xs"  id="add_new_bank_detail">Add New Bank Detail</a></div>';
$query=$DB->runQuery($conn,"select id,contact_name,contact_number,bank_name,account_holder_name,account_number,ifsc_code from ch_hms_bank where hotel_id='$hotel_id' order by hotel_id desc");
if(!empty($query)){
	
echo '<table class="table" ><thead>
							<tr>
							<th>Account</th>
							  <th>Contact Name</th>
							  <th>Contact Number</th>
							  <th>Holder Name</th>
							 <th>Account Number</th>
							 <th>IFSC Code</th>
							</tr>
							
						  </thead>
						  <tbody>
							<tr>
							<td><a href="#" id="edit_bank_detail" title="Edit Bank Details" data-hotel_id="'.$hotel_id.'" data-bank_id="'.$query[0]["id"].'"><i class="fa fa-pencil-square"></i> '.$query[0]["bank_name"].'</a></td>
							  <td>'.$query[0]["contact_name"].'</td>
							  <td>'.$query[0]["contact_number"].'</td>
							  <td>'.$query[0]["account_holder_name"].'</td>
							 <td>'.$query[0]["account_number"].'</td>
							 <td>'.$query[0]["ifsc_code"].'</td>
							 
							</tr>
							
						  </tbody></table>';
}else{
	echo '<div style="clear:both;margin-top: 20px;" class="alert alert-danger"> No Bank Account is Added.</div>';
}
echo '</div>';


echo '<div id="div_bank_details" style="display:none"> <div id="error-bank"></div><div class="col-md-4">Account Name<br/><input type="text" Placeholder="Account Name" id="b_bank_name" class="form-control" /></div>
<div class="col-md-4">Contact Name<br/><input type="text" Placeholder="Contact Name" id ="b_contact_name" class="form-control" /></div>
<div class="col-md-4">Contact Number<br/><input type="number" Placeholder="Contact Number" id="b_contact_number" class="form-control" /></div>
<div class="col-md-4"><br/>Account Holder Name<br/><input type="text" id="b_account_holder" Placeholder="Account Holder Name" class="form-control" /></div><div class="col-md-4"><br/>Account Number<br/><input type="number" id="b_account_number" Placeholder="Account Number" class="form-control" /></div>
<div class="col-md-4"><br/>IFSC Code<br/><input type="text" Placeholder="IFSC Code" id= "b_ifsc_code" class="form-control" /></div><div class="col-md-4"></div><div class="col-md-4"><br/>
<input type="hidden"  id= "b_id" value="0" />
<a href="#" class="btn btn-info btn-xs" data-hotel_id="'.$hotel_id.'" id="add_bank_detail">Add Bank Detail</a></div><div class="col-md-4"><br/><a href="#" class="btn btn-warning  btn-xs" id="list_bank_detail" data-hotel_id="'.$hotel_id.'">Bank Detail List</a></div></div>';
}
echo '<table class="table"></table>
</div>';	
}
if(isset($_POST["add_bank_detail_id"]) && strlen($_POST["add_bank_detail_id"])>0 && is_numeric($_POST["add_bank_detail_id"])){
$hotel_id			=$_POST["add_bank_detail_id"];
$b_bank_name		=$conn->real_escape_string($_POST["b_bank_name"]);
$b_contact_name		=$conn->real_escape_string($_POST["b_contact_name"]);
$b_contact_number	=$_POST["b_contact_number"];
$b_account_holder	=$conn->real_escape_string($_POST["b_account_holder"]);
$b_account_number	=$_POST["b_account_number"];
$b_ifsc_code		=$_POST["b_ifsc_code"];
$b_id				=$_POST["b_id"];
if($b_id>0){
$update=$DB->updateQuery($conn,"update ch_hms_bank set `contact_name`='".$b_contact_name."',`contact_number`='".$b_contact_number."',`account_number`='".$b_account_number."',`bank_name`='".$b_bank_name."',`account_holder_name`='".$b_account_holder."',`ifsc_code`='".$b_ifsc_code."' where id='".$b_id."' && hotel_id='".$hotel_id."'");
}else{
$update=$DB->insertQuery($conn,"insert into ch_hms_bank (hotel_id,`contact_name`,`contact_number`,account_number,`bank_name`,account_holder_name,`ifsc_code`) values('".$hotel_id."','".$b_contact_name."','".$b_contact_number."','".$b_account_number."','".$b_bank_name."','".$b_account_holder."','".$b_ifsc_code."')");
}
if($update){
		echo 1;
	}else{
		echo '<div class="alert alert-danger">Bank Detail is not Updated Successfully</div>';
	}
}
?>