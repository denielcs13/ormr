<?php include 'pages/header.php';?>               

            <!-- begin .app-container -->
            <div class="app-container">

                <!-- begin .app-side -->
                <?php include 'pages/aside.php';
                $hotelcount=$DB->numRows($conn,"SELECT * FROM `login` WHERE `admin_id`='$rac_admin_id'");
			$booking=$DB->runQuery($conn,"SELECT `driver_id`, `driver_name`, `driv_mobile`, `email`, `dl`, `id_proof`, `id_proof_img`, `driver_img`, `status`, `admin_id` FROM `add_driver` LEFT OUTER JOIN administrator ON administrator.id =add_driver.admin_id WHERE add_driver.admin_id='$rac_admin_id' AND add_driver.status='1'");
//			$todaybooking=0;
//			$todayearning=0;
//			$thismonthbooking=0;
//			$thismonthearning=0;
//			$today=date('Y-m-d');
//			$thismonth=date('Y-m-01');
//			if(!empty($booking)){
//			foreach($booking as $val){
//			if($val["be_date"] == $today){	
//			$todayearning +=$val["discounted_amount"];
//			$todaybooking++;				
//			}
//			if($val["be_date"]>= $thismonth){	
//			$thismonthearning +=$val["discounted_amount"];
//			$thismonthbooking++;				
//			}
//			}			
//			
//			}
//			$hotelrequest=$DB->runQuery($conn,"select id,hotel_name,hotelier_name,mobile,email,no_of_room from ch_hms_listing where user_id='$travel_agent_id' && status='0'");
//				
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
<!--                                <h4>                                    
                                </h4>-->
                                <!--<p class="m-0">Today is Sunday, 12 January 2019</p>-->
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
                                    <h4>Search</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="example-form">
                                        <form action="#">
                                            <div class="row">                                              
                                                <div class="col-xl-12">
                                                    <div class="date-to-date">
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <div class="input-append date form_datetime mb-30">
                                                                    <input class="form-control" size="16" type="text" value="" placeholder="Name" >
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="input-append date form_datetime mb-30">
                                                                    <input class="form-control" size="16" type="text" value="" placeholder="Email" >                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-xl-4">
                                                                <div class="input-append date form_datetime mb-30">
                                                                    <input class="form-control" size="16" type="text" value="" placeholder="Number" >                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="input-append date form_datetime mb-30">
                                                                    <select class="form-control" id="property_status" name="property_status">
                                                                <option value="">All</option>
                                                                <option value="1">Active</option>
                                                                <option value="0">In-Active</option>
                                                                </select>                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <div class="ad-search-btn">
                                                                    <button class="btn btn-success"> Search </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                                    <div class="col-lg-12 d-none d-lg-none d-xl-block">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading heading-border">
                                                <h4>User List</h4>
                                            </div>
                                            <div class="panel-body p-0">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table class="table card-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
<!--                                                                    <th>Name</th>-->
                                                                    <th>User Name</th>
                                                                    <th>Email</th>
                                                                    <th>Status</th>
                                                                    <th>Home</th>
                                                                    <!--<th>Views</th>-->
                                                                    <th style="width: 230px;">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $i=1;
                                                                $query=  mysqli_query($conn,"SELECT * FROM `login` WHERE `admin_id`='$rac_admin_id'");
                                                                if(mysqli_num_rows($query)>0){
                                                                    while ($row=  mysqli_fetch_array($query)){                                                                        
                                                                        ?>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                     <?php echo $i;?>
                                                                    </td>
<!--                                                                    <td class="align-middle"> <a href="#" class="text-dark"><?php// echo $row['username'];?></a></td>-->
                                                                    <td class="align-middle">
                                                                     <?php echo $row['username'];?>   
                                                                    </td>
                                                                    <td class="align-middle"><?php echo $row['email'];?></td>
                                                                    <td class="ddd">
                                                                        <button type="button" class="btn btn-success btn-sm d-block">Approve</button>
                                                                    </td>
                                                                    <td class="align-middle"><input type="checkbox" data-hotel_id="65" id="at_home"></td>                                                                    
                                                                    <td class="align-middle">
                                                                        
                                                                        <button type="button" class="btn btn-sm btn-default md-btn-flat">View</button>
                                                                        <button type="button" class="btn icon-btn btn-sm btn-default md-btn-flat">
                                                                            <span class="ti-close"></span>
                                                                        </button>
                                                                        <button type="button" class="btn btn-sm btn-default md-btn-flat"><i class="fa fa-unlock"></i> Login</button>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                    $i++;
                                }
                                
                            }
                        else {
                            ?>
                             <tr>
                                <td colspan="6"> you have no user yet</td>
                            </tr>
                            
                        <?php    
                        }
                            ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
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
         <?php include 'pages/footer.php';?>
            
