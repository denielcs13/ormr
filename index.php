<?php include 'pages/header.php';?>               

            <!-- begin .app-container -->
            <div class="app-container">

                <!-- begin .app-side -->
                <?php include 'pages/aside.php';
                $hotelcount=$DB->numRows($conn,"SELECT * FROM `administrator` WHERE `id`='$rac_admin_id'");
			$booking=$DB->runQuery($conn,"SELECT `car_id`, `car_city`, `car_name`, `car_no`, `model`, `ac`, `passengers`, `seats`, `car_type`, `fleet_v`, `car_price`,`date`, `car_rating`, `status` FROM `add_car` left outer join administrator on administrator.id = add_car.admin_id WHERE add_car.admin_id='$rac_admin_id' AND add_car.status='1'");
			$booking1=$DB->numRows($conn,"SELECT login.`id`, `username`, login.`name`, login.`email`, `password`, `mobile`, `agent`, `country`, `state`, `city`, `commission`, `longitude`, `latitude`, `website`, `address`, `landmark`, `alt_email`, `landline`, `agency_type`, `at_home`, `status`, `admin_id`, `createdOn` FROM `login` LEFT OUTER JOIN administrator on administrator.id=login.admin_id WHERE login.admin_id='$rac_admin_id' AND login.status='1'");
                        echo $booking1;
                        $todaybooking=0;
			$todayearning=0;
			$thismonthbooking=0;
			$thismonthearning=0;
			$today=date('Y-m-d');
                        //echo $today;
                        //echo $val["date"];
			$thismonth=date('Y-m-01');
                        echo $thismonth;
			if(!empty($booking)){
			foreach($booking as $val){
                            echo $val["date"].'<br>';
			if($val["date"] == $today){
                         
			$todayearning +=$val["car_id"];
			$todaybooking++;				
			}
			if($val["date"]>= $thismonth){	
			$thismonthearning +=$val["car_id"];
			$thismonthbooking++;				
			}
			}
			}
			$hotelrequest=$DB->runQuery($conn,"SELECT `id`, `username`, `name`, `email`, `password`, `mobile`, `agent`, `country`, `state`, `city`, `commission`, `longitude`, `latitude`, `website`, `address`, `landmark`, `alt_email`, `landline`, `agency_type`, `at_home`, `status`, `admin_id`, `createdOn` FROM `login` WHERE `admin_id`='$rac_admin_id' && status='0'");
				
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
                                <h4 class="font-weight-bold">
                                    Dashboard
                                </h4>
                                <!--<p class="m-0">Today is Sunday, 12 January 2019</p>-->
                            </div>
                        </div>
                        <!-- fact-area start -->
                        <div class="fact-area start pt-25 pb-10">
                            <div class="container-fluid">
                                <div class="row counter-box ">
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="single-counter d-flex justify-content-between flex-wrap align-items-center mb-30">
                                            <i class="fas fa-signal"></i>
                                            <div class="c-number">
                                                <h3 class="counter">41,456</h3>
                                                <span>New Clients</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="single-counter  d-flex justify-content-between flex-wrap align-items-center mb-30">
                                            <i class="far fa-lightbulb"></i>
                                            <div class="c-number">
                                                <h3 class="counter">62,236</h3>
                                                <span>Site View</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="single-counter  d-flex justify-content-between flex-wrap align-items-center mb-30">
                                            <i class="fas fa-chart-line"></i>
                                            <div class="c-number">
                                                <h3 class="counter"><?=$todaybooking;?></h3>
                                                <span>Today Booking</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="single-counter d-flex justify-content-between flex-wrap align-items-center mb-30">
                                            <i class="far fa-comments"></i>
                                            <div class="c-number">
                                                <h3 class="counter">32,220</h3>
                                                <span>Comments</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fact-area end -->
                        <!-- dashboard-area start -->
                        <div class="dashboard-area">
                            <div class="container-fluid">
                                <div class="row">
<!--                                    <div class="col-lg-6">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading ">
                                                <h4 class="mb-2">Yearly Sales Statistics</h4>
                                                <span>Overview of latest month</span>
                                            </div>
                                            <div class="panel-body pt-0">
                                                <div class="chart-js-warpper">
                                                    <div class="flot-js-warpper">
                                                        <div id="flot-categories" style="height: 250px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
<!--                                    <div class="col-lg-6">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading ">
                                                <h4 class="mb-2">Visitors Statistics</h4>
                                                <span>Overview of latest month</span>
                                            </div>
                                            <div class="panel-body pt-0">
                                                <div class="chart-js-warpper">
                                                    <div class="flot-js-warpper">
                                                        <div id="flot-graph" style="height: 250px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
<!--                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-4">
                                                <div class="pannel-wrapper white-bg mb-30">
                                                    <div class="panel-heading ">
                                                        <h4 class="mb-2">Monthly clicks</h4>
                                                    </div>
                                                    <div class="panel-body pt-0">
                                                        <div class="card monthly-point mb-0">
                                                            <div class="card-body text-center text-success text-xlarge py-3 pt-0">6,235</div>
                                                            <div class="card-footer border-0 small pt-0">
                                                                <div class="float-right text-success">
                                                                    <i class="fas fa-arrow-up"></i> 11.25%
                                                                </div>
                                                                <span class="text-muted">Total: 22,536</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-4">
                                                <div class="pannel-wrapper white-bg mb-30">
                                                    <div class="panel-heading ">
                                                        <h4 class="mb-2">Monthly impressions</h4>
                                                    </div>
                                                    <div class="panel-body pt-0">
                                                        <div class="card monthly-point mb-0">
                                                            <div class="card-body text-center text-danger text-xlarge py-3 pt-0">7,235</div>
                                                            <div class="card-footer border-0 small pt-0">
                                                                <div class="float-right text-danger">
                                                                    <i class="fas fa-arrow-up"></i> 11.25%
                                                                </div>
                                                                <span class="text-muted">Total: 51,536</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-4">
                                                <div class="pannel-wrapper white-bg mb-30">
                                                    <div class="panel-heading ">
                                                        <h4 class="mb-2">Monthly avg. CTR</h4>
                                                    </div>
                                                    <div class="panel-body pt-0">
                                                        <div class="card monthly-point mb-0">
                                                            <div class="card-body text-center text-success text-xlarge py-3 pt-0">5,235</div>
                                                            <div class="card-footer border-0 small pt-0">
                                                                <div class="float-right text-success">
                                                                    <i class="fas fa-arrow-up"></i> 11.25%
                                                                </div>
                                                                <span class="text-muted">Total: 63,536</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
<!--                                    <div class="col-xl-9 col-lg-12 ">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading heading-border">
                                                <h4 class="m-0">Current Progress</h4>
                                            </div>
                                            <div class="panel-body mt-40 pt-0">
                                                <div class="card pb-4 mb-2">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-12 col-lg-5 col-md-12 px-4 pt-4">
                                                            <a href="javascript:void(0)" class="text-dark prg-title font-weight-semibold">Project Title</a>
                                                            <span class="text-muted">New product design</span>
                                                        </div>
                                                        <div class="col-12 col-lg-2 col-md-12 text-muted small px-4 pt-4">
                                                            <span class="in-prg"><strong>In Progress</strong> <br> 3D modeling</span>
                                                        </div>
                                                        <div class="col-12 col-lg-2 col-md-12 text-muted px-4 pt-4">
                                                            <span class="prg-date">12 Jan 2018 <br> 4:45</span>
                                                        </div>
                                                        <div class="col-12 col-lg-3 col-md-12 px-4 pt-4">
                                                            <div class="text-right text-muted">60%</div>
                                                            <div class="progress" style="height: 6px;">
                                                                <div class="progress-bar bg-success" style="width: 80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card pb-4 mb-2">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-12 col-md-5 px-4 pt-4">
                                                            <a href="javascript:void(0)" class="text-dark prg-title font-weight-semibold">Project Title</a>
                                                            <span class="text-muted">Design and development</span>
                                                        </div>
                                                        <div class="col-12 col-lg-2 text-muted small px-4 pt-4">
                                                            <span class="in-prg"><strong>In Progress</strong> <br> 3D modeling</span>
                                                        </div>
                                                        <div class="col-12 col-lg-2 text-muted px-4 pt-4">
                                                            <span class="prg-date">12 Jan 2018 <br> 4:45</span>
                                                        </div>
                                                        <div class="col-12 col-lg-3 px-4 pt-4">
                                                            <div class="text-right text-muted">60%</div>
                                                            <div class="progress" style="height: 6px;">
                                                                <div class="progress-bar bg-danger" style="width: 60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card pb-4 mb-2">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-12 col-lg-5 px-4 pt-4">
                                                            <a href="javascript:void(0)" class="text-dark prg-title font-weight-semibold">Project Title</a>
                                                            <span class="text-muted">Create the concept</span>
                                                        </div>
                                                        <div class="col-12 col-lg-2 text-muted small px-4 pt-4">
                                                            <span class="in-prg"><strong>In Progress</strong> <br> 3D modeling</span>
                                                        </div>
                                                        <div class="col-12 col-lg-2 text-muted px-4 pt-4">
                                                            <span class="prg-date">12 Jan 2018 <br> 4:45</span>
                                                        </div>
                                                        <div class="col-12 col-lg-3 px-4 pt-4">
                                                            <div class="text-right text-muted">60%</div>
                                                            <div class="progress" style="height: 6px;">
                                                                <div class="progress-bar  bg-warning" style="width: 75%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
<!--                                    <div class="col-xl-3 col-lg-6 d-lg-none d-xl-block">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading heading-border">
                                                <h4 class="m-0">Messages</h4>
                                            </div>
                                            <div class="panel-body pl-0 pr-0 pt-0 pb-0">
                                                <div class="cards mb-4">
                                                    <div class="card-body">

                                                        <div class="media pb-1 mb-3">
                                                            <img src="img/chat/chat1.png" class="d-block ui-w-40 rounded-circle" alt>
                                                            <div class="media-body ml-3">
                                                                <div class="mb-1">
                                                                    <strong class="font-weight-semibold">Salim Rana</strong>
                                                                    &nbsp;
                                                                    <small class="text-muted">58m ago</small>
                                                                </div>
                                                                <a href="#" class="text-black">Sit meis deleniti eu, pri vidit meliore docendi ut an eum
                                                                    erat.</a>
                                                            </div>
                                                        </div>

                                                        <div class="media pb-1 mb-3">
                                                            <img src="img/chat/chat2.png" class="d-block ui-w-40 rounded-circle" alt>
                                                            <div class="media-body ml-3">
                                                                <div class="mb-1">
                                                                    <strong class="font-weight-semibold">Mehedi Hasan</strong>
                                                                    &nbsp;
                                                                    <small class="text-muted">1h ago</small>
                                                                </div>
                                                                <a href="#" class="text-black">Mea et legere fuisset, ius amet purto luptatum te an eum
                                                                    erat.</a>
                                                            </div>
                                                        </div>

                                                        <div class="media pb-1 mb-3">
                                                            <img src="img/chat/chat3.png" class="d-block ui-w-40 rounded-circle" alt>
                                                            <div class="media-body ml-3">
                                                                <div class="mb-1">
                                                                    <strong class="font-weight-semibold">Masud Hasan</strong>
                                                                    &nbsp;
                                                                    <small class="text-muted">2h ago</small>
                                                                </div>
                                                                <a href="#" class="text-black">Sit meis deleniti eu, pri vidit meliore docendi.</a>
                                                            </div>
                                                        </div>

                                                        <div class="media pb-1 mb-3">
                                                            <img src="img/chat/chat4.png" class="d-block ui-w-40 rounded-circle" alt>
                                                            <div class="media-body ml-3">
                                                                <div class="mb-1">
                                                                    <strong class="font-weight-semibold">Nasir Hossain</strong>
                                                                    &nbsp;
                                                                    <small class="text-muted">1d ago</small>
                                                                </div>
                                                                <a href="#" class="text-black">Lorem ipsum dolor sit amet, vis erat denique.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="button" class="btn btn-default btn-block md-btn-flat">Show all</button>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="col-lg-12 d-none d-lg-none d-xl-block">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading heading-border">
                                                <h4>Products</h4>
                                            </div>
                                            <div class="panel-body p-0">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table class="table card-table">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 40px;">
                                                                        <label class="custom-control custom-checkbox m-0">
                                                                            <input class="custom-control-input" type="checkbox">
                                                                            <span class="custom-control-label"></span>
                                                                        </label>
                                                                    </th>
                                                                    <th colspan="2">Product</th>
                                                                    <th>ID</th>
                                                                    <th>In stock</th>
                                                                    <th>Price</th>
                                                                    <th>Sales</th>
                                                                    <th>Views</th>
                                                                    <th style="width: 130px;"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <label class="custom-control custom-checkbox m-0">
                                                                            <input class="custom-control-input" type="checkbox">
                                                                            <span class="custom-control-label"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="align-middle" style="width: 62px;">
                                                                        <img src="img/product/pro1.png" alt>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <a href="#" class="text-dark">PlayStation 4 1TB (Jet Black)</a>
                                                                    </td>
                                                                    <td class="align-middle">3455632</td>
                                                                    <td class="align-middle">52</td>
                                                                    <td class="align-middle">$480.00</td>
                                                                    <td class="align-middle">123</td>
                                                                    <td class="align-middle">3,432</td>
                                                                    <td class="align-middle">
                                                                        <button type="button" class="btn btn-sm btn-default md-btn-flat">View</button>
                                                                        <button type="button" class="btn icon-btn btn-sm btn-default md-btn-flat">
                                                                            <span class="ti-close"></span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <label class="custom-control custom-checkbox m-0">
                                                                            <input class="custom-control-input" type="checkbox">
                                                                            <span class="custom-control-label"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <img src="img/product/pro2.png" alt>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <a href="#" class="text-dark">Nike Men Black Liteforce III Sneakers</a>
                                                                    </td>
                                                                    <td class="align-middle">3455631</td>
                                                                    <td class="align-middle">34</td>
                                                                    <td class="align-middle">$57.55</td>
                                                                    <td class="align-middle">222</td>
                                                                    <td class="align-middle">7,231</td>
                                                                    <td class="align-middle">
                                                                        <button type="button" class="btn btn-sm btn-default md-btn-flat">View</button>
                                                                        <button type="button" class="btn icon-btn btn-sm btn-default md-btn-flat">
                                                                            <span class="ti-close"></span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <label class="custom-control custom-checkbox m-0">
                                                                            <input class="custom-control-input" type="checkbox">
                                                                            <span class="custom-control-label"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <img src="img/product/pro3.png" alt>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <a href="#" class="text-dark">Wireless headphones</a>
                                                                    </td>
                                                                    <td class="align-middle">3455632</td>
                                                                    <td class="align-middle">41</td>
                                                                    <td class="align-middle">$235.55</td>
                                                                    <td class="align-middle">43</td>
                                                                    <td class="align-middle">3,572</td>
                                                                    <td class="align-middle">
                                                                        <button type="button" class="btn btn-sm btn-default md-btn-flat">View</button>
                                                                        <button type="button" class="btn icon-btn btn-sm btn-default md-btn-flat">
                                                                            <span class="ti-close"></span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <label class="custom-control custom-checkbox m-0">
                                                                            <input class="custom-control-input" type="checkbox">
                                                                            <span class="custom-control-label"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <img src="img/product/pro4.png" alt>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <a href="#" class="text-dark">HERO ATHLETES BAG</a>
                                                                    </td>
                                                                    <td class="align-middle">3455630</td>
                                                                    <td class="align-middle">11</td>
                                                                    <td class="align-middle">$160.00</td>
                                                                    <td class="align-middle">38</td>
                                                                    <td class="align-middle">3,111</td>
                                                                    <td class="align-middle">
                                                                        <button type="button" class="btn btn-sm btn-default md-btn-flat">View</button>
                                                                        <button type="button" class="btn icon-btn btn-sm btn-default md-btn-flat">
                                                                            <span class="ti-close"></span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <label class="custom-control custom-checkbox m-0">
                                                                            <input class="custom-control-input" type="checkbox">
                                                                            <span class="custom-control-label"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <img src="img/product/pro5.png" alt>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <a href="#" class="text-dark">POÄNG</a>
                                                                    </td>
                                                                    <td class="align-middle">3455629</td>
                                                                    <td class="align-middle">70</td>
                                                                    <td class="align-middle">$159.00</td>
                                                                    <td class="align-middle">34</td>
                                                                    <td class="align-middle">5,489</td>
                                                                    <td class="align-middle">
                                                                        <button type="button" class="btn btn-sm btn-default md-btn-flat">View</button>
                                                                        <button type="button" class="btn icon-btn btn-sm btn-default md-btn-flat">
                                                                            <span class="ti-close"></span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <label class="custom-control custom-checkbox m-0">
                                                                            <input class="custom-control-input" type="checkbox">
                                                                            <span class="custom-control-label"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <img src="img/product/pro2.png" alt>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <a href="#" class="text-dark">Apple iWatch (black)</a>
                                                                    </td>
                                                                    <td class="align-middle">3455628</td>
                                                                    <td class="align-middle">9</td>
                                                                    <td class="align-middle">$399.00</td>
                                                                    <td class="align-middle">22</td>
                                                                    <td class="align-middle">4,123</td>
                                                                    <td class="align-middle">
                                                                        <button type="button" class="btn btn-sm btn-default md-btn-flat">View</button>
                                                                        <button type="button" class="btn icon-btn btn-sm btn-default md-btn-flat">
                                                                            <span class="ti-close"></span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <label class="custom-control custom-checkbox m-0">
                                                                            <input class="custom-control-input" type="checkbox">
                                                                            <span class="custom-control-label"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <img src="img/product/pro1.png" alt>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <a href="#" class="text-dark">WALKING 400 BLUE CAT3</a>
                                                                    </td>
                                                                    <td class="align-middle">3455627</td>
                                                                    <td class="align-middle">20</td>
                                                                    <td class="align-middle">$20.55</td>
                                                                    <td class="align-middle">24</td>
                                                                    <td class="align-middle">12,231</td>
                                                                    <td class="align-middle">
                                                                        <button type="button" class="btn btn-sm btn-default md-btn-flat">View</button>
                                                                        <button type="button" class="btn icon-btn btn-sm btn-default md-btn-flat">
                                                                            <span class="ti-close"></span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-xl-3 col-lg-6 ">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading heading-border">
                                                <h4 class="m-0">Revenue</h4>
                                            </div>
                                            <div class="panel-body mt-40 pt-0">
                                                <div class="chart-js-warpper">
                                                    <div class="flot-js-warpper">
                                                        <div id="flot-bars" style="height: 250px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
<!--                                    <div class="col-xl-3 col-lg-6">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading heading-border">
                                                <h4 class="m-0">Followers</h4>
                                            </div>
                                            <div class="panel-body border-pannel follow-2 pl-0 pr-0 pt-0 pb-0">
                                                <div class="media align-items-center">
                                                    <img src="img/follow/follow1.png" class="d-block ui-w-40 rounded-circle" alt>
                                                    <div class="media-body pl-3">
                                                        <a href="#" class="text-dark">Nathaniel Bustos</a>
                                                        <div class="text-muted small">Manager</div>
                                                    </div>
                                                    <button type="button" class="btn btn-success btn-sm d-block">Follow</button>
                                                </div>
                                                <div class="media align-items-center">
                                                    <img src="img/follow/follow2.png" class="d-block ui-w-40 rounded-circle" alt>
                                                    <div class="media-body pl-3">
                                                        <a href="#" class="text-dark">Latanya Kinard</a>
                                                        <div class="text-muted small">Web Designer</div>
                                                    </div>
                                                    <button type="button" class="btn btn-success btn-sm  d-block btn-inverse">Following</button>
                                                </div>
                                                <div class="media align-items-center">
                                                    <img src="img/follow/follow3.png" class="d-block ui-w-40 rounded-circle" alt>
                                                    <div class="media-body pl-3">
                                                        <a href="#" class="text-dark">Dennis Dalton</a>
                                                        <div class="text-muted small">Manager</div>
                                                    </div>
                                                    <button type="button" class="btn btn-success btn-sm d-block">Follow</button>
                                                </div>
                                                <div class="media align-items-center">
                                                    <img src="img/follow/follow4.png" class="d-block ui-w-40 rounded-circle" alt>
                                                    <div class="media-body pl-3">
                                                        <a href="#" class="text-dark">George Lujan</a>
                                                        <div class="text-muted small">Founder</div>
                                                    </div>
                                                    <button type="button" class="btn btn-success btn-sm d-block">Follow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
<!--                                    <div class="col-xl-3 col-lg-6">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading heading-border">
                                                <h4 class="m-0">Recent Product</h4>
                                            </div>
                                            <div class="panel-body border-pannel product-2 pl-0 pr-0 pt-0 pb-0">
                                                <div class="media align-items-center">
                                                    <img src="img/product/pro1.png" class="d-block rounded-circle" alt>
                                                    <div class="media-body pl-3">
                                                        <a href="#" class="text-dark">Smart Watch</a>
                                                        <div class="text-muted small">Man collection</div>
                                                    </div>
                                                    <div class="pro-price">
                                                        <span>$49.99</span>
                                                    </div>
                                                </div>
                                                <div class="media align-items-center">
                                                    <img src="img/product/pro2.png" class="d-block  rounded-circle" alt>
                                                    <div class="media-body pl-3">
                                                        <a href="#" class="text-dark">Leather Bags</a>
                                                        <div class="text-muted small">Women collection</div>
                                                    </div>
                                                    <div class="pro-price">
                                                        <span>$49.99</span>
                                                    </div>
                                                </div>
                                                <div class="media align-items-center">
                                                    <img src="img/product/pro4.png" class="d-block rounded-circle" alt>
                                                    <div class="media-body pl-3">
                                                        <a href="#" class="text-dark">Headphone</a>
                                                        <div class="text-muted small">Man collection</div>
                                                    </div>
                                                    <div class="pro-price">
                                                        <span>$49.99</span>
                                                    </div>
                                                </div>
                                                <div class="media align-items-center">
                                                    <img src="img/product/pro2.png" class="d-block rounded-circle" alt>
                                                    <div class="media-body pl-3">
                                                        <a href="#" class="text-dark">Leather Bags</a>
                                                        <div class="text-muted small">Women collection</div>
                                                    </div>
                                                    <div class="pro-price">
                                                        <span>$49.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
<!--                                    <div class="col-xl-3 col-lg-6">
                                        <div class="pannel-wrapper white-bg mb-30">
                                            <div class="panel-heading heading-border">
                                                <h4 class="m-0">Calendar</h4>
                                            </div>
                                            <div class="panel-body border-pannel pl-0 pr-0 pt-0 pb-0">
                                                <div class="calendar-panel">
                                                    <div id="v-cal">
                                                        <div class="vcal-header">
                                                            <button class="vcal-btn" data-calendar-toggle="previous">
                                                                <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                                                                </svg>
                                                            </button>

                                                            <div class="vcal-header__label" data-calendar-label="month">
                                                                March 2017
                                                            </div>


                                                            <button class="vcal-btn" data-calendar-toggle="next">
                                                                <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="vcal-week">
                                                            <span>Mon</span>
                                                            <span>Tue</span>
                                                            <span>Wed</span>
                                                            <span>Thu</span>
                                                            <span>Fri</span>
                                                            <span>Sat</span>
                                                            <span>Sun</span>
                                                        </div>
                                                        <div class="vcal-body" data-calendar-area="month"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
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
            
