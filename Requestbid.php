 <?php
  include('partials/header.php');
  include('partials/top_head.php'); 
  include('partials/sidebar.php'); 
  


function Generate_Document_No($id){
  global $conn;
  //$Emp_Id=$Emp_Id !=''? strtoupper(trim($Emp_Id)) : "";
   $Doc_No_Auto_Generation_Sql="Purchase_BiddingNum_AutoNum @Id=".$id."";

 //  echo "Vechicle_Auot_Generate_No @Id=".$id."";
  $Doc_No_Auto_Generation_Dets=sqlsrv_query($conn,$Doc_No_Auto_Generation_Sql);
  $Doc_No_Auto_Generation_Result = sqlsrv_fetch_array($Doc_No_Auto_Generation_Dets);
  return $MC_Doc_No_Generation_Id=$Doc_No_Auto_Generation_Result['PrimaryId'];
}
$Doc_No=Generate_Document_No(0);



  ?>

<style type="text/css">
    .select2-selection.select2-selection--single {
        height: 30px;
    }
    .fs-12 {
        font-size: 12px !important;
    }

    .w-75 {
        width: 85px !important;
    }.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 35px !important;
    user-select: none;
    -webkit-user-select: none;
}.select2-dropdown {
   font-size: 12px;
}.select2-selection__rendered{
font-size: 12px;

}.form-label{
    font-size: 12px;
}
</style>
<style>
            table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
            border: 0px solid #ccc;
            }
            #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }
            #customers td, #customers th {
            border: 1px solid #ddd;
/*            padding: 15px;*/
            font-size: 13px;
      font-style: normal;
      font-weight: 600;
      font-family: auto;
            }
            #customers tr:nth-child(even){background-color: #f2f2f2;}
            #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
            }
      #customers strong{
            color: #f0554a;
/*    font-size: 20px;*/
    font-style: normal;
    font-weight: 800;
    font-family: auto;
            }
      
      #currenttable tr:nth-child(even){background-color: #f2f2f2;}
            #currenttable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0ab5ba;
            color: white;
            font-style: normal;
            }
      
  .nav-justified .nav-item
  {
    font-family:auto;
  }   
  .watermark::after {
      content: "";
     background:url(https://www.google.co.in/images/srpr/logo11w.png);
      opacity: 0.2;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      position: absolute;
      z-index: -1;   
    }

    .error-text {
        display: none;
        font-size: smaller;
        font-weight: normal;
        width: 100%;
        text-align: center;                
    }

    .vendor_tbl,.form_submission_div,.vendor_generation_div {
        display: none;
    }
    </style>
    <link href="assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />


     <!-- Flatpickr Timepicker css -->
        <link href="assets/vendor/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme Config Js -->
        <script src="assets/js/config.js"></script>

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />


               <!-- Daterangepicker css -->
        <link href="assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        
        <!-- Bootstrap Touchspin css -->
        <link href="assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />

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
                                    <h4 class="page-title"></h4>
                                     <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bidding</a></li>
                                        <li class="breadcrumb-item active"><a href="javascript: void(0);">Create</a></li>
                                        <!-- <li class="breadcrumb-item active">Data Tables</li> -->
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row ">
                            <div class="col-12">
                                <div class="card bg-lightblue ">
                                    <div class="card-body">

                                        <h4 class="header-title text-white">Bidding Request <span style="float: right;">Bid No-<?php echo $Doc_No ?></span></h4>

                                        <input type="hidden" name="bidnum" value="<?php echo $Doc_No ?>">
                                       
                                      
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                   <div class="card-body ">
                                        
        <form class="needs-validation SubmitForm BiddingDetailsPost" novalidate>
                                        <input type="hidden" name="bidnum" value="<?php echo $Doc_No ?>">

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="mb-2">
                                                     <div class="position-relative mb-3">
                                                <label class="form-label Materialgroup" for="validationTooltip01">Material Group</label>

                                                <select class="js-example-basic-single form-control materialgroup validationTooltip02"   id="validationTooltip01"  name="Materialgroup" required>

                                                <option value="">Select </option>
                                                <?php
                                                $MaterialGroupSql   = "SELECT DISTINCT MaterialGroup from MaterialMaster ";
                                                $MaterialGroup = sqlsrv_query($conn,$MaterialGroupSql);
                                                while($row = sqlsrv_fetch_array($MaterialGroup)){
                                                ?>
                                                <option value="<?=trim($row['MaterialGroup'])?>"> <?php echo trim($row['MaterialGroup']); ?> </option>
                                                <?php } ?>




                                                </select>
                                                <span class="error-text text-danger">Mandatory Fields.</span>


                                              
                                                
                                            </div>
                                                </div>
        
                                            </div> <!-- end col -->



                                             <div class="col-sm-3">
                                                <div class="mb-2">
                                                     <div class="position-relative mb-3">
                                                <label class="form-label uom" for="validationTooltip01">TransDate</label>
                                                <input type="text" class="form-control" value="<?php echo date('d-m-Y')?>" name="Transdate" readonly>
                                                <span class="error-text text-danger">Mandatory Fields.</span>
                                                
                                            </div>
                                                </div>
        
                                            </div> <!-- end col -->

                                        </div>


                                        <!------------Multiple Material --------------->

                                           <div class="table-responsive group-table" id="customers">
                                                                                                                           
                                              <table  id="currenttable" class="text-nowrap">
                                                 <thead>
                                                    <tr>
                                                     
                                                      <th>MaterialCode</th>
                                                      <th>Material Description</th>
                                                    
                                                      <th>UOM</th>
                                                      <th>Quantity</th>
                                                      <th>Expected Delivery Date</th>
                                                      <th>Specification</th>
                                                      <th>Action</th>
                                                    </tr>
                                                 
                                                 </thead>
                                                 <tbody class="MaterialArray">
                                                    <tr>
                                                      
                                                        <td>
                                                        <div>         
                                                          <select class="js-example-basic-single   Materialcode validationTooltip02"  name="Materialcode[]" required> </select>

                                                        </div>
                                                        <span class="error-text text-danger">Mandatory Fields.</span>
                                                        </td>

                                                        

                                                        <td>
                                                        <input type="text" class="form-control MaterialDescription validationTooltip02" id="validationTooltip02" name="MaterialDescription[]" required>
                                                        <span class="error-text text-danger">Mandatory Fields.</span>
                                                        
                                                       
                                                        </td>

                                                        <td>

                                                            <div>
                                                        <input type="text" class="form-control UOM validationTooltip02" id="validationTooltip02" name="UOM[]" required>
                                                        <span class="error-text text-danger">Mandatory Fields.</span>
                                                       

                                                    </div>
                                                        </td>

                                                          <td>
                                                        <input type="number" class="form-control Quantity validationTooltip02" id="validationTooltip02" name="Quantity[]" required>
                                                        <span class="error-text text-danger">Mandatory Fields.</span>
                                                        
                                                       
                                                        </td>

                                                         <td>
                                                        <input type="date" class="form-control ExpectedDate validationTooltip02" id="validationTooltip02" name="ExpectedDate[]" required>
                                                        <span class="error-text text-danger">Mandatory Fields.</span>
                                                        
                                                       
                                                        </td>

                                                        <td>
                                                        <input type="text" class="form-control Specification validationTooltip02" id="validationTooltip02" name="Specification[]" required>
                                                        <span class="error-text text-danger">Mandatory Fields.</span>                                                        
                                                       
                                                        </td>


                                                         <td>
                                                        <button type="button"  class="btn btn-sm btn-success glyphicon glyphicon-plus add_newrow add_row" onclick ='add_row()'> +</button>
                                                        <button data-id="bid" class="btn delete btn-sm btn-danger glyphicon glyphicon-remove remove_row_Vendor"  onclick ='remove_row($(this))' ><i class="bi bi-x-circle-fill" style="position: relative;bottom: 2px;"></i></button>
                                                        </td>
                                                      
                                                    </tr>
                                                 </tbody>
                                                 
                                              </table>
                                           
                                           
                                           </div>

                                            <br>




                                          



                                                <div class="row">

                                                <div class="col-sm-2">
                                                <div class="mb-2">
                                                <div class="position-relative mb-3">
                                                <label class="form-label">Bidding Date</label>
                                                <div class="input-group">


                                                <input type="text" id="basic-datepicker" class="form-control validationTooltip02" placeholder="Basic datepicker" name="bidding_date">
                                                <span class="error-text text-danger">Mandatory Fields.</span>                                                                  

                                                </div>

                                                </div>
                                                </div>

                                                </div> <!-- end col -->     

                                                     <div class="col-sm-2">
                                                        <div class="mb-2">
                                                             <div class="position-relative mb-3">
                                                        <label class="form-label uom" for="validationTooltip01">Bidding Time</label>

                                                        <input id="basic-timepicker" type="text" class="form-control validationTooltip02" placeholder="Basic timepicker" value="" name="Bidtime">
                                                        <span class="error-text text-danger">Mandatory Fields.</span>                                                                  
                                                    </div>
                                                        </div>

                                                    </div> <!-- end col -->


                                                     <div class="col-sm-2">
                                                        <div class="mb-2">
                                                             <div class="position-relative mb-3">
                                                        <label class="form-label uom" for="validationTooltip01">Bidding Hours</label>

                                                        <input id="basic-timepicker" id="validationTooltip02" type="number" class="form-control validationTooltip02" placeholder="Total Hours" name="Bidhours">
                                                        <span class="error-text text-danger">Mandatory Fields.</span>                                                                  
                                                    </div>
                                                        </div>

                                                    </div> <!-- end col -->


                                                    <div class="col-sm-2">
                                                        <div class="mb-2">
                                                             <div class="position-relative mb-3">
                                                       <label class="form-label">Price Validity</label>
                                                            <div class="input-group">
                                                              

                                                            <input type="date" id="basic-datepicker" class="form-control validationTooltip02" name="Pricevalidity" placeholder="Basic datepicker" required>
                                                            <span class="error-text text-danger">Mandatory Fields.</span>                                                                  
                                                                
                                                            </div>
                                                        
                                                    </div>
                                                        </div>

                                                    </div> <!-- end col -->

                                                      <div class="col-sm-2">
                                                        <div class="mb-2">
                                                             <div class="position-relative mb-3">
                                                        <label class="form-label uom" for="validationTooltip01">Delivery Type</label>

                                                           <select class="js-example-basic-single   Deliverytype validationTooltip02"  name="Deliverytype" required> 

                                                            <option value="">Select</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Multiple">Multiple</option>


                                                           </select>
                                                        <span class="error-text text-danger">Mandatory Fields.</span>                                                        
                                                        
                                                    </div>
                                                        </div>

                                                    </div> <!-- end col -->



                                                    <div class="col-sm-2">
                                                        <div class="mb-2">
                                                             <div class="position-relative mb-3">
                                                        <label class="form-label uom" for="validationTooltip01">Select Location</label>

                                                           <select class="js-example-basic-single   PlantLocation validationTooltip02"  name="Location" required> 

                                                            <option value="">Select</option>


                                                                <?php
                                                                $Plantsql   = "SELECT DISTINCT Plant,Plant_Master_PO.Plant_Name  from Tb_Master_Emp
                                                                left join Plant_Master_PO on Plant_Master_PO.Plant_Code = Tb_Master_Emp.Plant

                                                                Where Plant_Code is Not Null and Plant_Code!=''";
                                                                $Plant = sqlsrv_query($conn,$Plantsql);
                                                                while($row = sqlsrv_fetch_array($Plant)){
                                                                ?>
                                                                <option value="<?=trim($row['Plant'])?>"> <?php echo trim($row['Plant'].'-'.$row['Plant_Name']); ?> </option>
                                                                <?php } ?>

                                                           
                                                           </select>
                                                        <span class="error-text text-danger">Mandatory Fields.</span>                                                        
                                                        
                                                    </div>
                                                        </div>

                                                    </div> <!-- end col -->



                                                </div>


                                                <div class="vendor_generation_div text-end">
                                                    <button type="button" class="btn btn-info generate_vendor"><i class="fa-solid fa-person-circle-plus"></i> Generate Vendor</button>

                                                </div>

                                                 <div class="table-responsive group-table vendor_tbl" id="customers">

                                                      <table  id="currenttable" class="text-nowrap">
                                                         <thead>
                                                            <tr>

                                                                <th>Sno</th>
                                                             
                                                              <th>VendorCode</th>
                                                              <th>Vendor Name</th>
                                                            
                                                              <th>Email</th>
                                                              <th>Mobile No</th>
                                                              <th>Available Materials</th>
                                                            
                                                              <th>Action</th>
                                                            </tr>
                                                         
                                                         </thead>
                                                         <tbody class="VendorArray">
                                                            <tr>

                                                                <td class="srn_no">1</td>
                                                              
                                                                <td>
                                                                <div>         
                                                                  <select class="js-example-basic-single   VendorCode validationTooltip02"  name="VendorCode[]" required> 

                                                                </select>

                                                                </div>
                                                                <span class="error-text text-danger">Mandatory Fields.</span>
                                                                </td>

                                                                

                                                                <td>
                                                                <input type="text" class="form-control VendorName validationTooltip02" id="validationTooltip02" name="VendorName[]" required>
                                                                <span class="error-text text-danger">Mandatory Fields.</span>                                                                            
                                                               
                                                                </td>

                                                                <td>

                                                                    <div>
                                                                <input type="text" class="form-control VendorEmail validationTooltip02" id="validationTooltip02" name="VendorEmail[]" required>
                                                                <span class="error-text text-danger">Mandatory Fields.</span>                                                                            
                                                               

                                                            </div>
                                                                </td>

                                                                  <td>
                                                                <input type="text" class="form-control VendorMobile validationTooltip02" id="validationTooltip02" name="VendorMobile[]" required>
                                                                <span class="error-text text-danger">Mandatory Fields.</span>                                                                            
                                                               
                                                                </td>

                                                              

                                                                 <td>
                                                                <button type="button"  class="btn btn-sm btn-success glyphicon glyphicon-plus add_newrow add_newrow_value" onclick ='add_row_vendor()'> +</button>
                                                                <button data-id="bid" class="btn delete btn-sm btn-danger glyphicon glyphicon-remove remove_row"  onclick ='remove_row_vendor($(this))' ><i class="bi bi-x-circle-fill" style="position: relative;bottom: 2px;"></i></button>
                                                                </td>
                                                              
                                                            </tr>
                                                         </tbody>
                                                         
                                                      </table>                                                               
                                                </div>
                                                <br>







                                        <div class="form_submission_div" style="text-align:center;">
                                            <button type="button" class="btn btn-primary SubmitForm_btn" >Submit form</button>
                                            <a href="Requestbid.php"><button type="button" class="btn btn-danger" >Cancel</button></a>

                                        </div>

                                    </form>
                                        <!-- end row --> 
                                    </div> <!-- end card-b -->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div> <!-- end row-->


                    </div> <!-- container -->

                </div> <!-- content -->

                 <?php include('partials/footer.php') ?>

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->


         <?php include('partials/bottom_script.php') ?>


         <script>


  $(document).ready(function(){
     $('.js-example-basic-single').select2(); 


     });



    $(document).ready(function() {
        
       $('.multi_select').multiselect({
        includeSelectAllOption:true,
        dropdownPosition: 'below',
        maxHeight:200,
        buttonWidth: '100%',
        enableFiltering: true,
        enableCaseInsensitiveFiltering:true,
        buttonClass: 'form-select', 
        templates: {
            button: '<button type="button" class="multiselect dropdown-toggle" data-bs-toggle="dropdown"><span class="multiselect-selected-text"></span></button>',
        }
        });
        
    });


             $(document).on("change",".materialgroup",function(){

                //alert("Hi");
 
 var materialgroup=$(this).val();

   
  

  var material_dets=Get_Materialcode_Deatails(materialgroup,0);
    $(".Materialcode").html(material_dets);


  });


function Get_Materialcode_Deatails(materialgroup,status){

  
  var output="";

     $.ajax 
      ({
      type: "POST",
      url: "Auto_Fill_Details.php",
       // data:{'materialgroup':materialgroup,'Action':'Get_Material_Details'},
          data:{"Action":"Get_Material_Details","materialgroup":materialgroup},
       async:false,
      success: function(data){


         result=JSON.parse(data);
         output=result.data;

        
        
        }
      });
    
      if(status == 0){

        //alert("hai");
         $('.Materialcode').html(output); 

        
        }else{
      return output;
        }



}





   $(document).ready(function(){
    var Vendor_dets=Get_Vendor_Deatails(0);
    $(".VendorCode").html(Vendor_dets);


     });




function Get_Vendor_Deatails(status){

  
  var output="";

     $.ajax 
      ({
      type: "POST",
      url: "Auto_Fill_Details.php",
       
          data:{"Action":"Get_Vendor_Deatails"},
       async:false,
      success: function(data){


         result=JSON.parse(data);
         output=result.data;

      
        
        }
      });
    
      if(status == 0){

        //alert("hai");
         $('.VendorCode').html(output); 

        
        }else{
      return output;
        }



}




 $(document).on("change",".VendorCode",function(){

 var VendorCode=$(this).val();
 var materialgroup=$('.materialgroup').val();

   
  Get_Vendorform_Deatails(VendorCode,$(this));
  return false;

  });


function Get_Vendorform_Deatails(VendorCode,current_obj){

    
          $.ajax({
            type:'POST',
            dataType: 'json',
            url:'Auto_Fill_Details.php',
            data:{'VendorCode':VendorCode,'Action':'Get_Vendorform_Deatails'},
            async: true,
            success:function(data){

                

              current_obj.closest('tr').find('.VendorName').val(data.VendorName);
              current_obj.closest('tr').find('.VendorEmail').val(data.Mail_ID);
              current_obj.closest('tr').find('.VendorMobile').val(data.Contact_No);

            }
          }); 
      }

     /*         function Get_Materialcode_Deatails(materialgroup){
          $.ajax({
            type:'POST',
            url:'Auto_Fill_Details.php',
            data:{'materialgroup':materialgroup,'Action':'Get_Material_Details'},
            success:function(html){
              $('.Materialcode').html(html); 
              //$('.Materialcode_Sub').html(html); 
             // $('.Materialcode').select2('rebuild');
            }
          }); 
      }*/



    $(document).on("change",".Materialcode",function(){
     
        var Materialcode=$(this).val();
        var materialgroup=$('.materialgroup').val();

        $('.vendor_generation_div').hide();
        $('.form_submission_div').hide();
        $('.Materialcode').each(function(){
            if($(this).val() != '') {
                $('.vendor_generation_div').show();
                $('.form_submission_div').show();

                return false;
            }
        });

       
        // auto update vendors details
        generate_vendors();

        Get_Materialdescription_Deatails(Materialcode,materialgroup,$(this));
        return false;

    });

function Get_Materialdescription_Deatails(Materialcode,materialgroup,current_obj){

    
          $.ajax({
            type:'POST',
            dataType: 'json',
            url:'Auto_Fill_Details.php',
            data:{'materialgroup':materialgroup,'Materialcode':Materialcode,'Action':'Get_MaterialDescription_Details'},
            async: true,
            success:function(data){

                

              current_obj.closest('tr').find('.MaterialDescription').val(data.ItemDescription);
              current_obj.closest('tr').find('.UOM').val(data.UOM);

            }
          }); 
      }

 function add_row(){

 var Materialcode=$('.Materialcode').val();
 var materialgroup=$('.materialgroup').val();
   
  ///var material_details=Get_Materialdescription_Deatails(Materialcode,materialgroup,$(this));

  var material_details=Get_Materialcode_Deatails(materialgroup,1);




      var markup = "<tr><td><div><select class='js-example-basic-singles   Materialcode validationTooltip02'  name='Materialcode[]' required> "+ material_details+"</select><span class='error-text text-danger'>Mandatory Fields.</span></div> </td> <td> <input type='text' class='form-control MaterialDescription validationTooltip02' id='validationTooltip02' name='MaterialDescription[]' required><span class='error-text text-danger'>Mandatory Fields.</span>  </td> <td> <input type='text' class='form-control UOM validationTooltip02' id='validationTooltip02' name='UOM[]' required><span class='error-text text-danger'>Mandatory Fields.</span>  </td> <td> <input type='number' class='form-control Quantity validationTooltip02' id='validationTooltip02' name='Quantity[]' required><span class='error-text text-danger'>Mandatory Fields.</span>  </td> <td> <input type='date' class='form-control ExpectedDate validationTooltip02' id='validationTooltip02' name='ExpectedDate[]' required><span class='error-text text-danger'>Mandatory Fields.</span>  </td> <td> <input type='text' class='form-control Specification validationTooltip02' id='validationTooltip02' name='Specification[]' required> <span class='error-text text-danger'>Mandatory Fields.</span> </td> <td> <button type='button'  class='btn btn-sm btn-success glyphicon glyphicon-plus add_newrow add_newrow_value' onclick=add_row() >+</button> <button data-id='bid' class='btn delete btn-sm btn-danger glyphicon glyphicon-remove remove_row'  onclick ='remove_row($(this))' ><i class='bi bi-x-circle-fill' style='position: relative;bottom: 2px;'></i></button></td></tr>";
      $("table .MaterialArray").append(markup);
    
      
     /// s_no();
    
      $('.js-example-basic-singles').select2();

    }

     function remove_row(row)
  {
    if($(".remove_row").length >1)
    {
      row.closest('tr').remove();

   

      s_no();


        // auto update vendors details
        generate_vendors();

    }else{






      alert("Atleast One Row Present");
    }
   
  }


   function s_no(){
    var sno = 1;
    $(".srn_no").each(function(key,index){
       $(this).html((sno));   
    sno++;
    });
  }


  function add_row_vendor(){
 var Vendor_dets=Get_Vendor_Deatails(1);

      var markup = "<tr><td class='srn_no'></td><td><div><select class='js-example-basic-singles   VendorCode validationTooltip02'  name='VendorCode[]' required> "+ Vendor_dets+"</select><span class='error-text text-danger'>Mandatory Fields.</span></div> </td> <td> <input type='text' class='form-control VendorName validationTooltip02' id='validationTooltip02' name='VendorName[]' required><span class='error-text text-danger'>Mandatory Fields.</span>  </td> <td> <input type='text' class='form-control VendorEmail validationTooltip02' id='validationTooltip02' name='VendorEmail[]' required><span class='error-text text-danger'>Mandatory Fields.</span>  </td> <td> <input type='text' class='form-control VendorMobile validationTooltip02' id='validationTooltip02' name='VendorMobile[]' required><span class='error-text text-danger'>Mandatory Fields.</span>  </td> <td> <button type='button'  class='btn btn-sm btn-success glyphicon glyphicon-plus add_newrow add_newrow_value' onclick=add_row_vendor() >+</button> <button  class='btn delete btn-sm btn-danger glyphicon glyphicon-remove remove_row_Vendor'  onclick ='remove_row_Vendor($(this))' ><i class='bi bi-x-circle-fill' style='position: relative;bottom: 2px;'></i></button></td></tr>";
      $("table .VendorArray").append(markup);
    
      
      s_no();
    
      $('.js-example-basic-singles').select2();
    }


    function remove_row_Vendor(row)
  {
    if($(".remove_row_Vendor").length >1)
    {
      row.closest('tr').remove();

   

      s_no();
    }else{






      alert("Atleast One Row Present");
    }
   
  }

  function Alert_Msg(message,icon,title) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
        confirmButtonText: "OK"
    });
  }


  $(document).on("click",".SubmitForm_btn",function(e){
     e.preventDefault();
   
     var error_count=validation();

     ///alert(error_count);
     var material_error_count = 0;

     var arr = [];
     $('.Materialcode').each(function(){
        if(!arr.includes($(this).val())) {
            arr.push($(this).val());
        } else{
            material_error_count++;    
            return false; 
        }
     });

     var VendorCode_count = $('.VendorCode').length;


     // alert();

    if(error_count>0){
        Alert_Msg("Mandatory Fields are Required.","error","Error");
    } else if(material_error_count > 0) {
        Alert_Msg('Please Choose Different Material','warning','Warning');
    } else if(VendorCode_count == 0) {
        Alert_Msg('Please Generate Vendors','warning','Warning');
    } else{

        let Uset_Input=$(".BiddingDetailsPost").serializeArray();
    
        Uset_Input.push({"name":"Action","value":"Bidding_Stored"},{"name":"Statement_Type","value":"Approve"});
    
          $.ajax ({
          type: "POST",
          url: "Common_Ajax.php",
           data:Uset_Input,
           dataType:'json',
           async:false,
          success: function(result){             
             if(result.status == 200){
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: result.message,
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });                
               
             }else{
                   Alert_Msg("Something Went Wrong.","error","Error");
             }
            },error : function(XMLHttpRequest, textStatus, errorThrown) {
         
                Alert_Msg("Network or Session Closed.","error","Error");
            },
          });

    }

    ///return false;  

  });



    function validation(){
        var error_count=0;
        $('.error-text').each(function() {
            $(this).css('display','none');
        });

        $(".validationTooltip02").each(function(){ 

            var current_val=$(this).val();

            if(current_val == ''){
                // $(this).attr('style','border : 1px solid red !important');
                // $(this).closest('div').find('.error-text').css('display','inline-block');
                // $(this).closest('td').find('.error-text').css('display','inline-block');

                $(this).next('.error-text').css('display','inline-block');
                error_count++;

            } 
          
        });
        return error_count;
    }

    function generate_vendors()
    {
        var material_group = $('.materialgroup').val();
        var material_code  = [];

        $('.Materialcode').each(function(){
            var mat_code = $(this).val();
            if(mat_code != '') {
                material_code.push(mat_code.slice(11));
            }
        });

        $("table .VendorArray").empty();

        get_material_suppliers(material_group,material_code);
    }



    $(document).on("click",".generate_vendor",function(e){
        generate_vendors();
    });

    function get_material_suppliers(material_group,material_code)
    {
        $.ajax ({
          type: "POST",
          url: "Common_Ajax.php",
          data: { Action : 'Get_Material_supply_vendors',material_group : material_group,material_code : material_code },
          dataType:'json',
          async:false,
          success: function(result){             
             if(result.status == 200){               
                if(result.data.length > 0) {
                    var markup = '';
                    for(i in result.data) {
                        markup +=  `<tr>
                            <td class='srn_no'>${ parseInt(i) + parseInt(1) }</td>
                            <td>
                                <div>
                                    <input type='text' class='form-control VendorCode validationTooltip02' id='validationTooltip02' name='VendorCode[]' value="${ result.data[i].SupplierCode }" required readonly>

                                    <span class='error-text text-danger'>Mandatory Fields.</span>
                                </div> 
                            </td> 
                            <td> 
                                <input type='text' class='form-control VendorName validationTooltip02' id='validationTooltip02' name='VendorName[]' required value="${ result.data[i].SupplierDiscription }" readonly>
                                <span class='error-text text-danger'>Mandatory Fields.</span> 
                            </td> 
                            <td> 
                                <input type='text' class='form-control VendorEmail validationTooltip02' id='validationTooltip02' name='VendorEmail[]' required value="${ result.data[i].Mail_ID }">
                                <span class='error-text text-danger'>Mandatory Fields.</span>  
                            </td> 
                            <td> 
                                <input type='text' class='form-control VendorMobile validationTooltip02' id='validationTooltip02' name='VendorMobile[]' required value="${ result.data[i].Contact_No }">
                                <span class='error-text text-danger'>Mandatory Fields.</span>  
                            </td> 
                            <td style="white-space: normal;"> 
                                <input type="hidden" name="available_material_codes[]" value="${ result.data[i].available_material_codes}">
                                ${ result.data[i].available_materials }  
                            </td>                         
                            <td>
                                <button  class='btn delete btn-sm btn-danger glyphicon glyphicon-remove remove_row_Vendor'  onclick ='remove_row_Vendor($(this))' ><i class='bi bi-x-circle-fill' style='position: relative;bottom: 2px;'></i></button>
                            </td>
                            </tr>`;

                    }
                    $("table .VendorArray").html(markup);
                    $('.vendor_tbl').show();
                }
             }else{
                   Alert_Msg("Something Went Wrong.","error","Error");
             }
            },error : function(XMLHttpRequest, textStatus, errorThrown) {
         
                Alert_Msg("Network or Session Closed.","error","Error");
            },
        });  
    }



</script>
