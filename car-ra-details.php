<?php include 'pages/header.php';include_once '../config/config.php';
include('../config/pagination.php');?>               

            <!-- begin .app-container -->
            <div class="app-container">
            <?php include 'pages/aside.php';?>
                <!-- begin .app-side -->
                
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
                                    <h4>Car List</h4>
                                </div>
                                
                            </div>
                        </div>

                                    <div class="col-lg-12 d-none d-lg-none d-xl-block">
                                           <?php
                                           $page	= new page();
$DB = new DBHandler();
$per_page = 15;
                                           if(isset($_POST["page"])){
 $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); 
	if(!is_numeric($page_number)){die('Invalid page number!');}
}else{
    $page_number = 1;

}
                                           $user_id=0;
                                           $car_id=$_GET["token"];
                                           $htl_qry="SELECT `sc_id`, `sc_name`, `sc_image`, `sc_kf_id`, `admin_id`, `sc_status` FROM `sub_car` LEFT OUTER JOIN administrator ON administrator.id=sub_car.admin_id WHERE sc_kf_id='".$car_id."' order by sub_car.sc_id desc";
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
										$status=($val["sc_status"]==1)?'<a href="#" data-hotel_id="'.$val["sc_id"].'" title="Admin Active" class="btn btn-xs btn-success" id="hotel_status" data-status="'.$val["sc_status"].'"><i class="fa  fa-plus-circle"></i> Active</a>':'<a href="#" data-hotel_id="'.$val["sc_id"].'" title="Admin Active" class="btn btn-xs btn-danger" id="hotel_status" data-status="'.$val["sc_status"].'"><i class="fa  fa-minus-circle"></i> In-active</a>';
										
										echo '<tr><td>'.$cnt.'</td>';										
										echo '<td>'. $val["sc_name"].'</td><td><img src="../car_images/'.$val["sc_image"].'" style="height:100px;width:100px;" /></td><td >'.$status.'</td><td><a href="car-ra-add?token='.$val["sc_id"].'" title="Edit" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
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
	
                                           ?>		
					   
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
            <input type="hidden" name="login_type" id="login_type" value="ta_<?= $rac_admin_id; ?>" /> 
         <?php include 'pages/footer.php';?>
         				
<!--<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
 Bootstrap Core JavaScript 
   <script src="js/bootstrap.min.js"></script>-->
       <script src="js/carjs/modal.js"></script>
	<script src="js/carjs/functions.js"></script>
	<script src="js/carjs/car-list.js"></script>
   <script>
   var user_id=$("#user_id").val();
   var v_url="request/car-list.php";
   var v_id=$("#list-car");
   var v_postdata="user_view=user_view&view_user_id="+user_id;
	ajax_request(v_url,v_postdata,v_id);
	var page_postdata=v_postdata;
   $(document).ready(function(){  
	   //$("#search_hotel").click(); 
		$("body").on("click","#search_user",function(){
		var search_data=v_postdata+"&"+$("#hotel-search-form").serialize();
		//alert(search_data);
		ajax_request(v_url,search_data,v_id);
		});
	   
	   
	    
		$("body").on( "click", ".pagination-sm a", function (e){
                        e.preventDefault();
                         var page = $(this).attr("data-page"); 
		 var ref_this = $('.pagination-sm').find("li.active a");
		var page2=ref_this.data("page"); 
		if(page2 !=page){	
		 var send_data=page_postdata+"&page="+page;
		 ajax_request(v_url,send_data,v_id);	
		 }
            });	
           });
   
   
   </script>  
