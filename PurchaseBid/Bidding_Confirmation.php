 <?php
  include('partials/header.php');
  include('partials/top_head.php'); 
  include('partials/sidebar.php'); 
?>

<div class="content-page ">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

             <!-- Loader Element (Initially hidden) -->
            <div id="loader" class="loader" style="display:none;"></div>


                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box justify-content-between d-flex align-items-md-center flex-md-row flex-column">     
                            <h4 class="page-title">Bidding Confirmation</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Purchase Bid</a></li>
                                <li class="breadcrumb-item active"><a href="javascript: void(0);">Bidding Confirmation</a></li>
                                <!-- <li class="breadcrumb-item active">Data Tables</li> -->
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                

                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" id="open_bid_tab" data-bs-toggle="tab" aria-current="page" href="#open">Open</a>
                  </li>                
                  <li class="nav-item">
                    <a class="nav-link" id="pending_confirmation_bid_tab" data-bs-toggle="tab" aria-current="page" href="#pending">Pending</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="confirmed_bid_tab" data-bs-toggle="tab" aria-current="page" href="#confirmed">Confirmed</a>
                  </li>              
                </ul>


                <div class="tab-content">

                    <div class="tab-pane show active" id="open">
                        <div class="card">
                          <div class="card-body">
                              <table class="table table-hover dataTable table-striped w-100" id="bidding_open_tbl">
                                <thead>
                                  <tr>
                                    <th>S.No</th>
                                    <th>Bid Number</th>
                                    <th>Material</th>
                                    <th>Bid Start Date & Time</th>
                                    <th>Bid End Date & Time</th>
                                    <th>UOM</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody class="bidding_open_tbody">
                                  <!-- Dynamic content will be loaded here -->
                                </tbody>
                              </table>

                          </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="pending">
                        <div class="card">
                          <div class="card-body">
                              <table class="table table-hover dataTable table-striped w-100" id="bidding_pending_tbl">
                                <thead>
                                  <tr>
                                    <th>S.No</th>
                                    <th>Bid Number</th>
                                    <th>Material</th>
                                    <th>UOM</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="bidding_pending_tbody">
                                  <!-- Dynamic content will be loaded here -->
                                </tbody>
                              </table>

                          </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="confirmed">
                        <div class="card">
                          <div class="card-body">
                              <table class="table table-hover dataTable table-striped w-100" id="bidding_confirmed_tbl">
                                <thead>
                                  <tr>
                                    <th>S.No</th>
                                    <th>Bid Number</th>
                                    <th>Material</th>
                                    <th>UOM</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="bidding_confirmed_tbody">
                                  <!-- Dynamic content will be loaded here -->
                                </tbody>
                              </table>

                          </div>
                        </div>
                    </div>                    
                </div>



                <!-- Confirmation Modal -->
                <div class="modal fade" id="confirmation_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Vendor Quote Confirmation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                            <div class="card">
                              <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-1">
                                        <p class="text-dark fw-bold">Bid Number</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p class="text-center text-dark fw-bold">:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="badge bg-danger" id="modal_bid_number"></span>
                                    </div>                                    
                                  </div>
                                  <table class="table table-hover dataTable table-striped w-100" id="bidding_confirm_tbl">
                                    <thead class="table-primary">
                                      <tr>
                                        <th>Position</th>
                                        <th>Vendor Code</th>
                                        <th>Vendor Name</th>
                                        <th>Quote Amount</th>
                                        <th>Negotiation Amount</th>
                                        <th>Remarks</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bidding_position_tbody">
                                      <!-- Dynamic content will be loaded here -->
                                    </tbody>
                                  </table>

                              </div>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>                



        </div> <!-- container -->


        <?php include('partials/footer.php') ?>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->


<?php include('partials/bottom_script.php') ?>

<script type="text/javascript">

    $(document).ready(function(){
        get_bidding_open_details();
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
            // "language": {
            //   searchPlaceholder: "EMP CODE"
            // },
            "info": false,
            "pageLength": 5
          });    
    } 

    function get_bidding_open_details()
    {
        $.ajax({
            url: 'Common_Ajax.php',
            type: 'POST',
            data: { Action : 'Get_Bid_Confirmation_Data',from : 'open' },
            dataType: "json",
            cache:false,
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function(response) {
                var html = '';
                if(response.data.length > 0) {
                    for(i in response.data) {
                        // var status_badge = '';

                        // if(response.data[i].Noc_Approval_Status == 'Pending') {
                        //     status_badge = `<span class='badge bg-primary'>${response.data[i].Noc_Approval_Status}</span>`;
                        //     approve_btn_status = 'disabled';
                        // } else if(response.data[i].Noc_Approval_Status == 'Completed') {
                        //     reopen_btn_status = ''
                        //     status_badge = `<span class='badge bg-warning'>${response.data[i].Noc_Approval_Status}</span>`;
                        // } else if(response.data[i].Noc_Approval_Status == 'Rejected') {
                        //     status_badge = `<span class='badge bg-danger'>${response.data[i].Noc_Approval_Status}</span>`;
                        // } else if(response.data[i].Noc_Approval_Status == 'Reopen') {
                        //     status_badge = `<span class='badge bg-info'>${response.data[i].Noc_Approval_Status}</span>`;
                        // }


                        html += `<tr>
                            <td>${ parseInt(i) + parseInt(1) }</td>
                            <td>${ response.data[i].bidnum }</td>
                            <td>${ response.data[i].MaterialDescription }</td>
                            <td>${ response.data[i].Bid_Start_Datetime }</td>
                            <td>${ response.data[i].Bidclosing_datetime }</td>
                            <td>${ response.data[i].UOM }</td>
                            <td>${ response.data[i].Quantity }</td>
                        </tr>`;
                    }
                }

                $('.bidding_open_tbody').html(html);
                datatable('bidding_open_tbl','yes');

            },
            complete:function() {
                $('.ajax-loader').css("visibility", "none");
            }
        }); 
   } 



   function get_bidding_pending_confirmation_details()
   {
        $.ajax({
            url: 'Common_Ajax.php',
            type: 'POST',
            data: { Action : 'Get_Bid_Confirmation_Data',from : 'pending' },
            dataType: "json",
            cache:false,
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function(response) {
                var html = '';
                if(response.data.length > 0) {
                    for(i in response.data) {
                        var status_badge = '';
                        if(response.data[i].Bid_status == null) {
                            status_badge = `<span class='badge bg-secondary' style="width: 90px;">No Participant</span>`;
                        } else if(response.data[i].Bid_status == 'Quoted') {
                            status_badge = `<span class='badge bg-primary' style="width: 90px;">${ response.data[i].Bid_status}</span>`;
                        } else if(response.data[i].Bid_status == 'Quote Accepted') {
                            status_badge = `<span class='badge bg-warning' style="width: 90px;">${ response.data[i].Bid_status}</span>`;
                        } else if(response.data[i].Bid_status == 'Not Confirmed') {
                            status_badge = `<span class='badge bg-danger' style="width: 90px;">${response.data[i].Bid_status}</span>`;
                        } else if(response.data[i].Bid_status == 'Confirmed') {
                            status_badge = `<span class='badge bg-info' style="width: 90px;">${response.data[i].Bid_status}</span>`;
                        } 

                        html += `<tr>
                            <td>${ parseInt(i) + parseInt(1) }</td>
                            <td>${ response.data[i].bidnum }</td>
                            <td>${ response.data[i].MaterialDescription }</td>
                            <td>${ response.data[i].UOM }</td>
                            <td>${ response.data[i].Quantity }</td>
                            <td>${ status_badge }</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success bid_confirm" data-bidnum="${response.data[i].bidnum}" data-material-code="${ response.data[i].Materialcode }" data-material="${ response.data[i].MaterialDescription }">Confirm</button>
                            </td>
                        </tr>`;
                    }
                }

                $('.bidding_pending_tbody').html(html);
                datatable('bidding_pending_tbl','yes');

            },
            complete:function() {
                $('.ajax-loader').css("visibility", "none");
            }
        }); 
   } 


    function get_bidding_confirmed_details()
    {
        $.ajax({
            url: 'Common_Ajax.php',
            type: 'POST',
            data: { Action : 'Get_Bid_Confirmation_Data',from : 'confirmed' },
            dataType: "json",
            cache:false,
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function(response) {
                var html = '';
                if(response.data.length > 0) {
                    for(i in response.data) {
                        html += `<tr>
                            <td>${ parseInt(i) + parseInt(1) }</td>
                            <td>${ response.data[i].bidnum }</td>
                            <td>${ response.data[i].MaterialDescription }</td>
                            <td>${ response.data[i].UOM }</td>
                            <td>${ response.data[i].Quantity }</td>
                            <td>
                                <span class='badge bg-primary'>Confirmed</span>
                            </td>
                        </tr>`;
                    }
                }

                $('.bidding_confirmed_tbody').html(html);
                datatable('bidding_confirmed_tbl','yes');


            },
            complete:function() {
                $('.ajax-loader').css("visibility", "none");
            }
        }); 
    } 


    $(document).on('click','#open_bid_tab',function(){
        get_bidding_open_details();
    });

    $(document).on('click','#pending_confirmation_bid_tab',function(){
        get_bidding_pending_confirmation_details();
    });

    $(document).on('click','#confirmed_bid_tab',function(){
        get_bidding_confirmed_details();
    }); 

    $(document).on('click','.bid_confirm',function(){
        var bidnum = $(this).data('bidnum');
        var material_code = $(this).data('material-code');
        var material = $(this).data('material');

        $.ajax({
            url: 'Common_Ajax.php',
            type: 'POST',
            data: { Action : 'Get_bid_top_level_positions',bid_num : bidnum,material_name : material,material_code : material_code },
            dataType: "json",
            cache:false,
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function(response) {
                var html = '';
                if(response.data.length > 0) {
                    var confirm_disabled = '';
                    for(i in response.data) {
                        var status_badge = '';

                        if(response.data[i].Confirm_Status == null) {
                            status_badge = `<span class='badge bg-primary' style="width: 90px;">Quoted</span>`;
                        } else if(response.data[i].Confirm_Status == 'Quote Accepted') {
                            status_badge = `<span class='badge bg-warning' style="width: 90px;">${ response.data[i].Confirm_Status}</span>`;
                            confirm_disabled = 'disabled';
                        } else if(response.data[i].Confirm_Status == 'Not Confirmed') {
                            status_badge = `<span class='badge bg-danger' style="width: 90px;">${response.data[i].Confirm_Status}</span>`;
                        } else if(response.data[i].Confirm_Status == 'Confirmed') {
                            status_badge = `<span class='badge bg-info' style="width: 90px;">${response.data[i].Confirm_Status}</span>`;
                        } 
                                               
                        html += `<tr>
                            <td>${ parseInt(i) + parseInt(1) }</td>
                            <td>${ response.data[i].Quoted_Employee }</td>
                            <td>${ (response.data[i].VendorName) || '-' }</td>
                            <td>${ response.data[i].Posted_Quote_Value }</td>
                            <td>
                                <input type="text" class="form-control only_numbers negotiation_value" name="negotiation_value"  autocomplete="off" data-quoteAmt="${response.data[i].Posted_Quote_Value}" value="${ (response.data[i].negotiation_value !== null) ? response.data[i].negotiation_value : ''  }">
                            </td>

                            <td>
                                <textarea class="form-control confirmation_remarks" name="confirmation_remarks">${ (response.data[i].Admin_Confirm_Remarks !== null) ? response.data[i].Admin_Confirm_Remarks : '' }</textarea>
                            </td>                        
                            <td style="vertical-align:middle;">${ status_badge }</td>
                            <td style="vertical-align:middle;">
                                <button type="button" class="btn btn-sm btn-success admin_bid_confirm" data-id="${response.data[i].Id}" data-bidnum="${ response.data[i].Bid_Num }" data-material-code="${ response.data[i].Bid_Material_Code }" data-material="${ response.data[i].Bid_Material }" ${ confirm_disabled }>Confirm</button>
                            </td>
                        </tr>`;

                    }
                }

                $('#modal_bid_number').text(response.data[0].Bid_Num);
                $('.bidding_position_tbody').html(html);
                $('#confirmation_modal').modal('show');

            },
            complete:function() {
                $('.ajax-loader').css("visibility", "none");
            }
        });         
    });

   
    $(document).on("keypress",".only_numbers",function(e){
        var regex = new RegExp("^[0-9.]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
         e.preventDefault();
        return false;
    });

    $(document).on("keyup",".negotiation_value",function(){
        var quoteAmt = $(this).data('quoteamt');
        var negotiation_amt = $(this).val();

        if(parseInt(quoteAmt) < parseInt(negotiation_amt)) {
            $(this).val('');
            alert_msg("Warning","Please enter negotiation amount below quoted amount.","warning");
        }
    });
    

    function alert_msg(title,msg,icon)
    {
        Swal.fire({
            title: title,
            text: msg,
            icon: icon,
        });
    }    


    $(document).on("click",".admin_bid_confirm",function(e){
        var id = $(this).data('id'); 
        var bidnum = $(this).data('bidnum'); 
        var material_code = $(this).data('material-code'); 
        var material = $(this).data('material'); 
        var negotiation_value = $(this).closest('tr').find('.negotiation_value').val();
        var confirmation_remarks = $(this).closest('tr').find('.confirmation_remarks').val();


        if(negotiation_value == '' || negotiation_value == 0) {
            alert_msg("Warning","Please Enter Negotiation Amount.","warning");
        } else if(confirmation_remarks == '') {
            alert_msg("Warning","Please Enter Confirmation Remarks.","warning");
        } else {
            $.ajax({
                url:  'Common_Ajax.php',
                type: 'POST',
                data: { Action : 'admin_bid_confirmation',id : id,negotiation_value : negotiation_value,confirmation_remarks : confirmation_remarks,bidnum : bidnum,material : material,material_code : material_code },
                dataType: 'json',
                beforeSend: function(){
                    $('.ajax-loader').css("visibility", "visible");
                },              
                success: function(response) {
                    $('#confirmation_modal').modal('hide');

                    if (response.status == 200) {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: response.message,
                        }).then(function(isconfirmed){
                            if(isconfirmed) {
                                location.reload();
                            }
                        });                         

                    } else {
                        alert_msg("Warning",response.message,"warning");
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "Error in Registration.",
                        confirmButtonText: "OK"
                    });
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "none");
                }
            });

        }
        
    });



</script>