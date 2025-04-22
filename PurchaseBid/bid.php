<?php 
include '../auto_load.php';
$sql = "SELECT Designation from HR_Master_Table where Employee_Code = '".$_SESSION['EmpID']."'";
$stmt = sqlsrv_query($conn, $sql, array(), array("Scrollable" => 'static'));
$user_data = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Bidding</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
        

    <!-- Datatables css -->
    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />  

    <!--sweet alert  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/custom.css"/>

</head>
<body>
        <div class="row">
            <div class="col-md-12">
                <!-- ========== Topbar Start ========== -->
                <div class="navbar-custom">
                    <div class="topbar container-fluid">
                        <div class="d-flex align-items-center gap-lg-2 gap-1">

                            <!-- Topbar Brand Logo -->
                            

                            <a href="../pages/landing.php" class="logo logo-dark">
                                <span class="logo-lg">
                                    <img src="../global/photos/logo.png" alt="dark logo" style="width: 80px;height: 40px;">
                                </span>
                                <span class="logo-sm">
                                    <img src="../assets/images/VijayRasiSeedsLogo.png" alt="small logo">
                                </span>
                            </a>

                            <!-- Horizontal Menu Toggle Button -->
                            <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </button>

                        </div>

                        <div class="project_head">
                            <h3>Purchase Bidding</h3>
                        </div>

                        <ul class="topbar-menu d-flex align-items-center gap-3">


                            <li class="dropdown me-md-2">
                                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                                    </span>
                                    <span class="d-lg-flex flex-column gap-1 d-none">
                                        <h5 class="my-0"><?php echo $_SESSION['Name'] ?></h5>
                                        <h6 class="my-0 fw-normal"><?php echo $user_data['Designation']; ?></h6>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                    <!-- item-->
                                    <a href="../logout.php" class="dropdown-item">
                                        <i class="ri-logout-box-fill align-middle me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ========== Topbar End ========== -->
            </div>
        </div>

        <div class="wrapper">
        <div class="container" id="live-bid-section">
            <div id="bidsContainer"></div>
        </div>

        <div class="container" id="upcomming-bid-section">
            <div id="Upcomming_Container"></div>
        </div> 

        <div class="container" id="order-section">
            <div class="row" id="Order_Container">
                <div class="card">
                  <div class="card-body">
                      <table class="table table-hover dataTable table-striped w-100" id="order_tbl">
                        <thead class="table-primary">
                          <tr>
                            <th>S.No</th>
                            <th>Bid Number</th>
                            <th>Bid Material</th>
                            <th>UOM</th>
                            <th>Quantity</th>
                            <th>Quote Amount</th>
                            <th>Negotiation Amount</th>
                            <th>Confirmation Remarks</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="order_tbl_tbody">
                          <!-- Dynamic content will be loaded here -->
                        </tbody>
                      </table>

                  </div>
                </div>
            </div>
        </div>   

        <div class="container" id="history-section">
            <div class="row" id="History_Container">
                <div class="card">
                  <div class="card-body">
                      <table class="table table-hover dataTable table-striped w-100" id="history_tbl">
                        <thead class="table-primary">
                          <tr>
                            <th>S.No</th>
                            <th>Bid Number</th>
                            <th>Bid Material</th>
                            <th>UOM</th>
                            <th>Quantity</th>
                            <th>Quote Amount</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody class="history_tbl_tbody">
                          <!-- Dynamic content will be loaded here -->
                        </tbody>
                      </table>

                  </div>
                </div>
            </div>
        </div>    


        <!-- Sliding Popup -->
        <div id="bidPopup" class="bid-popup">
            <p class="text-start"><span class="text-primary">Bid Number</span> : <span class="badge bg-primary ms-2" id="bid_num_badge"></span></p>
            <hr>
            <p class="text-center" id="modal_postval_paragraph"><span class="text-danger">Post Value</span> : <strong id="modal_postval"></strong></p>
            <p class="text-primary text-center"><strong id="modal_bid_postion"></strong></p>

            <!-- <h4>Enter Your Bid</h4> -->
            <form id="bid_post_form">
                <input type="hidden" id="bid_num" name="bid_num">
                <input type="hidden" id="bid_material_code" name="bid_material_code">
                <input type="hidden" id="bid_material_name" name="bid_material_name">
                
                <input type="number" min="1" id="bidAmount" name="Bid_Amount" class="form-control" placeholder="Enter bid amount">
                <button class="btn btn-success mt-2" id="post_bid" type="submit">Submit Bid</button>
                <button class="btn btn-danger mt-2" id="closePopup" type="button">Cancel</button>
            </form>
        </div>


        <div class="bottom-nav mt-5">
            <a href="javascript:void(0)" class="live-bid-tab active"><i class="fa-solid fa-ranking-star"></i> Live</a>
            <a href="javascript:void(0)" class="upcomming-bid-tab"><i class="fa-solid fa-layer-group"></i> Upcoming</a>
            <a href="javascript:void(0)" class="order-tab conform">
                <i class="fa-solid fa-file-pen"></i>Order</a>
            <a href="javascript:void(0)" class="history-tab Historyclass"><i class="fa-solid fa-clock-rotate-left"></i> History</a>
        </div>
        </div>    



    <!-- Datatables js -->
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        $(document).ready(function(){
                // get_live_bid_details();
            
            setInterval(function(){
                get_live_bid_details();
            },1000);           

            datatable('order_tbl','no');
            datatable('history_tbl','no');

        });

        function datatable(element_id,destroy_status = 'no')
        {
            if(destroy_status == 'yes') {
                $('#'+element_id).DataTable().destroy();
            }

             $('#'+element_id).DataTable({
                "dom": 'Bfrtip',
                "scrollX": true,
                 "buttons": [{
                      extend: 'copy',
                    }, {
                      extend: 'csv',
                           
                    }, {
                      extend: 'excel'
                    }, {
                      extend: 'pdf'      
                    }, {
                      extend: 'print'      
                    },],
                  
                "bScrollCollapse": true,
                "info": false,
                "pageLength": 5
              });    
        } 

       $(document).on('click','.live-bid-tab',function(){
            $('#upcomming-bid-section').hide();
            $('#order-section').hide();
            $('#history-section').hide();
            $('#live-bid-section').show();

            $('.upcomming-bid-tab').removeClass('active');
            $('.order-tab').removeClass('active');
            $('.history-tab').removeClass('active');
            $('.live-bid-tab').addClass('active');
       });

       $(document).on('click','.upcomming-bid-tab',function(){
            $('#order-section').hide();
            $('#history-section').hide();
            $('#live-bid-section').hide();
            $('#upcomming-bid-section').show();

            $('.live-bid-tab').removeClass('active');
            $('.order-tab').removeClass('active');
            $('.history-tab').removeClass('active');
            $('.upcomming-bid-tab').addClass('active'); 

            Get_Upcomming_Bidding_Details();       
       });

        $(document).on('click','.order-tab',function(){
            $('#history-section').hide();
            $('#live-bid-section').hide();
            $('#upcomming-bid-section').hide();        
            $('#order-section').show();

            $('.live-bid-tab').removeClass('active');
            $('.upcomming-bid-tab').removeClass('active');
            $('.history-tab').removeClass('active');
            $('.order-tab').addClass('active');    


            $('#order_tbl').DataTable().destroy();

            Get_Order_Bidding_Details();      
       }); 

       $(document).on('click','.history-tab',function(){
            $('#live-bid-section').hide();
            $('#upcomming-bid-section').hide();        
            $('#order-section').hide();    
            $('#history-section').show();

            $('.live-bid-tab').removeClass('active');
            $('.upcomming-bid-tab').removeClass('active');
            $('.order-tab').removeClass('active');
            $('.history-tab').addClass('active'); 

            $('#history_tbl').DataTable().destroy();

            Get_Bidding_History_Details();      

       });

        function placeBid(bid_number,material,Materialcode,bid_row_id) {
            var material = atob(material);

            $("#bidPopup").css("bottom", "50%"); // Show popup
            $('#bid_num').val(bid_number);
            $('#bid_material_code').val(Materialcode);
            $('#bid_material_name').val(material);

            var post_val  = $('#postval_'+bid_row_id).text();
            $('#modal_postval').text(post_val);
            
            $('#modal_postval_paragraph').hide();
            if(post_val != '' && post_val != null) {
                $('#modal_postval_paragraph').show();
            }

            $('#bid_num_badge').text(bid_number);

            var bid_postion  = $('#position_'+bid_row_id).text();
            $('#modal_bid_postion').text(bid_postion);

        }

        $("#closePopup").on("click", function () {
            $("#bidPopup").css("bottom", "-250px"); // Hide popup when canceled
        });


        function get_live_bid_details()
        {
            $.ajax({
                url: 'Common_Ajax.php',
                type: 'POST',
                data: { Action : 'Get_Live_Bidding_Details' },
                dataType: "json",
                cache:false,
                success: function(response) {
                    var bidCard = ''; 
                    var opened_modal_bidnum = $('#bid_num_badge').text();
                    var modal_close = true;

                    if(response.length > 0) {
                        response.forEach((bid) => {
                             if(opened_modal_bidnum == bid.bidnum) {
                                modal_close = false;
                             }

                             bidCard += `
                                <div class="bid-container mb-5">
                                    <div class="bid-header">🏆 Bid Number - ${bid.bidnum} - ${bid.MaterialDescription}</div>
                                    <div class="bid-details">
                                        <div class="row">
                                            <div class="col-md-9 col-12">
                                                <div class="row">
                                                    <p class="bid-label col-md-2 col-5">Material Group</p>
                                                    <p class="bid-label col-md-1 col-2">:</p>
                                                    <p class="highlight col-md-9 col-5">${bid.Materialgroup}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12 text-end">
                                                <div class="row">
                                                    <p class="bid-label col-md-4 col-5 text-start">UOM</p>
                                                    <p class="bid-label col-md-1 col-2 text-start">:</p>
                                                    <p class="highlight col-md-7 col-5 text-start">${bid.UOM}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9 col-12">
                                                <div class="row">
                                                    <p class="bid-label col-md-2 col-5">Quantity</p>
                                                    <p class="bid-label col-md-1 col-2">:</p>
                                                    <p class="highlight col-md-9 col-5">${bid.Quantity}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <p><strong>📍 Location:</strong> <span class="highlight">${bid.Plant_Name}</span></p>
                                                <p><strong>⏳ Time Left:</strong> <span id="countdown-${bid.bidnum}" class="countdown countdown-${bid.bidnum}">${ bid.time_left }</span></p>
                                            </div>
                                            <div class="col-md-6 col-12 text-md-end">
                                                <p><strong></strong></p>
                                                <p class="text-primary"><strong id="position_${bid.Mat_Id}">${bid.position}</strong></p>`;
                                                if(bid.Bid_Posted_Value != '') {
                                                    bidCard += `<p><span class="text-danger fw-bold">Post Value</span> : <strong class="text-dark"  id="postval_${bid.Mat_Id}">${bid.Bid_Posted_Value}</strong></p>`;
                                                }

                                            bidCard += `</div>
                                        </div>


                                    </div>
                                    <button class="btn btn-bid mt-3" onclick="placeBid('${bid.bidnum}','${ btoa(bid.MaterialDescription)}','${bid.Materialcode}','${bid.Mat_Id}')">💰 Place Your Bid</button>
                                </div>`;
                                
                        });

                    }

                    $('#bidsContainer').html(bidCard);

                    if(modal_close) {
                        clear_modal();
                    }

                }
            });  
        }


        function clear_modal()
        {
            $("#bidPopup").css("bottom", "-250px"); // Hide popup when canceled
            $('#bid_post_form')[0].reset();
        }

        $(document).on('submit','#bid_post_form',function(e){
            e.preventDefault();
            var form =  $('#bid_post_form').serialize();

            $.ajax({
                url: 'Common_Ajax.php',
                type: 'POST',
                data: { Action : 'post_bid',form : form },            
                dataType: 'json',
                beforeSend:function(){
                    $('.ajaxloader').show();
                },
                success: function(response) {
                    clear_modal();
                    if(response.status == 200) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                complete:function(){
                    $('.ajaxloader').hide();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    toastr.error('Error in request');
                }
            });
        });


        function Get_Upcomming_Bidding_Details()
        {
            $.ajax({
                url: 'Common_Ajax.php',
                type: 'POST',
                data: { Action : 'Get_Upcomming_Bidding_Details' },
                dataType: "json",
                cache:false,
                success: function(response) {
                    var bidCard = ''; 

                    if(response.length > 0) {
                        response.forEach((bid) => {
                             bidCard += `
                                <div class="bid-container mb-5">
                                    <div class="bid-header">🏆 Bid Number - ${bid.bidnum} - ${bid.MaterialDescription}</div>
                                    <div class="bid-details">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <p class="bid-label col-6">Material Group:</p>
                                                    <p class="highlight col-6">${bid.Materialgroup}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <p class="bid-label col-6">UOM:</p>
                                                    <p class="highlight col-6">${bid.UOM}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <p class="bid-label col-6">Quantity:</p>
                                                    <p class="highlight col-6">${bid.Quantity}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <p class="bid-label col-6">Date & Time:</p>
                                                    <p class="highlight col-6">${bid.Bid_Start_Datetime}</p>
                                                </div>
                                            </div>                                
                                        </div>
                                        <hr>

                                    </div>
                      
                                </div>`;
                                
                        });

                    }

                    $('#Upcomming_Container').html(bidCard);
                }
            });  
        }        

        function Get_Order_Bidding_Details()
        {
            $.ajax({
                url: 'Common_Ajax.php',
                type: 'POST',
                data: { Action : 'Get_Order_Bidding_Details' },
                dataType: "json",
                cache:false,
                success: function(response) {
                    var html = '';
                    if(response.data.length > 0) {
                        for(i in response.data) {
                            var status_badge = '';
                            var btn_disabled = (response.data[i].Confirm_Status != 'Quote Accepted') ? 'disabled' : ''; 

                            var action = `<button type="button" class="btn btn-sm btn-success vendor_bid_confirm" data-id="${response.data[i].Id}" data-bidnum="${response.data[i].Bid_Num}" data-material-code="${response.data[i].Bid_Material_Code}" data-material="${response.data[i].Bid_Material}" style="width: 118px;" ${btn_disabled}><i class="fa-solid fa-circle-check"></i> Confirm</button>
                                    <button type="button" class="btn btn-sm btn-primary vendor_bid_not_confirm mt-1" data-id="${response.data[i].Id}" data-bidnum="${response.data[i].Bid_Num}" data-material-code="${response.data[i].Bid_Material_Code}" data-material="${response.data[i].Bid_Material}" ${btn_disabled}><i class="fa-solid fa-circle-xmark"></i> Not Confirm</button>`;

                            if(response.data[i].Confirm_Status == null) {
                                status_badge = `<span class='badge bg-primary' style="width: 115px;">Quoted</span>`;
                            } else if(response.data[i].Confirm_Status == 'Quote Accepted') {
                                status_badge = `<span class='badge bg-warning' style="width: 115px;">${ response.data[i].Confirm_Status}</span>`;
                            } else if(response.data[i].Confirm_Status == 'Not Confirmed') {
                                status_badge = `<span class='badge bg-danger' style="width: 115px;">${response.data[i].Confirm_Status}</span>`;
                            } else if(response.data[i].Confirm_Status == 'Confirmed') {
                                status_badge = `<span class='badge bg-info' style="width: 115px;">${response.data[i].Confirm_Status}</span>`;

                                action = '<span class="badge bg-danger">Bid Closed</span>';
                            } 
                                                   
                            html += `<tr>
                                <td>${ parseInt(i) + parseInt(1) }</td>
                                <td>${ response.data[i].Bid_Num }</td>
                                <td>${ response.data[i].Bid_Material }</td>
                                <td>${ response.data[i].UOM }</td>
                                <td>${ response.data[i].Quantity }</td>
                                <td>${ response.data[i].Posted_Quote_Value }</td>
                                <td>${ response.data[i].negotiation_value }</td>
                                <td>${ response.data[i].Admin_Confirm_Remarks }</td>
                                <td>${ status_badge }</td>
                                <td>
                                   ${action}                            
                                </td>
                            </tr>`;

                        }
                    }

                    $('.order_tbl_tbody').html(html);
                    datatable('order_tbl','no');

                }
            });  
        }        
        

       $(document).on('click','.vendor_bid_confirm',function(){
            var id      = $(this).data('id');
            var bidnum  = $(this).data('bidnum');
            var material= $(this).data('material');
            var material_code = $(this).data('material-code');

            Swal.fire({
              title: "Are you sure?",
              text: "You want to confirm this bid !",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, Confirm!"
            }).then((result) => {
              if (result.isConfirmed) { 
                // call confirm ajax     
                $('#order_tbl').DataTable().destroy();
                order_confirm(id,'confirm','',bidnum,material,material_code);
              }
            });
            

       }); 


       $(document).on('click','.vendor_bid_not_confirm',function(){
            var id  = $(this).data('id');
            var bidnum  = $(this).data('bidnum');
            var material= $(this).data('material');
            var material_code = $(this).data('material-code');

            Swal.fire({
              title: "Are you sure?",
              text: "You want to not confirm this bid !",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, Not Confirm!",
              input: 'textarea',
              inputPlaceholder: "Write Reason"
            }).then((result) => {
              if (result.isConfirmed) {
                // call not confirm ajax 
                $('#order_tbl').DataTable().destroy();

                order_confirm(id,'not_confirm',result.value,bidnum,material,material_code);
              }
            });
            

       });   


       function order_confirm(id,from,remarks = '',bidnum = '',material = '',material_code = '')
       {
            $.ajax({
                url:  'Common_Ajax.php',
                type: 'POST',
                data: { Action : 'vendor_bid_confirmation',id : id,from : from,remarks : remarks,bidnum : bidnum,material : material,material_code : material_code },
                dataType: 'json',
                beforeSend: function(){
                    $('.ajax-loader').css("visibility", "visible");
                },              
                success: function(response) {
                    if (response.status == 200) {
                        toastr.success(response.message);      
                        Get_Order_Bidding_Details();                
                    } else {
                        toastr.warning(response.message);                      
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    toastr.error("Error in Registration.");                      

                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "none");
                }
            }); 
       }     


        function Get_Bidding_History_Details()
        {
            $.ajax({
                url: 'Common_Ajax.php',
                type: 'POST',
                data: { Action : 'Get_Bidding_History_Details' },
                dataType: "json",
                cache:false,
                success: function(response) {
                    var html = '';
                    if(response.data.length > 0) {
                        for(i in response.data) {   
                            html += `<tr>
                                <td>${ parseInt(i) + parseInt(1) }</td>
                                <td>${ response.data[i].Bid_Num }</td>
                                <td>${ response.data[i].Bid_Material }</td>
                                <td>${ response.data[i].UOM }</td>
                                <td>${ response.data[i].Quantity }</td>
                                <td>${ response.data[i].Posted_Quote_Value }</td>
                                <td><span class='badge bg-danger' style="width: 115px;">Not Confirmed</span></td>
                            </tr>`;

                        }
                    }

                    $('.history_tbl_tbody').html(html);
                    datatable('history_tbl','no');

                }
            });  
        }                              
        

    </script>

</body>
</html>
