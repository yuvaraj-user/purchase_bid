<?php 
include '../auto_load.php';
include 'Common_Filter.php';
include 'Form1_store.php';

error_reporting(-1);
$Common_Filter=new Common_Filter($conn);
$Form1_store = new Form1_store($conn);

$Action=@$_POST['Action'];
if($Action=="View_Form1_Details")
{
	$Form1_Details=$Common_Filter->View_Form1_Details($_POST);
	echo json_encode($Form1_Details);exit;
}else if($Action=="View_Form2_Details")
{
	$Form2_Details=$Common_Filter->View_Form2_Details($_POST);
	echo json_encode($Form2_Details);exit;
} else if($Action=="View_Form3_Details")
{
	$Form3_Details=$Common_Filter->View_Form3_Details($_POST);
	echo json_encode($Form3_Details);exit;
} else if($Action=="View_Form1_Validation_Details")
{
	$Form3_Details=$Common_Filter->View_Form1_Validation_Details($_POST);
	echo json_encode($Form3_Details);exit;
} else if($Action=="View_Form1_Approve_Details")
{
	$Form3_Details=$Common_Filter->View_Form1_Approve_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form2_Validation_Details")
{
	$Form3_Details=$Common_Filter->View_Form2_Validation_Details($_POST);
	echo json_encode($Form3_Details);exit;
} else if($Action=="View_Form2_Approve_Details")
{
	$Form3_Details=$Common_Filter->View_Form2_Approve_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form3_Validation_Details")
{
	$Form3_Details=$Common_Filter->View_Form3_Validation_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form4_Validation_Details")
{
	$Form3_Details=$Common_Filter->View_Form4_Validation_Details($_POST);
	echo json_encode($Form3_Details);exit;
} else if($Action=="View_Form3_Approve_Details")
{
	$Form3_Details=$Common_Filter->View_Form3_Approve_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form4_Approve_Details")
{
	$Form3_Details=$Common_Filter->View_Form4_Approve_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form5_Approve_Details")
{
	$Form3_Details=$Common_Filter->View_Form5_Approve_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form5_Approve_Details_level1")
{
	$Form3_Details=$Common_Filter->View_Form5_Approve_Details_level1($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="View_All_form_Table_Dashboard")
{
	$Form3_Details=$Common_Filter->View_All_form_Table_Dashboard($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="Get_Footer_Total")
{
	$Form3_Details=$Common_Filter->Get_Footer_Total($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_All_form_Table_Dashboard_HR_View")
{
	$Form3_Details=$Common_Filter->View_All_form_Table_Dashboard_HR_View($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form1_Approve_Details_HR")
{
	$Form3_Details=$Common_Filter->View_Form1_Approve_Details_HR($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form2_Approve_Details_HR")
{
	$Form3_Details=$Common_Filter->View_Form2_Approve_Details_HR($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="View_Form3_Approve_Details_HR")
{
	$Form3_Details=$Common_Filter->View_Form3_Approve_Details_HR($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="View_Form4_Approve_Details_HR")
{
	$Form3_Details=$Common_Filter->View_Form4_Approve_Details_HR($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="Save_Details")
{
	$Form3_Details=$Common_Filter->Save_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_saved_Details")
{
	$Form3_Details=$Common_Filter->View_saved_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="Save_Details_Goal_Set")
{
	$Form3_Details=$Common_Filter->Save_Details_Goal_Set($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form5_Approve_Details_Level3")
{
	$Form3_Details=$Common_Filter->View_Form5_Approve_Details_Level3($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form3_Approve_Details_Viewrs_Level")
{
	$Form3_Details=$Common_Filter->View_Form3_Approve_Details_Viewrs_Level($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_SG_WG_LEVEL")
{
	$Form3_Details=$Common_Filter->View_SG_WG_LEVEL($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form5_Approve_Details_level5")
{
	$Form3_Details=$Common_Filter->View_Form5_Approve_Details_level5($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="HR_TOTAL_FORM1_REPORT")
{
	$Form1_Details=$Common_Filter->HR_TOTAL_FORM1_REPORT($_POST);
	echo json_encode($Form1_Details);exit;
}
else if($Action=="HR_TOTAL_FORM2_REPORT")
{
	$Form1_Details=$Common_Filter->HR_TOTAL_FORM2_REPORT($_POST);
	echo json_encode($Form1_Details);exit;
}
else if($Action=="HR_TOTAL_FORM3_REPORT")
{
	$Form1_Details=$Common_Filter->HR_TOTAL_FORM3_REPORT($_POST);
	echo json_encode($Form1_Details);exit;
}
else if($Action=="HR_TOTAL_FORM4_REPORT")
{
	$Form1_Details=$Common_Filter->HR_TOTAL_FORM4_REPORT($_POST);
	echo json_encode($Form1_Details);exit;
}
else if($Action=="View_Form5_Approve_Details_level5")
{
	$Form3_Details=$Common_Filter->View_Form5_Approve_Details_level5($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form5_Approve_Details_level6")
{
	$Form3_Details=$Common_Filter->View_Form5_Approve_Details_level6($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="HR_TOTAL_FORM_ALl_REPORT")
{
	$Form3_Details=$Common_Filter->HR_TOTAL_FORM_ALl_REPORT($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="HR_TOTAL_FORM_ALl_REPORT_With_Score")
{
	$Form3_Details=$Common_Filter->HR_TOTAL_FORM_ALl_REPORT_With_Score($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="HR_MAIN_REPORT_APPROVED_EMPLOYEE")
{
	$Form1_Details=$Common_Filter->HR_MAIN_REPORT_APPROVED_EMPLOYEE($_POST);
	echo json_encode($Form1_Details);exit;
}else if($Action=='Approve_Details_For_With_In_Limit')
{
	$user_input=$_POST;
	$result= $Common_Filter->Approve_Details_For_With_In_Limit($_POST);
	echo json_encode($result);exit;
}else if($Action=="Approve_Material_Details")
{
	$Form3_Details=$Common_Filter->Approve_Material_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="Edit_Main_Value")
{
	$Form3_Details=$Common_Filter->Edit_Main_Value($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="Onclick")
{
	$Form3_Details=$Common_Filter->Onclick($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="HR_SUMMARY_DETAILS")
{
	$Form3_Details=$Common_Filter->HR_SUMMARY_DETAILS($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=='Hr_Summary_Report_Main_Value')
{
	$user_input=$_POST;
	$result= $Common_Filter->Hr_Summary_Report_Main_Value($_POST);
	echo json_encode($result);exit;
}else if($Action=="Summary_Onlcik")
{
	$Form3_Details=$Common_Filter->Summary_Onlcik($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=='Approve_Details_For_With_In_Limit_Excel')
{
	$user_input=$_POST;
	$result= $Common_Filter->Approve_Details_For_With_In_Limit_Excel($_POST);
	echo json_encode($result);exit;
}else if($Action=='Hr_Summary_Report_Main_Value_Excel')
{
	$user_input=$_POST;
	$result= $Common_Filter->Hr_Summary_Report_Main_Value_Excel($_POST);
	echo json_encode($result);exit;
}else if($Action=='HR_SUMMARY_DETAILS_With_Arrer')
{
	$user_input=$_POST;
	$result= $Common_Filter->HR_SUMMARY_DETAILS_With_Arrer($_POST);
	echo json_encode($result);exit;
}
else if($Action=='HR_SUMMARY_DETAILS_Training')
{
	$user_input=$_POST;
	$result= $Common_Filter->HR_SUMMARY_DETAILS_Training($_POST);
	echo json_encode($result);exit;
}else if($Action=="Summary_Onlcik_Training")
{
	$Form3_Details=$Common_Filter->Summary_Onlcik_Training($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_Form2_Details_New")
{
	$Form3_Details=$Common_Filter->View_Form2_Details_New($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="Get_Role_Map_Report")
{
	$Form3_Details=$Common_Filter->Get_Role_Map_Report($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="UpdateSingleChange")
{
	$Form3_Details=$Common_Filter->UpdateSingleChange($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="UpdateMultiChange")
{
	$Form3_Details=$Common_Filter->UpdateMultiChange($_POST);
	echo json_encode($Form3_Details);exit;
}


else if ($Action == "Get_Grade_Percentage_Value") {

    $Date = date('Y-m-d');
  //  $Distribution_Channel = 'TR';
    $Employee_Code = @$_POST['Employee_Code'];
    $Increment_Recommended_By_HOD_Grade = @$_POST['Increment_Recommended_By_HOD_Grade'];
 //   $Material = @$_POST['Material'];
  //  $Customer = @$_POST['Customer'];


    if($Increment_Recommended_By_HOD_Grade=="A"){

 $sql = "Select Grade_A from HR_Master_Table LEFT join HR_GRADE_WISE_PERCENTAGE_Present on EMP_Grade = HR_Master_Table.Grade  Where HR_Master_Table.Employee_Code='".@$Employee_Code."' ";

    $sql_for_Season_details = sqlsrv_prepare($conn, $sql);
    sqlsrv_execute($sql_for_Season_details);
    $option = "";
    $count = 0;
    $result = sqlsrv_fetch_array($sql_for_Season_details, SQLSRV_FETCH_ASSOC);
    $Price = @$result['Grade_A'] != '' ? @$result['Grade_A'] : 0;


    }

    else if($Increment_Recommended_By_HOD_Grade=="B"){

  $sql = "Select Grade_B from HR_Master_Table LEFT join HR_GRADE_WISE_PERCENTAGE_Present on EMP_Grade = HR_Master_Table.Grade  Where HR_Master_Table.Employee_Code='".@$Employee_Code."' ";

     $sql_for_Season_details = sqlsrv_prepare($conn, $sql);
    sqlsrv_execute($sql_for_Season_details);
    $option = "";
    $count = 0;
    $result = sqlsrv_fetch_array($sql_for_Season_details, SQLSRV_FETCH_ASSOC);
    $Price = @$result['Grade_B'] != '' ? @$result['Grade_B'] : 0;

    	
    }


   else  if($Increment_Recommended_By_HOD_Grade=="C"){

 $sql = "Select Grade_C from HR_Master_Table LEFT join HR_GRADE_WISE_PERCENTAGE_Present on EMP_Grade = HR_Master_Table.Grade  Where HR_Master_Table.Employee_Code='".@$Employee_Code."' ";

    $sql_for_Season_details = sqlsrv_prepare($conn, $sql);
    sqlsrv_execute($sql_for_Season_details);
    $option = "";
    $count = 0;
    $result = sqlsrv_fetch_array($sql_for_Season_details, SQLSRV_FETCH_ASSOC);
    $Price = @$result['Grade_C'] != '' ? @$result['Grade_C'] : 0;

    	
    }

   else  if($Increment_Recommended_By_HOD_Grade=="D"){

 $sql = "Select Grade_D from HR_Master_Table LEFT join HR_GRADE_WISE_PERCENTAGE_Present on EMP_Grade = HR_Master_Table.Grade  Where HR_Master_Table.Employee_Code='".@$Employee_Code."' ";

    $sql_for_Season_details = sqlsrv_prepare($conn, $sql);
    sqlsrv_execute($sql_for_Season_details);
    $option = "";
    $count = 0;
    $result = sqlsrv_fetch_array($sql_for_Season_details, SQLSRV_FETCH_ASSOC);
    $Price = @$result['Grade_D'] != '' ? @$result['Grade_D'] : 0;

    	
    }

    else if($Increment_Recommended_By_HOD_Grade=="E"){

 $sql = "Select Grade_E from HR_Master_Table LEFT join HR_GRADE_WISE_PERCENTAGE_Present on EMP_Grade = HR_Master_Table.Grade  Where HR_Master_Table.Employee_Code='".@$Employee_Code."' ";

    $sql_for_Season_details = sqlsrv_prepare($conn, $sql);
    sqlsrv_execute($sql_for_Season_details);
    $option = "";
    $count = 0;
    $result = sqlsrv_fetch_array($sql_for_Season_details, SQLSRV_FETCH_ASSOC);
    $Price = @$result['Grade_E'] != '' ? @$result['Grade_E'] : 0;

    	
    }

//    $sql = "Select Grade_A from HR_Master_Table LEFT join HR_GRADE_WISE_PERCENTAGE_Present on EMP_Grade = HR_Master_Table.Grade  Where HR_Master_Table.Employee_Code='".@$Employee_Code."' ";
 
    echo json_encode(array('Price' => $Price, "sql" => $sql));
  //  exit;

}else if($Action=="View_MidtermPerformance_Details")
{
	$Form3_Details=$Common_Filter->View_MidtermPerformance_Details($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="View_MidtermPerformance_Details_Level3")
{
	$Form3_Details=$Common_Filter->View_MidtermPerformance_Details_Level3($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="View_MidtermPerformance_Details_FunctionHead")
{
	$Form3_Details=$Common_Filter->View_MidtermPerformance_Details_FunctionHead($_POST);
	echo json_encode($Form3_Details);exit;
}else if($Action=="HR_Midterm_report")
{
	$Form1_Details=$Common_Filter->HR_Midterm_report($_POST);
	echo json_encode($Form1_Details);exit;
}else if($Action=="View_MidtermPerformance_Details_Self")
{
	$Form3_Details=$Common_Filter->View_MidtermPerformance_Details_Self($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="insertGoalSetForm")
{
	$Form3_Details=$Common_Filter->insertGoalSetForm($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="deleteGoalSetForm")
{
	$Form3_Details=$Common_Filter->deleteGoalSetForm($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="insertPMSForm")
{
	$Form3_Details=$Common_Filter->insertPMSForm($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="updatePMSForm")
{
	$Form3_Details=$Common_Filter->updatePMSForm($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="approvePMSForm")
{
	$Form3_Details=$Common_Filter->approvePMSForm($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="approvePMSForm1")
{
	$Form3_Details=$Common_Filter->approvePMSForm1($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="insertForm3Form")
{
	$Form3_Details=$Common_Filter->insertForm3Form($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="updateForm3FormL2")
{
	$Form3_Details=$Common_Filter->updateForm3FormL2($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="updateForm3FormL3")
{
	$Form3_Details=$Common_Filter->updateForm3FormL3($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="updateForm3FormL4")
{
	$Form3_Details=$Common_Filter->updateForm3FormL4($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="insertForm2")
{
	$Form3_Details=$Common_Filter->insertForm2($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="updateForm2Level2")
{
	$Form3_Details=$Common_Filter->updateForm2Level2($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="updateForm2Level3")
{
	$Form3_Details=$Common_Filter->updateForm2Level3($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="updateForm2Level1")
{
	$Form3_Details=$Common_Filter->updateForm2Level1($_POST);
	echo json_encode($Form3_Details);exit;
}
else if($Action=="updateForm2Level1")
{
	$Form3_Details=$Common_Filter->updateForm2Level1($_POST);
	echo json_encode($Form3_Details);exit;
}

else if($Action=="approveGoalSetLevel2")
{
	$Form3_Details=$Common_Filter->approveGoalSetLevel2($_POST);
	echo json_encode($Form3_Details);exit;
}

// updated ajax start

elseif($Action == 'Form1_store') {
	$Form1_details_save = $Form1_store->save_form1_details($_POST);
	echo json_encode($Form1_details_save);exit;

}

elseif($Action == 'form1_qualification_save') {
		  $result_array['status'] = 422;
		  $result_array['Message'] = 'Something went wrong.';

		  $parse_data = array();
		  parse_str($_POST['data'],$parse_data);

		 $parse_data = array_map(function($value) { 
		 		if(is_array($value)){
		 				$mArr = array_map(function($value1) { 
		 					return str_replace("'","''", $value1); 
		 				},$value);
		 				return $mArr;
		 		}else{
		 			return str_replace("'","''", $value); 
		 		}
		 }, $parse_data);

		$Data=$parse_data;

		$input_array=[];
		/* Generate Crop based Geoup Of Input Start Here */



		/* Generate Crop based Geoup Of Input End Here */
		$Employee_Name=@$Data['Employee_Name'];
		$Employee_Code=@$Data['Employee_Code'];
		//$SaleOrderType=@$Data['SaleOrderType'];
		//$QuotationType=@$Data['QuotationType'];
		$Trans_Date=@$Data['Trans_Date'];
		$Trans_Date=!empty($Trans_Date) ? date('Y-m-d',strtotime(@$Trans_Date)) :date('Y-m-d');
		$RequestBy=@$_SESSION['EmpID'];
		$Designation=@$Data['Designation'];
		$Date_of_Joining=@$Data['Date_of_Joining'];
		$Division=@$Data['Division'];
		$Department=@$Data['Department'];
		$Location=@$Data['Location'];
		$Grade=@$Data['Grade'];
		
		$Name_Appraiser=@$Data['Name_Appraiser'];
		$L1_Manager=@$Data['L1_Manager'];
		$L2_Manager=@$Data['L2_Manager'];
		$Line_no=@$Data['Line_no'];
		
		$Significant_Contributions=@$Data['Significant_Contributions'];
		$Important_factors_facilitated=@$Data['Important_factors_facilitated'];
		$Important_factors_hindered=@$Data['Important_factors_hindered'];
		$Performance_Review=@$Data['Performance_Review'];

    
		$Remark=@$Data['Remark'];
		$Year_Code=@$Data['Year_Code'];
		$TotaValue1=@$Data['TotaValue1'];
		$TotaValue=@$Data['TotaValue'];
		$Remarks_Appraisee=@$Data['Remarks_Appraisee'];

		$Appraisee_Remarks_Command=@$Data['Appraisee_Remarks_Command'];
		$Development_needs_Apprisee=@$Data['Development_needs_Apprisee'];

		$Section4_Values_1=@$Data['Section4_Values_1'];
    $Section4_Evaluation_1=@$Data['Section4_Evaluation_1'];
    $Section4_Ratings_1=@$Data['Section4_Ratings_1'];
    $Section4_Remark_1=@$Data['Section4_Remark_1'];
    $Section4_Values_2=@$Data['Section4_Values_2'];
    $Section4_Evaluation_2=@$Data['Section4_Evaluation_2'];
    $Section4_Ratings_2=@$Data['Section4_Ratings_2'];
    $Section4_Remark_2=@$Data['Section4_Remark_2'];
    $Section4_Values_3=@$Data['Section4_Values_3'];
    $Section4_Evaluation_3=@$Data['Section4_Evaluation_3'];
    $Section4_Ratings_3=@$Data['Section4_Ratings_3'];
    $Section4_Remark_3=@$Data['Section4_Remark_3'];
    $Section4_Values_4=@$Data['Section4_Values_4'];
    $Section4_Evaluation_4=@$Data['Section4_Evaluation_4'];
    $Section4_Ratings_4=@$Data['Section4_Ratings_4'];
    $Section4_Remark_4=@$Data['Section4_Remark_4'];
    $Section4_Values_5=@$Data['Section4_Values_5'];
    $Section4_Evaluation_5=@$Data['Section4_Evaluation_5'];
    $Section4_Ratings_5=@$Data['Section4_Ratings_5'];
    $Section4_Remark_5=@$Data['Section4_Remark_5'];
    $Section4_Values_6=@$Data['Section4_Values_6'];
    $Section4_Evaluation_6=@$Data['Section4_Evaluation_6'];
    $Section4_Ratings_6=@$Data['Section4_Ratings_6'];
    $Section4_Remark_6=@$Data['Section4_Remark_6'];
    $Section4_Values_7=@$Data['Section4_Values_7'];
    $Section4_Evaluation_7=@$Data['Section4_Evaluation_7'];
    $Section4_Ratings_7=@$Data['Section4_Ratings_7'];
    $Section4_Remark_7=@$Data['Section4_Remark_7'];


		if(@$Data['Qualification']=="Others"){

			$Qualification=@$Data['Qualification_others'];

		}else{

		   $Qualification=@$Data['Qualification'];

		}

		$year = date("Y"); 
  
		$CreatedBy=@$_SESSION['EmpID'];
		$Dcode=@$_SESSION['Dcode'];
		$CreatedAt=date('Y-m-d H:i:s');
		$CurrentStatus="1";
		$RejectionStatus="1";

		$SQL="DELETE  from PMS_Form1_Details_save where Employee_Code='".$Employee_Code."' AND Year_Code='".$year."'  ";
      $Result=sqlsrv_query($conn,$SQL);

          $SQL="DELETE  FROM PMS_Form1_Sub_Details_save where CreatedBy='".$Employee_Code."' AND Year_Code='".$year."' ";
      $Result=sqlsrv_query($conn,$SQL);

      $SQL="EXEC PMS_Form1_Insert_Details_Save @Employee_Name='".$Employee_Name."',@Employee_Code='".$Employee_Code."',@Trans_Date='".$Trans_Date."'
     ,@RequestBy='".$RequestBy."',@Designation='".$Designation."',@Date_of_Joining='".$Date_of_Joining."',@Division='".@$Division."'
     ,@Department='".$Department."',@Location='".$Location."',@Grade='".$Grade."',@Qualification='".$Qualification."'
     ,@Name_Appraiser='".$Name_Appraiser."',@L1_Manager='".$L1_Manager."',@L2_Manager='".$L2_Manager."',@Significant_Contributions='".$Significant_Contributions."',@Important_factors_facilitated='".$Important_factors_facilitated."'
     ,@Important_factors_hindered='".$Important_factors_hindered."',@Performance_Review='".$Performance_Review."'
     ,@CreatedBy='".$Employee_Code."',@CreatedAt='".$CreatedAt."',@CurrentStatus='1',@RejectionStatus='1'
     ,@Remark='".$Remark."',@Year_Code='".$Year_Code."',@TotaValue1='".$TotaValue1."',@TotaValue='".$TotaValue."',@Appraisee_Remarks_Command='".$Appraisee_Remarks_Command."',@Development_needs_Apprisee='".$Development_needs_Apprisee."',@Section4_Values_2='".$Section4_Values_2."',@Section4_Values_3='".$Section4_Values_3."',@Section4_Values_1='".$Section4_Values_1."'
     ,@Section4_Values_4='".$Section4_Values_4."'
     ,@Section4_Values_5='".$Section4_Values_5."',@Section4_Values_6='".$Section4_Values_6."',@Section4_Values_7='".$Section4_Values_7."'
     ,@Section4_Evaluation_1='".$Section4_Evaluation_1."',@Section4_Evaluation_2='".$Section4_Evaluation_2."',@Section4_Evaluation_3='".$Section4_Evaluation_3."'
     ,@Section4_Evaluation_4='".$Section4_Evaluation_4."',@Section4_Evaluation_5='".$Section4_Evaluation_5."',@Section4_Evaluation_6='".$Section4_Evaluation_6."'
     ,@Section4_Evaluation_7='".$Section4_Evaluation_7."',@Section4_Ratings_1='".$Section4_Ratings_1."',@Section4_Ratings_2='".$Section4_Ratings_2."'
     ,@Section4_Ratings_3='".$Section4_Ratings_3."',@Section4_Ratings_4='".$Section4_Ratings_4."',@Section4_Ratings_5='".$Section4_Ratings_5."'
     ,@Section4_Ratings_6='".$Section4_Ratings_6."',@Section4_Ratings_7='".$Section4_Ratings_7."',@Section4_Remark_1='".$Section4_Remark_1."'
     ,@Section4_Remark_2='".$Section4_Remark_2."',@Section4_Remark_3='".$Section4_Remark_3."',@Section4_Remark_4='".$Section4_Remark_4."'
     ,@Section4_Remark_5='".$Section4_Remark_5."',@Section4_Remark_6='".$Section4_Remark_6."',@Section4_Remark_7='".$Section4_Remark_7."'";
     $Result=sqlsrv_query($conn,$SQL);

		if ($Result === false) {
		    die(print_r(sqlsrv_errors(), true));
		} else {
			$result_array['status'] = 200;
			$result_array['Message'] = 'Qualification saved successfully.';
		}

}

elseif ($Action == 'update_form1_level2') {

	if(isset($_SESSION['EmpID']) && $_SESSION['EmpID'] != '') {
		// echo "<pre>";print_r($_POST);exit;


		$result_array['status'] = 422;
		$result_array['Message'] = 'Something went wrong.';

	 	$year = date("Y");


	   $_POST = array_map(function($value) { 
	         if(is_array($value)){
	                 $mArr = array_map(function($value1) { 
	                     return str_replace("'","''", $value1); 
	                 },$value);
	                 return $mArr;
	         }else{
	             return str_replace("'","''", $value); 
	         }
	  }, $_POST);
	     

	  $user_Input=$_POST;

	  	//same employee present in approver role check start
		$exist_approver_sql  = "SELECT * from PMS_FORM_ROLE_MAPPING where Requester_Emp_Id = '".$user_Input['Employee_Code']."'";
	   $exist_approver_exec = sqlsrv_query($conn,$exist_approver_sql);
	   $exist_approver_result = sqlsrv_fetch_array($exist_approver_exec);
	  	//same employee present in approver role check end

	  $Validate_At=date('Y-m-d H:i:s');
	  $Validate_by=$_SESSION['EmpID'];
	  $Remarks=@$user_Input['Remarks'];
	  $CustomerCode=@$user_Input['CustomerCode'];
	  $SupplyType=@$user_Input['SupplyType'];
	  $PlantId=@$user_Input['PlantId'];
	  $Address=@$user_Input['Address'];
	  $Performance_Review=@$user_Input['Performance_Review'];
	  $Employee_Code=@$user_Input['Employee_Code'];


	  
	  $TotaValue_Level2=@$user_Input['TotaValue_Level2'];
	  $Appraisee_Remarks_Command=@$user_Input['Appraisee_Remarks_Command'];
	  $Appraisee_Remarks_Command_1=@$user_Input['Appraisee_Remarks_Command_1'];


	   $Uploaded_File = explode(".", $_FILES["upload_file1"]["name"]);
	   $Upload_Path="./Upload/";
		   
		// 3 files only allowed   
		$fileInputs = ['upload_file1', 'upload_file2', 'upload_file3'];

		$New_File_Name = array();
		foreach ($fileInputs as $key => $fileInput) {
			 $current_index = $key+1;
		    $New_File_Name[$current_index] = ''; 

		    if (isset($_FILES[$fileInput]['tmp_name']) && $_FILES[$fileInput]['tmp_name'] != '') {
		        $Temp_File_Name = $_FILES[$fileInput]['tmp_name'];
		        $File_Extension = pathinfo($_FILES[$fileInput]['name'], PATHINFO_EXTENSION);

		        $New_File_Name[$current_index] = "PMS_F".$current_index."_". date('Ymdhis') . "." . $File_Extension; 
		        // If the file already exists, delete it
		        if (file_exists($Upload_Path . $New_File_Name[$current_index])) {
		            unlink($Upload_Path . $New_File_Name[$current_index]);
		        }

		        move_uploaded_file($Temp_File_Name, $Upload_Path . $New_File_Name[$current_index]);
		     
		    }
		}

	  
	   $PMS_Id=@$user_Input['Id'];

	  $sql="UPDATE PMS_Form1_Details SET CurrentStatus='1',RejectionStatus='2',TotaValue_Level2='$TotaValue_Level2',Performance_Review='$Performance_Review',Appraisee_Remarks_Command='$Appraisee_Remarks_Command',Appraisee_Remarks_Command_1='$Appraisee_Remarks_Command_1' WHERE Employee_Code='$Employee_Code' AND Year_Code='".@$year."' ";
	  
	  $count=0;
	    if(sqlsrv_query($conn,$sql)){
	       $count=0;
	    }

	  foreach(@$user_Input['Appraiser'] as $key=>$value)
	  {
	    $Appraiser=@$user_Input['Appraiser'][$key];
	    
	    $Reviewer=@$user_Input['Reviewer'][$key];
	    $Remarks_Appraiser=@$user_Input['Remarks_Appraiser'][$key];
	    
	    $PMS_Id=@$user_Input['PMS_Id'][$key];
	    $sql="UPDATE PMS_Form1_Sub_Details SET Appraiser='$Appraiser',Reviewer='$Reviewer',Remarks_Appraiser='$Remarks_Appraiser',Validate_At='".$Validate_At."',Validate_by='".$Validate_by."',CurrentStatus='2'  OUTPUT INSERTED.Id WHERE Id in (".$PMS_Id.")";

	    if(sqlsrv_query($conn,$sql)){
	      $count++;
	    }


    	// Employee present in (recommender,approver) review move to the approve for sub details start
      if($exist_approver_result['Recommender_Emp_Id'] == $exist_approver_result['Recommender_Level_2_Emp_Id']) {
	 		$sql="UPDATE PMS_Form1_Sub_Details SET Reviewer='$Appraiser',Remarks_Approve='$Remarks_Appraiser',Approved_At='".$Validate_At."',Approved_by='".$Validate_by."',CurrentStatus='3' OUTPUT INSERTED.Id WHERE Id in (".$PMS_Id.")";
			sqlsrv_query($conn,$sql);
		}
    	// Employee present in (recommender,approver) review move to the approve for sub details end


	   }

	   $file_1 = isset($New_File_Name[1]) ? $New_File_Name[1] : '';
	   $file_2 = isset($New_File_Name[2]) ? $New_File_Name[2] : '';
	   $file_3 = isset($New_File_Name[3]) ? $New_File_Name[3] : '';

	   $SQL="EXEC PMS_File_Upload_Details @RequestBy='".$Employee_Code."',@upload_file1='".$file_1."',@upload_file2='".$file_2."',@upload_file3='".$file_3."'";
	     $Result=sqlsrv_query($conn,$SQL);



	   // Employee present in (recommender,approver) review move to the approve start
      if($exist_approver_result['Recommender_Emp_Id'] == $exist_approver_result['Recommender_Level_2_Emp_Id']) {
      	  $sql="UPDATE PMS_Form1_Details SET CurrentStatus='1',RejectionStatus='3',Performance_Review='$Performance_Review' ,TotaValue_Level3='$TotaValue_Level2'  WHERE Employee_Code='$Employee_Code' AND Year_Code='".@$year."' ";
	         $Result=sqlsrv_query($conn,$sql);


      	$SQL="UPDATE HR_Master_All_Forms SET Form1_CurrentStatus='3' where Employee_Code='".$Employee_Code."' AND Year_Code='".$year."'";
         $Result=sqlsrv_query($conn,$SQL);
      }	
	   // Employee present in (recommender,approver) review move to the approve end


		$result_array['status'] = 200;
		$result_array['Message'] = 'Recommended successfully.';

	}else {
		$result_array['status'] = 419;
		$result_array['Message'] = 'Your Login Session closed.';
	}
	echo json_encode($result_array);exit;
}


elseif ($Action == 'update_form1_level3') {

	if(isset($_SESSION['EmpID']) && $_SESSION['EmpID'] != '') {

		$result_array['status'] = 422;
		$result_array['Message'] = 'Something went wrong.';

	 	$year = date("Y");	


	   $_POST = array_map(function($value) { 
	         if(is_array($value)){
	                 $mArr = array_map(function($value1) { 
	                     return str_replace("'","''", $value1); 
	                 },$value);
	                 return $mArr;
	         }else{
	             return str_replace("'","''", $value); 
	         }
	  }, $_POST);
	     

	  $user_Input=$_POST;


  $Approved_At=date('Y-m-d H:i:s');
  $Approved_by=$_SESSION['EmpID'];
  $Remarks=@$user_Input['Remarks'];
  $CustomerCode=@$user_Input['CustomerCode'];
  $SupplyType=@$user_Input['SupplyType'];
  $PlantId=@$user_Input['PlantId'];
  $Address=@$user_Input['Address'];
  $TotaValue_Level3=@$user_Input['TotaValue_Level3'];
  $Performance_Review=@$user_Input['Performance_Review'];
  $Employee_Code=@$user_Input['Employee_Code'];
  
  $PMS_Id=@$user_Input['Id'];

  $sql="UPDATE PMS_Form1_Details SET CurrentStatus='1',RejectionStatus='3',Performance_Review='$Performance_Review' ,TotaValue_Level3='$TotaValue_Level3'  WHERE Employee_Code='$Employee_Code' AND Year_Code='".@$year."' ";
  $count=0;
    if(sqlsrv_query($conn,$sql)){
       $count=0;
    }

  foreach(@$user_Input['Reviewer'] as $key=>$value)
  {
   // $Appraiser=@$user_Input['Appraiser'][$key];
    
    $Reviewer=@$user_Input['Reviewer'][$key];
    $PMS_Id=@$user_Input['PMS_Id'][$key];
    $TotalPrice=@$user_Input['TotalPrice'][$key];
    $Remarks_Approve=@$user_Input['Remarks_Approve'][$key];
    
    $sql="UPDATE PMS_Form1_Sub_Details SET Reviewer='$Reviewer',TotalPrice='$TotalPrice',Remarks_Approve='$Remarks_Approve',Approved_At='".$Approved_At."',Approved_by='".$Approved_by."',CurrentStatus='3' OUTPUT INSERTED.Id WHERE Id in (".$PMS_Id.")";

    if(sqlsrv_query($conn,$sql)){
      $count++;
    }
  }


  $sql="UPDATE HR_Master_Table SET Form1_CurrentStatus='3'  WHERE Employee_Code ='".$Employee_Code."' ";
 
 	if(sqlsrv_query($conn,$sql)){
       $count=0;
    }


       $year = date("Y");

   $SQL="UPDATE HR_Master_All_Forms SET Form1_CurrentStatus='3' where Employee_Code='".$Employee_Code."' AND Year_Code='".$year."'";
         $Result=sqlsrv_query($conn,$SQL);


		$result_array['status'] = 200;
		$result_array['Message'] = 'Approved successfully.';

	}else {
		$result_array['status'] = 419;
		$result_array['Message'] = 'Your Login Session closed.';
	}
	echo json_encode($result_array);exit;
}


// updated ajax end


























?>