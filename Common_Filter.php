<?php 

///include 'Send_Mail.php';
///error_reporting(-1);

Class Common_Filter{
    public $conn;
    function __construct($conn) {
        $this->conn = $conn;
    }

    private function get_Sql_Result($Sql_Dets){
      $result=array();
      while($value=sqlsrv_fetch_array($Sql_Dets)){
        $result[]=$value;
      }
      return $result;
    }

    public function vendor_creation($Vendorcode,$VendorEmail)
    {
        $Sql =  "SELECT Count(*) As Count FROM EMPLTABLE Where EMPLID='".$Vendorcode."'";

        $Sql_Connection = sqlsrv_query($this->conn,$Sql);
        $Sql_Result     = sqlsrv_fetch_array($Sql_Connection);
        $Name_Employee  = $Sql_Result['Count'];
        $PARTYID        = "2222233336666";
        $Employee_Name  = "Vendor";
        $DATAAREAID     = "ras";
        $CreatedAt      = date('Y-m-d H:i:s');

        if($Name_Employee == 0){
            $Sql = "INSERT INTO EMPLTABLE(EMPLID,PARTYID,DATAAREAID,RECID,RECVERSION,MODIFIEDDATETIME,PASSWORD,USERSTATUS,APDESIGN,EMAIL) VALUES ('".$Vendorcode."','".$PARTYID."','".$DATAAREAID."','".$PARTYID."','1','".$CreatedAt."','".$Vendorcode."','ACTIVE','USER','".$VendorEmail."')";
            $Sql_Connection = sqlsrv_query($this->conn,$Sql);


           $Sql = "INSERT INTO DIRPARTYTABLE(NAME,PARTYID,MODIFIEDDATETIME,CREATEDDATETIME,DATAAREAID,RECVERSION,RECID) VALUES ('".$Employee_Name."','".$PARTYID."','".$CreatedAt."','".$CreatedAt."','".$DATAAREAID."','1','".$PARTYID."')";
            $Sql_Connection = sqlsrv_query($this->conn,$Sql);


            $Sql = "INSERT INTO UserAccess_UserRole(EMPID,RoleId) VALUES ('".$Vendorcode."','172')";
            $Sql_Connection = sqlsrv_query($this->conn,$Sql);

        }
    }

    public function Bidding_Stored($data)
    {
     // echo "<pre>";print_r($data);
     // exit; 

      $response['status'] = 200;
      $response['message'] = "Bidding Created Successfully.";    

     $bidnum = $data['bidnum'];
     $Materialgroup = $data['Materialgroup'];
     $Biddate = $data['bidding_date'];
     $Bidtime = $data['Bidtime'];
     $Bidhours = $data['Bidhours'];
     $Pricevalidity = $data['Pricevalidity'];
     $Deliverytype = $data['Deliverytype'];
     $Location = $data['Location'];
     $Status = 1;

     $Transdate = date('Y-m-d',strtotime($data['Transdate']));

     $Created_By = $_SESSION['EmpID'];
     $Created_At = date('Y-m-d h:i:s');
      
     // main detail table insert 
      $bidding_main_sql = "INSERT INTO Purchase_Bidding_Main(bidnum,Materialgroup,Biddate,Bidtime,Bidhours,Pricevalidity,Deliverytype,Location,Status,Created_By,Created_At,Transdate) VALUES ('".$bidnum."','".$Materialgroup."','".$Biddate."','".$Bidtime."','".$Bidhours."','".$Pricevalidity."','".$Deliverytype."','".$Location."','".$Status."','".$Created_By."','".$Created_At."','".$Transdate."')";

        // echo $bidding_main_sql;exit;
      
      $bidding_main_sql_exec = sqlsrv_query($this->conn,$bidding_main_sql);
      
      if($bidding_main_sql_exec == false) {
        print_r(sqlsrv_errors());
        $response['status'] = 500;
        $response['message'] = "Bidding Main Query Error.";
      }

      foreach($data['Materialcode'] as $key => $Materialcode) {  
        $MaterialDescription = $data['MaterialDescription'][$key];    
        $UOM                 = $data['UOM'][$key];    
        $Quantity            = $data['Quantity'][$key];    
        $ExpectedDate        = $data['ExpectedDate'][$key];
        $Specification       = $data['Specification'][$key];

        // leading zero remove material code
        $Material_code_alt   = substr($Materialcode, 11);

        // material detail table insert 
        $bidding_material_sql = "INSERT INTO Purchase_Bidding_Material(bidnum,Materialcode,MaterialDescription,UOM,Quantity,ExpectedDate,Specification,Status,Created_By,Created_At,Material_code_alt) VALUES ('".$bidnum."','".$Materialcode."','".$MaterialDescription."','".$UOM."','".$Quantity."','".$ExpectedDate."','".$Specification."','".$Status."','".$Created_By."','".$Created_At."','".$Material_code_alt."')";
        
        $bidding_material_sql_exec = sqlsrv_query($this->conn,$bidding_material_sql);  

        if($bidding_material_sql_exec == false) {
          print_r(sqlsrv_errors());
          $response['status'] = 500;
          $response['message'] = "Bidding Material Query Error.";
        }      

      }

      foreach($data['VendorCode'] as $vkey => $VendorCode) {  

        $VendorName   = $data['VendorName'][$vkey];    
        $VendorEmail  = $data['VendorEmail'][$vkey];    
        $VendorMobile = $data['VendorMobile'][$vkey];    
        $available_material_codes = $data['available_material_codes'][$vkey];    


        // if the vendor is not exist in empl table create 
        $this->vendor_creation($VendorCode,$VendorEmail); 

        // Vendor detail table insert 
        $bidding_vendor_sql = "INSERT INTO Purchase_Bidding_Vendor(bidnum,VendorCode,VendorName,VendorEmail,VendorMobile,Status,Created_By,Created_At,Available_Material_Codes) VALUES ('".$bidnum."','".$VendorCode."','".$VendorName."','".$VendorEmail."','".$VendorMobile."','".$Status."','".$Created_By."','".$Created_At."','".$available_material_codes."')";
        
        $bidding_vendor_sql_exec = sqlsrv_query($this->conn,$bidding_vendor_sql);  

        if($bidding_vendor_sql_exec == false) {
          print_r(sqlsrv_errors());
          $response['status'] = 500;
          $response['message'] = "Bidding Vendor Query Error.";
        }         

      }    

      return $response;
    }


    public function Get_bid_position_employees($bid_num,$material_name)
    {

        $bid_position_sql = "SELECT TOP 5 * FROM (SELECT *,ROW_NUMBER() OVER (PARTITION BY Quoted_Employee ORDER BY Posted_Quote_Value ASC) AS RowNum FROM Purchase_Bidding_Post WHERE Bid_Num = '".$bid_num."' AND Bid_Material = '".$material_name."') as tbl WHERE RowNum = 1 ORDER BY Posted_Quote_Value,Created_At ASC";

        $bid_position_sql_exec = sqlsrv_query($this->conn,$bid_position_sql);

        $result = array();
        while($row = sqlsrv_fetch_array($bid_position_sql_exec,SQLSRV_FETCH_ASSOC)) {
          $result[] = $row['Quoted_Employee']; 
        }


        $biding_position = '';
        if(COUNT($result) > 0) {

          $Employee_Position_Index = array_search($_SESSION['EmpID'],$result);


          if($Employee_Position_Index !== false) {
              $biding_position = "🎖️ You Are in Level ".($Employee_Position_Index + 1)." Position.";
          }

        } 

        return $biding_position;
    } 

    public function User_Bid_Exist_Check($bidnum,$material_code,$vendor_code)
    {
      $sql = "SELECT * FROM Purchase_Bidding_Material where Material_code_alt IN(SELECT value AS MaterialCode FROM Purchase_Bidding_Vendor
        CROSS APPLY STRING_SPLIT(Available_Material_Codes, ',') WHERE Materialcode = '".$material_code."' AND bidnum = '".$bidnum."' AND VendorCode = '".$vendor_code."')";

      // echo $sql;exit;   

      $sql_exec = sqlsrv_query($this->conn,$sql, array(), array("Scrollable" => 'static'));

      $bid_count = sqlsrv_num_rows($sql_exec);

      return $bid_count;

    }

    


    public function Get_Live_Bidding_Details($request)
    {

      // echo "<pre>";print_r($request);exit;
        $today_date = date('Y-m-d');
        $today_datetime = date('Y-m-d H:i:s');

        $bidding_main_sql = "SELECT Purchase_Bidding_Material.Id as Mat_Id,Purchase_Bidding_Main.bidnum,Purchase_Bidding_Main.Biddate,Purchase_Bidding_Main.Bidtime,Purchase_Bidding_Main.Bidhours,
        Purchase_Bidding_Main.Location,Purchase_Bidding_Material.Materialcode,Purchase_Bidding_Material.MaterialDescription,Purchase_Bidding_Main.Materialgroup,Purchase_Bidding_Material.UOM,Purchase_Bidding_Material.Quantity,
        FORMAT(CONVERT(DATETIME,DATEADD(hour, CONVERT(INT,Bidhours), DATEADD(minute, 00, DATEADD(second, 00, CONCAT(Biddate,' ',Bidtime))))), 'yyyy-MM-dd HH:mm:ss') as Bidclosing_datetime,FORMAT(CONVERT(DATETIME,CONCAT(Biddate,' ',Bidtime)), 'yyyy-MM-dd HH:mm:ss') as Bid_Start_Datetime,Plant_master_PO.Plant_Name
        from Purchase_Bidding_Main
        INNER JOIN Purchase_Bidding_Material ON Purchase_Bidding_Main.bidnum = Purchase_Bidding_Material.bidnum 
        INNER JOIN Purchase_Bidding_Vendor ON Purchase_Bidding_Main.bidnum = Purchase_Bidding_Vendor.bidnum AND Purchase_Bidding_Vendor.VendorCode = '".$_SESSION['EmpID']."' 
        LEFT JOIN Plant_master_PO ON Plant_master_PO.Plant_Code = Purchase_Bidding_Main.Location 
        WHERE Purchase_Bidding_Main.Status = '1' AND Purchase_Bidding_Main.Biddate = '".$today_date."'
        GROUP BY Purchase_Bidding_Main.bidnum,Purchase_Bidding_Main.Biddate,Purchase_Bidding_Main.Bidtime,Purchase_Bidding_Main.Bidhours,
        Purchase_Bidding_Main.Location,Purchase_Bidding_Material.Materialcode,Purchase_Bidding_Material.MaterialDescription,Purchase_Bidding_Main.Materialgroup,Purchase_Bidding_Material.UOM,Purchase_Bidding_Material.Quantity,Plant_master_PO.Plant_Name,Purchase_Bidding_Material.Id";
        // echo $bidding_main_sql;exit;

        $bidding_main_sql_exec = sqlsrv_query($this->conn,$bidding_main_sql);

        $result = array();
        while($row = sqlsrv_fetch_array($bidding_main_sql_exec,SQLSRV_FETCH_ASSOC)) {
          $response = array();
          // echo "<pre>";print_r($row);exit;

          $user_bid_check_count = $this->User_Bid_Exist_Check($row['bidnum'],$row['Materialcode'],$_SESSION['EmpID']);

          // echo $user_bid_check_count;exit;

          // bid closing time availablity check with current time 
          if(strtotime($row['Bidclosing_datetime']) > strtotime(date('Y-m-d H:i:s')) && strtotime($row['Bid_Start_Datetime']) < strtotime(date('Y-m-d H:i:s')) && $user_bid_check_count > 0) {


            $bid_post_sql = "SELECT STRING_AGG(Posted_Quote_Value,'-') WITHIN GROUP (ORDER BY Posted_Quote_Value DESC) as Bid_Posted_Value from
            Purchase_Bidding_Post where Created_By = '".$_SESSION['EmpID']."' AND Bid_Num = '".$row['bidnum']."' 
            AND Bid_Material = '".$row['MaterialDescription']."'";          

            $emp_bid_post_sql_exec   = sqlsrv_query($this->conn,$bid_post_sql);
            $emp_bid_post_sql_result = sqlsrv_fetch_array($emp_bid_post_sql_exec,SQLSRV_FETCH_ASSOC);

            $response['Mat_Id'] = $row['Mat_Id'];
            $response['bidnum'] = $row['bidnum'];
            $response['Biddate'] = $row['Biddate'];
            $response['Bidtime'] = $row['Bidtime'];
            $response['Bidhours'] = $row['Bidhours'];
            $response['Location'] = $row['Location'];
            $response['Materialcode'] = $row['Materialcode'];
            $response['MaterialDescription'] = trim($row['MaterialDescription']);
            $response['Materialgroup'] = $row['Materialgroup'];
            $response['UOM'] = $row['UOM'];
            $response['Quantity'] = $row['Quantity'];
            $response['Plant_Name'] = $row['Plant_Name'];
            $response['Bid_Posted_Value'] = ($emp_bid_post_sql_result['Bid_Posted_Value'] != null) ? $emp_bid_post_sql_result['Bid_Posted_Value'] : ''; 

            //get bid post position
            $response['position'] = $this->Get_bid_position_employees($row['bidnum'],$row['MaterialDescription']);
          

            $start = new \DateTime($today_datetime);
            $end   = new \DateTime($row['Bidclosing_datetime']);
            $interval = $end->diff($start);

            $time_left = sprintf('%02d',$interval->format('%h')).':'.sprintf('%02d',$interval->format('%i')).':'.sprintf('%02d',$interval->format('%s'));


            $response['time_left'] = $time_left;

            $result[] = $response; 

          }

        }

        return $result;

    }

    public function Get_Employee_Recent_Bid_Value($Created_By,$Bid_Num,$Bid_Material_Code)
    {
      $recent_post_sql = "SELECT TOP 1 * from Purchase_Bidding_Post WHERE Bid_Num = '".$Bid_Num."' AND Bid_Material_Code = '".$Bid_Material_Code."' and Created_By = '".$Created_By."' order by Id desc";
      $recent_post_sql_exec    = sqlsrv_query($this->conn,$recent_post_sql);
      $recent_post_sql_result = sqlsrv_fetch_array($recent_post_sql_exec,SQLSRV_FETCH_ASSOC);
      return $recent_post_sql_result['Posted_Quote_Value'];
    }

    public function post_bid($data)
    {
       $request = array();
       parse_str($data['form'],$request); 
       // echo "<pre>";print_r($request);exit;

      $request = array_map(function($value) { 
             if(is_array($value)){
                     $mArr = array_map(function($value1) { 
                         return str_replace("'","''", $value1); 
                     },$value);
                     return $mArr;
             }else{
                 return str_replace("'","''", $value); 
             }
        }, $request);

       $response['status'] = 422;
       $response['message'] = "Unprocessable Entry.";    

       $Bid_Num = $request['bid_num'];
       $Bid_Material = trim($request['bid_material_name']);
       $Bid_Material_Code = trim($request['bid_material_code']);
       $Bid_Time = date('H:i:s');
       $Quoted_Employee = $_SESSION['EmpID'];
       $Posted_Quote_Value = $request['Bid_Amount'];
       $Current_Status = 1;

       $Created_By = $_SESSION['EmpID'];
       $Created_At = date('Y-m-d H:i:s');

       $last_bid_value = $this->Get_Employee_Recent_Bid_Value($Created_By,$Bid_Num,$Bid_Material_Code);

       // echo $last_bid_value;exit;

       if($last_bid_value == '' || $last_bid_value > $Posted_Quote_Value) {
         // post table insert 
          $bidding_post_sql = "INSERT INTO Purchase_Bidding_Post(Bid_Num,Bid_Material_Code,Bid_Material,Bid_Time,Quoted_Employee,Posted_Quote_Value,Current_Status,Created_By,Created_At,Created_At_Micro_Seconds) VALUES ('".$Bid_Num."','".$Bid_Material_Code."','".$Bid_Material."','".$Bid_Time."','".$Quoted_Employee."','".$Posted_Quote_Value."','".$Current_Status."','".$Created_By."','".$Created_At."',SYSDATETIME())";

          
          $bidding_post_sql_exec = sqlsrv_query($this->conn,$bidding_post_sql);
          
          if($bidding_post_sql_exec == false) {
            print_r(sqlsrv_errors());
            $response['status'] = 500;
            $response['message'] = "Bidding post Query Error.";
          } else {
            //update bid status 
            $bid_confirm = "UPDATE Purchase_Bidding_Material SET Bid_status = 'Quoted' WHERE bidnum= '".$request['bid_num']."' AND MaterialDescription= '".$request['bid_material_name']."'";
            $bid_confirm_exec = sqlsrv_query($this->conn,$bid_confirm);

            $response['status'] = 200;
            $response['message'] = "Bidding Posted Successfully.";  
          }
       } else {
            $response['status']  = 422;
            $response['message'] = "Please Enter Bid Value Below ".$last_bid_value;  
       } 

        return $response; 

    }

    public function Get_Upcomming_Bidding_Details($request)
    {

      // echo "<pre>";print_r($request);exit;

        $upcomming_sql = "SELECT * FROM (SELECT *,FORMAT(CONVERT(DATETIME,CONCAT(Biddate,' ',Bidtime)), 'yyyy-MM-dd HH:mm:ss') as Bid_Start_Datetime FROM Purchase_Bidding_Main) as tbl 
          INNER JOIN Purchase_Bidding_Material ON tbl.bidnum = Purchase_Bidding_Material.bidnum
        WHERE tbl.Bid_Start_Datetime > CURRENT_TIMESTAMP";

        $upcomming_sql_exec = sqlsrv_query($this->conn,$upcomming_sql);

        $result = array();
        while($row = sqlsrv_fetch_array($upcomming_sql_exec,SQLSRV_FETCH_ASSOC)) {
          $response = array();
          // echo "<pre>";print_r($row);exit;

            $response['bidnum'] = $row['bidnum'];
            $response['Biddate'] = $row['Biddate'];
            $response['Bidtime'] = $row['Bidtime'];
            $response['Bidhours'] = $row['Bidhours'];
            $response['Location'] = $row['Location'];
            $response['Materialcode'] = $row['Materialcode'];
            $response['MaterialDescription'] = $row['MaterialDescription'];
            $response['Materialgroup'] = $row['Materialgroup'];
            $response['UOM'] = $row['UOM'];
            $response['Quantity'] = $row['Quantity'];
            $response['Bid_Start_Datetime'] = date('d-m-Y h:i:s A',strtotime($row['Bid_Start_Datetime']));
        
            $result[] = $response; 

        }

        return $result;

    }


    public function Get_Bid_Confirmation_Data($request)
    {

        $bid_confirmation_sql = "SELECT * FROM (SELECT *,FORMAT(CONVERT(DATETIME,CONCAT(Biddate,' ',Bidtime)), 'yyyy-MM-dd HH:mm:ss') as Bid_Start_Datetime,FORMAT(CONVERT(DATETIME,DATEADD(hour, CONVERT(INT,Bidhours), DATEADD(minute, 00, DATEADD(second, 00, CONCAT(Biddate,' ',Bidtime))))), 'yyyy-MM-dd HH:mm:ss') as Bidclosing_datetime FROM Purchase_Bidding_Main) as tbl
        INNER JOIN Purchase_Bidding_Material ON tbl.bidnum = Purchase_Bidding_Material.bidnum
        WHERE 1=1";

        if($request['from'] == 'open') {
          $bid_confirmation_sql .= " AND tbl.Bid_Start_Datetime > CURRENT_TIMESTAMP";
        }

        if($request['from'] == 'pending') {
          $bid_confirmation_sql .= " AND tbl.Bidclosing_datetime < CURRENT_TIMESTAMP AND Purchase_Bidding_Material.Bid_status != 'Confirmed'";
        }

        if($request['from'] == 'confirmed') {
          $bid_confirmation_sql .= " AND Purchase_Bidding_Material.Bid_status = 'Confirmed'";
        }        


        // echo $bid_confirmation_sql;exit;

        $bid_confirmation_sql_exec = sqlsrv_query($this->conn,$bid_confirmation_sql);

        $result = array();
        while($row = sqlsrv_fetch_array($bid_confirmation_sql_exec,SQLSRV_FETCH_ASSOC)) {
            $response = array();

            $response['bidnum'] = $row['bidnum'];
            $response['Biddate'] = $row['Biddate'];
            $response['Bidtime'] = $row['Bidtime'];
            $response['Bidhours'] = $row['Bidhours'];
            $response['Location'] = $row['Location'];
            $response['Materialcode'] = $row['Materialcode'];
            $response['MaterialDescription'] = $row['MaterialDescription'];
            $response['Materialgroup'] = $row['Materialgroup'];
            $response['UOM'] = $row['UOM'];
            $response['Quantity'] = $row['Quantity'];
            $response['Bid_status'] = $row['Bid_status'];
            $response['Bid_Start_Datetime'] = date('d-m-Y h:i:s A',strtotime($row['Bid_Start_Datetime']));
            $response['Bidclosing_datetime'] = date('d-m-Y h:i:s A',strtotime($row['Bidclosing_datetime']));
        
            $result['data'][] = $response; 

        }

        return $result;    

    }

    public function Get_bid_top_level_positions($request)
    {

        $bid_position_sql = "SELECT TOP 5 * FROM (SELECT *,ROW_NUMBER() OVER (PARTITION BY Quoted_Employee ORDER BY Posted_Quote_Value ASC) AS RowNum FROM Purchase_Bidding_Post 
          LEFT JOIN vendor_master ON vendor_master.VendorCode = Purchase_Bidding_Post.Quoted_Employee
          WHERE Bid_Num = '".$request['bid_num']."' AND Bid_Material_Code = '".$request['material_code']."') as tbl WHERE RowNum = 1 ORDER BY Posted_Quote_Value ASC";

          // echo $bid_position_sql;exit;

        $bid_position_sql_exec = sqlsrv_query($this->conn,$bid_position_sql);

        $result = array();
        while($row = sqlsrv_fetch_array($bid_position_sql_exec,SQLSRV_FETCH_ASSOC)) {
          $result['data'][] = $row; 
        }

        return $result;
    }


    public function admin_bid_confirmation($request)
    {
        // echo "<pre>";print_r($request);exit;
        $response = array();
        $confirm_sql = "UPDATE Purchase_Bidding_Post SET negotiation_value = '".$request['negotiation_value']."',Confirm_Status = 'Quote Accepted',Admin_Confirm_Remarks = '".$request['confirmation_remarks']."' WHERE Id= '".$request['id']."'";

        $confirm_sql_exec = sqlsrv_query($this->conn,$confirm_sql);


        if($confirm_sql_exec === false) {
          // print_r(sqlsrv_errors());exit;
          $response['status']  = 500;
          $response['message'] = "Server Error.";              

        } else {
          //update approval status 
          $bid_confirm = "UPDATE Purchase_Bidding_Material SET Bid_status = 'Quote Accepted' WHERE bidnum= '".$request['bidnum']."' AND Materialcode = '".$request['material_code']."'";
          $bid_confirm_exec = sqlsrv_query($this->conn,$bid_confirm);
          
          $response['status']  = 200;
          $response['message'] = "Bidding Quotion Confirmed Successfully.";  
        }

        return $response;
    }


    public function Get_Order_Bidding_Details($request)
    {
        // echo "<pre>";print_r($request);exit;
        $order_sql = "SELECT Purchase_Bidding_Post.Id,Purchase_Bidding_Post.Bid_Num,Purchase_Bidding_Post.Bid_Material,Purchase_Bidding_Material.UOM
          ,Purchase_Bidding_Material.Quantity,Purchase_Bidding_Post.Posted_Quote_Value,Purchase_Bidding_Post.negotiation_value,
          Purchase_Bidding_Post.Confirm_Status,Purchase_Bidding_Post.Admin_Confirm_Remarks,Purchase_Bidding_Post.Bid_Material_Code
          from Purchase_Bidding_Post 
          INNER JOIN Purchase_Bidding_Material ON Purchase_Bidding_Material.bidnum = Purchase_Bidding_Post.Bid_Num AND
          Purchase_Bidding_Material.MaterialDescription =  Purchase_Bidding_Post.Bid_Material 
          where Quoted_Employee = '".$_SESSION['EmpID']."' AND Confirm_status IN('Quote Accepted','Confirmed','Not Confirmed')";

        $order_sql_exec = sqlsrv_query($this->conn,$order_sql);

        $result['data'] = array();
        while($row = sqlsrv_fetch_array($order_sql_exec,SQLSRV_FETCH_ASSOC)) {          
            $result['data'][] = $row; 
        }

        return $result;
    }


    public function vendor_bid_confirmation($request)
    {
        // echo "<pre>";print_r($request);exit;
        $status = ($request['from'] == 'confirm') ? 'Confirmed' : 'Not Confirmed';
        $material_code = trim($request['material_code']);

        // 2 -> confirmed status 
        $bid_status = 2; 

        $response = array();
        $confirm_sql = "UPDATE Purchase_Bidding_Post SET Confirm_Status = '".$status."'";

        if($status == 'Confirmed') {
          $confirm_sql .= ",Current_Status = '".$bid_status."'";
        }         

        if($status == 'Not Confirmed') {
          $confirm_sql .= ",Vendor_Not_Confirm_Remarks = '".$request['remarks']."'";
        } 

        $confirm_sql .= " WHERE Id= '".$request['id']."'";

        $confirm_sql_exec = sqlsrv_query($this->conn,$confirm_sql);


        if($confirm_sql_exec === false) {
          // print_r(sqlsrv_errors());exit;
          $response['status']  = 500;
          $response['message'] = "Server Error.";              

        } else {

          // if($status == 'Confirmed') {
            // status updation after bid confirmation
            $bid_material_sql = "UPDATE Purchase_Bidding_Material SET Status = '".$bid_status."',Bid_status = '".$status."' WHERE bidnum = '".$request['bidnum']."' AND Materialcode = '".$material_code."'";
            // echo $bid_material_sql;exit;
            $bid_material_sql_exec = sqlsrv_query($this->conn,$bid_material_sql);

          // }

          $response['status']  = 200;
          $response['message'] = "Bidding Order ".$status." Successfully.";  
        }

        return $response;
    }    


    public function Get_Bidding_History_Details($request)
    {
        // echo "<pre>";print_r($request);exit;
        $history_sql = "SELECT * FROM (SELECT Purchase_Bidding_Post.Id,Purchase_Bidding_Post.Bid_Num,Purchase_Bidding_Post.Bid_Material,Purchase_Bidding_Material.UOM
          ,Purchase_Bidding_Material.Quantity,Purchase_Bidding_Post.Posted_Quote_Value,Purchase_Bidding_Post.negotiation_value,
          Purchase_Bidding_Post.Confirm_Status,ROW_NUMBER() OVER (PARTITION BY Purchase_Bidding_Post.Bid_Material 
      ORDER BY Purchase_Bidding_Post.Id DESC) AS RowNum
          from Purchase_Bidding_Post 
          INNER JOIN Purchase_Bidding_Material ON Purchase_Bidding_Material.bidnum = Purchase_Bidding_Post.Bid_Num AND
          Purchase_Bidding_Material.MaterialDescription =  Purchase_Bidding_Post.Bid_Material 
          where Purchase_Bidding_Post.Quoted_Employee = '".$_SESSION['EmpID']."' 
      AND Purchase_Bidding_Post.Confirm_status IS NULL AND Purchase_Bidding_Material.Status = '2') as tbl WHERE tbl.RowNum = '1'";

        $history_sql_exec = sqlsrv_query($this->conn,$history_sql);

        $result['data'] = array();
        while($row = sqlsrv_fetch_array($history_sql_exec,SQLSRV_FETCH_ASSOC)) {          
            $result['data'][] = $row; 
        }

        return $result;
    }

    public function Get_Material_supply_vendors($request)
    {
        $material_codes = (COUNT($request['material_code']) > 0) ? "'".implode("','",$request['material_code'])."'" : $request['material_code'];

        $supplier_sql = "SELECT SupplierCode,SupplierDiscription,vendor_master.Mail_ID,vendor_master.Contact_No,STRING_AGG(Purchase_Vendor_Master.Text,',') as available_materials,STRING_AGG(Purchase_Vendor_Master.MaterialCode,',') as available_material_codes from Purchase_Vendor_Master 
        INNER JOIN vendor_master on vendor_master.VendorCode = Purchase_Vendor_Master.SupplierCode
        where MaterialCode IN(".$material_codes.") GROUP BY SupplierCode,SupplierDiscription,vendor_master.Mail_ID,vendor_master.Contact_No";

        $supplier_sql_exec = sqlsrv_query($this->conn,$supplier_sql);

        $result = array();
        while($row = sqlsrv_fetch_array($supplier_sql_exec,SQLSRV_FETCH_ASSOC)) {          
            $result[] = $row; 
        }

        $response['status'] = 200;
        $response['data']   = $result;

        return $response;
      
    }

    



}

?>