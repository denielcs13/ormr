<?php include 'pages/header.php'; ?>               
<style>#create_ta_hotel {
    margin-top: 32px;
}</style>
<!-- begin .app-container -->
<div class="app-container">

    <!-- begin .app-side -->
    <?php include 'pages/aside.php';
       error_reporting(0);
       
                        $user_id=$_GET["token"];	
			$query="SELECT * FROM `cars` WHERE `c_id`='$user_id' && admin_id='$rac_admin_id'";
			$numRows=0;
			$button="New ";
			if(!empty($_GET["token"]) || !empty($_GET["user"])){
			$numRows=$DB->numRows($conn,$query);	
			if($numRows<=0){
				echo '<script>window.location="cars-list";</script>';
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
                                    <h4><?= (!empty($user_id))?strtoupper($hotel_query[0]["c_name"]).' Details <a href="user-l">Back</a>':'New Car'; ?></h4>
                                </div>
                                <div id="error-cr-hotel" style="clear:both"></div>
                                <div class="panel-body">
                                    <div class="add-new-member">
                                        <?php	 
				  if(isset($_POST['add_car']))		
				  {		
				  $name=$_POST['car_name'];		  	
				  
				  $proof =$_FILES['car_img']['name'];		
				  $img_tmp =$_FILES['car_img']['tmp_name'];		
				  $ext = pathinfo($proof, PATHINFO_EXTENSION);		
				  $newname='EMP_'.date("ymd").microtime(true).'.'.$ext;		
				  move_uploaded_file($img_tmp,"../car_image/".$newname);
				  
				  $qry="INSERT INTO `cars`(`c_name`, `c_image`, `createdOn`) VALUES ('$name','$newname',NOW())";				 
				  $run=mysqli_query($conn,$qry);                   
				  if($run == true)		 { 			
				  ?>			 
				  <script>			     
				  alert('Thank You for adding Car.');</script>		 
				  <?php } }	 ?>
                                  <form id="update-form" method="POST" action="" enctype="multipart/form-data">
                                            <input type="hidden" value="<?= $rac_admin_id; ?>" name="update_user_id" id="update_user_id">
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
                                                        <label for="userid">Car Name(*)</label>
                                                        <input type="text" class="form-control" id="car_name" name="car_name" <?= ($hotel_query[0]["c_name"])?'value="'.$hotel_query[0]["c_name"].'"':'placeholder="Car Name"'; ?> >
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="fname">Car Image(*)</label>
                                                        <input type="file" class="form-control" name="car_img" id="car_img">
                                                    </div>
                                                </div>                                                
                                                <div class="col-xl-4">
                                                    <div class="ad-search-btn">
                                                        <button type="submit" name="add_car" class="btn btn-success" ><?= $button; ?> Car</button>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pannel-wrapper white-bg mb-30">
                                <div class="panel-heading heading-border">
                                    <h4><?= (!empty($user_id))?strtoupper($hotel_query[0]["c_name"]).' Details <a href="user-l">Back</a>':'New Sub Car'; ?></h4>
                                </div>
                                <div id="error-cr-hotel" style="clear:both"></div>
                                <div class="panel-body">
                                    <div class="add-new-member">
                                        <form id="update-form"><input type="hidden" value="<?= $rac_admin_id; ?>" name="update_user_id" id="update_user_id">
					<input type="hidden" value="<?= $user_id; ?>" name="update_hotel_id" id="update_hotel_id">
                                        <div class="row" id="page-wrapper">                                                
                                                <div class="col-xl-4">
                                                    <label>Car Name</label>
                                                    <div class="form-group mb-20">
                                                    <select class="form-control" style="">
                                                        <?php
					$cars=$DB->runQuery($conn,"SELECT `c_id`, `c_name` FROM `cars` order by `c_name` asc");
					foreach($cars as $val){
					//$country_name=(strtolower($val["c_id"])==$hotel_query[0]["c_name"])?'selected="selected"':'';
					echo '<option value="'.$val["c_id"].'">'.strtoupper($val["c_name"]).'</option>';	
					}
					
					?>
                                                    </select>
                                                    </div>
                                                    </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="userid">Sub Car Name(*)</label>
                                                        <input type="text" class="form-control" id="user_name" name="user_name" <?= ($hotel_query[0]["c_name"])?'value="'.$hotel_query[0]["c_name"].'"':'placeholder="Car Name"'; ?> >
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xl-4">
                                                    <div class="form-group mb-20">
                                                        <label for="fname">Car Image(*)</label>
                                                        <input type="file" class="form-control"name="user_mobile" id="user_mobile">
                                                    </div>
                                                </div>                                                
                                                <div class="col-xl-4">
                                                    <div class="ad-search-btn">
                                                        <a class="btn btn-success" id="create_ta_hotel"><?= $button; ?> Car</a>
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
            
