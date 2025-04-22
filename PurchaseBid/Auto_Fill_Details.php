<?php

include '../auto_load.php';

$materialgroup=@$_POST['materialgroup'];
$Materialcode=@$_POST['Materialcode'];
$VendorCode=@$_POST['VendorCode'];

$Action=isset($_POST["Action"]) && !empty($_POST["Action"]) ? trim($_POST["Action"]) : "0";

       $option="";
  if($Action=="Get_Material_Details") /* Crop_Code Based on Year_Code  Display  */
{
	 $Sql="SELECT DISTINCT ItemCode,ItemDescription from MaterialMaster Where MaterialGroup='".@$materialgroup."' ";
	 
	
		$Details  = sqlsrv_query($conn,$Sql);
		//echo $Sql;
		$option='<option value="">Select</option>';
		while($result = sqlsrv_fetch_array($Details))
		{ 
		

			$option.='<option value="'.trim($result['ItemCode']).'">'.trim(ltrim(trim($result['ItemCode']), '0').'-'.trim($result['ItemDescription'])).'</option>';


	    	}


	$option=json_encode(array('data' => $option,'sql'  => $Sql));

}else if($Action=="Get_MaterialDescription_Details") /* Crop_Code Based on Year_Code  Display  */
{
	 $Sql="SELECT DISTINCT ItemDescription,UOM from MaterialMaster Where MaterialGroup='".@$materialgroup."' and ItemCode='".@$Materialcode."' ";
	 
	
	$Details  = sqlsrv_query($conn,$Sql);
	$result = sqlsrv_fetch_array($Details);
	
	$option=json_encode($result);

}else if($Action=="Get_Vendor_Deatails") /* Crop_Code Based on Year_Code  Display  */
{
	 $Sql="SELECT DISTINCT VendorCode,VendorName from vendor_master ";
	 
	
		$Details  = sqlsrv_query($conn,$Sql);
		//echo $Sql;
		$option='<option value="">Select</option>';
		while($result = sqlsrv_fetch_array($Details))
		{ 
		

			$option.='<option value="'.trim($result['VendorCode']).'">'.trim(trim($result['VendorCode']).'-'.trim($result['VendorName'])).'</option>';


	    	}


	$option=json_encode(array('data' => $option,'sql'  => $Sql));

}else if($Action=="Get_Vendorform_Deatails") /* Crop_Code Based on Year_Code  Display  */
{
	 $Sql="SELECT DISTINCT TRIM(VendorCode)VendorCode,TRIM(VendorName)VendorName, TRIM(Mail_ID)Mail_ID,TRIM(Contact_No)Contact_No from vendor_master Where VendorCode!='' and VendorCode='".@$VendorCode."'  ";
	 
	
	$Details  = sqlsrv_query($conn,$Sql);
	$result = sqlsrv_fetch_array($Details);
	
	$option=json_encode($result);

}










echo $option;

?>

