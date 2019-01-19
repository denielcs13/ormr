<?php include 'pages/header.php'; ?>               

<!-- begin .app-container -->
<div class="app-container">
    <style>#create_ta_hotel {
    margin-top: 30px;
}</style>
    <!-- begin .app-side -->
    <?php include 'pages/aside.php';
       error_reporting(0);
                        $user_id=$_GET["token"];	
			$query="SELECT * FROM `login` WHERE `id`='$user_id' && admin_id='$rac_admin_id'";
			$numRows=0;
			$button="New ";
			if(!empty($_GET["token"]) || !empty($_GET["user"])){
			$numRows=$DB->numRows($conn,$query);	
			if($numRows<=0){
				echo '<script>window.location="user-l";</script>';
			}else{
				$button="Update ";
			}
			}			
			$hotel_query=$DB->runQuery($conn,$query);
    ?>

    <!-- begin side-collapse-visible bar -->
    <div class="side-visible-line visible-md" data-side="collapse">
        <i class="fa fa-caret-left"></i>
    </div>
    <!-- end side-collapse-visible bar -->

    <!-- begin .app-main -->
    <div class="app-main">
        <div class="layout-container">
            <div class="dash-intro pt-25">
                <div class="container-fluid">
                </div>
            </div>
            <!-- fact-area start -->

            <!-- fact-area end -->
            <!-- dashboard-area start -->
            <div class="dashboard-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pannel-wrapper white-bg mb-30">
                                <div class="panel-heading heading-border">
                                    <h4><?= (!empty($user_id))?strtoupper($hotel_query[0]["name"]).' Details <a href="user-l">Back</a>':'New User'; ?></h4>
                                </div>
                                <div id="error-cr-hotel" style="clear:both"></div>
                                <div class="panel-body">
                                    <div class="add-new-member">
                                        <form id="update-form"><input type="hidden" value="<?= $rac_admin_id; ?>" name="update_user_id" id="update_user_id">
					<input type="hidden" value="<?= $user_id; ?>" name="update_hotel_id" id="update_hotel_id">
                                        <div class="row" id="page-wrapper">                                                
<!--                                                <div class="col-xl-4">
                                                    <label>Username</label>
                                                    <div class="form-group mb-20">
                                                    <select class="form-control" style="">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Another option</option>
                                                        <option value="3" disabled="">A disabled option</option>
                                                        <option value="4">Potato</option>
                                                    </select>
                                                    </div>
                                                    </div>-->
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="userid">Name(*)</label>
                                                        <input type="text" class="form-control" id="user_name" name="user_name" <?= ($hotel_query[0]["name"])?'value="'.$hotel_query[0]["name"].'"':'placeholder="Name"'; ?> >
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="emailid">Email(*)</label>
                                                        <input type="email" class="form-control" name="user_emailid" id="user_emailid" <?= ($hotel_query[0]["email"])?'value="'.$hotel_query[0]["email"].'"':'placeholder="Email ID"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="fname">Mobile(*)</label>
                                                        <input type="text" class="form-control"name="user_mobile" id="user_mobile" <?= ($hotel_query[0]["mobile"])?'value="'.$hotel_query[0]["mobile"].'"':'placeholder="Mobile"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="emailid">Travel Agency Name</label>
                                                        <input type="email" class="form-control" name="user_tagncn" id="user_tagncn" <?= ($hotel_query[0]["agent"])?'value="'.$hotel_query[0]["agent"].'"':'placeholder="Travel Agency Name"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="phno">User Name(*)</label>
                                                        <input type="text" class="form-control" name="user_uname" id="user_uname" <?= ($hotel_query[0]["username"])?'value="'.$hotel_query[0]["username"].'" readonly':'placeholder="User Name"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="pass">Password(*)</label>
                                                        <input type="password" class="form-control" name="user_pass" id="user_pass" <?= ($hotel_query[0]["password"])?'value="'.$hotel_query[0]["password"].'"':'placeholder="Password"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="state">State(*)</label>
                                                        <input type="text" class="form-control" name="user_state" id="user_state" <?= ($hotel_query[0]["state"])?'value="'.$hotel_query[0]["state"].'"':'placeholder="State"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="city">City(*)</label>
                                                        <input type="text" class="form-control" name="user_city" id="user_city" <?= ($hotel_query[0]["city"])?'value="'.$hotel_query[0]["city"].'"':'placeholder="City"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="city">Commission(*)</label>
                                                        <input type="text" class="form-control" name="user_comsn" id="user_comsn" <?= ($hotel_query[0]["commission"])?'value="'.$hotel_query[0]["commission"].'"':'placeholder="Commission"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="city">Latitude</label>
                                                        <input type="text" class="form-control" name="user_lat" id="user_lat" <?= ($hotel_query[0]["latitude"])?'value="'.$hotel_query[0]["latitude"].'"':'placeholder="Latitude"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="city">Longitude</label>
                                                        <input type="text" class="form-control" name="user_lon" id="user_lon" <?= ($hotel_query[0]["longitude"])?'value="'.$hotel_query[0]["longitude"].'"':'placeholder="Longitude"'; ?>>
                                                    </div>
                                                </div>
                                                 <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="city">Website</label>
                                                        <input type="text" class="form-control" name="user_web" id="user_web" <?= ($hotel_query[0]["website"])?'value="'.$hotel_query[0]["website"].'"':'placeholder="Website"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="city">Agency Address</label>
                                                        <input type="text" class="form-control" name="user_addr" id="user_addr" <?= ($hotel_query[0]["address"])?'value="'.$hotel_query[0]["address"].'"':'placeholder="Address"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="city">Agency Landmark</label>
                                                        <input type="text" class="form-control" name="user_landm" id="user_landm" <?= ($hotel_query[0]["landmark"])?'value="'.$hotel_query[0]["landmark"].'"':'placeholder="Landmark"'; ?>>
                                                    </div>
                                                </div>                           
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="city">Alternate Email</label>
                                                        <input type="text" class="form-control" name="user_altemail" id="user_altemail" <?= ($hotel_query[0]["alt_email"])?'value="'.$hotel_query[0]["alt_email"].'"':'placeholder="Alternate Email"'; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="land">Land Line</label>
                                                        <input type="text" class="form-control" name="user_landl" id="user_landl" <?= ($hotel_query[0]["landline"])?'value="'.$hotel_query[0]["landline"].'"':'placeholder="Landline"'; ?>>
                                                    </div>
                                                </div>                                                
                                                <div class="col-xl-4">
                                                    <label>Agency Type(*)</label>
                                                    <div class="form-group mb-20">
                                                        <select class="form-control" name="agency_type" id="agency_type">
                                                        <option value="Private">Private</option>
                                                        <option value="Travel Agent">Travel Agent</option>                                                        
                                                    </select>
                                                    </div>
                                                    </div>
                                                <div class="col-xl-3">
                                                    <div class="ad-search-btn">
                                                        <a class="btn btn-success" id="create_ta_hotel"><?= $button; ?> User</a>
                                                        <!--<button class="btn btn-success"> Add User </button>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                                   

                    </div>
                </div>
            </div>
            <!-- dashboard-area end -->
        </div>

    </div>
    <!-- end .app-main -->

</div>
<!-- end .app-container -->

<?php include 'pages/footer.php'; ?>
<script src="js/carjs/functions.js"></script>
<script src="js/carjs/user-details.js"></script>
            
