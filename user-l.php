<?php include 'pages/header.php';?>               

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
                                    <h4>Search</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="example-form">
                                         <form method="post" id="hotel-search-form">
                                            <div class="row">                                              
                                                <div class="col-xl-12">
                                                    <div class="date-to-date">
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <div class="input-append date form_datetime mb-30">
                                                                    <input class="form-control" size="16" type="text" name="user_name" id="user_name" placeholder="Name" >
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="input-append date form_datetime mb-30">
                                                                    <input class="form-control" size="16" type="text" name="user_email" id="user_email" placeholder="Email" >                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-xl-4">
                                                                <div class="input-append date form_datetime mb-30">
                                                                    <input class="form-control" size="16" type="text" name="user_number" id="user_number" placeholder="Number" >                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="input-append date form_datetime mb-30">
                                                                    <select class="form-control" id="user_status" name="user_status">
                                                                <option value="">All</option>
                                                                <option value="1">Active</option>
                                                                <option value="0">In-Active</option>
                                                                </select>                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <div class="ad-search-btn">
                                                                    <a title="Search" class="btn btn-success" id="search_user" > Search</a>
                                                                    <!--<button class="btn btn-success"> Search </button>-->
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
                                           <div id="error-user"></div>
					   <div id="list-user"></div>						
					   <table class="table"></table>
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
	<script src="js/carjs/user-list.js"></script>
   <script>
   var user_id=$("#user_id").val();
   var v_url="request/user-list.php";
   var v_id=$("#list-user");
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
	   $("body").on("change","#at_home",function(){
		   var hotel_id=$(this).data('hotel_id');
		   var thisval=$(this);
		   var at_home;
		   if($(this).is(':checked')){
			   at_home="1";
		   }else{
			    at_home="0";
		   }
		    $.ajax({
				type: "POST",
				url: "request/user-list.php",
				data: "hotel_home="+at_home+"&home_hotel_id="+hotel_id+"&home_hotel_userid="+user_id,
				success: function(response){
				}
					
				});
		   
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
