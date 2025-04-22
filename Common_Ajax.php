<?php 
include '../auto_load.php';
include 'Common_Filter.php';
error_reporting(-1);
$Common_Filter=new Common_Filter($conn);
$Action=@$_POST['Action'];

if($Action == "Bidding_Stored") {
	$Bidding_Stored = $Common_Filter->Bidding_Stored($_POST);
	echo json_encode($Bidding_Stored);exit;
} elseif($Action == "Get_Live_Bidding_Details") {
	$Get_Live_Bidding_Details = $Common_Filter->Get_Live_Bidding_Details($_POST);
	echo json_encode($Get_Live_Bidding_Details);exit;
} elseif($Action == "post_bid"){
	$post_bid = $Common_Filter->post_bid($_POST);
	echo json_encode($post_bid);exit;
} elseif($Action == "Get_Upcomming_Bidding_Details") {
	$Get_Upcomming_Bidding_Details = $Common_Filter->Get_Upcomming_Bidding_Details($_POST);
	echo json_encode($Get_Upcomming_Bidding_Details);exit;
} elseif($Action == "Get_Bid_Confirmation_Data") {
	$Get_Bid_Confirmation_Data = $Common_Filter->Get_Bid_Confirmation_Data($_POST);
	echo json_encode($Get_Bid_Confirmation_Data);exit;
} elseif($Action == "Get_bid_top_level_positions") {
	$Get_bid_top_level_positions = $Common_Filter->Get_bid_top_level_positions($_POST);
	echo json_encode($Get_bid_top_level_positions);exit;
} elseif($Action == "admin_bid_confirmation") {
	$admin_bid_confirmation = $Common_Filter->admin_bid_confirmation($_POST);
	echo json_encode($admin_bid_confirmation);exit;
} elseif($Action == "Get_Order_Bidding_Details") {
	$Get_Order_Bidding_Details = $Common_Filter->Get_Order_Bidding_Details($_POST);
	echo json_encode($Get_Order_Bidding_Details);exit;
} elseif($Action == "vendor_bid_confirmation") {
	$vendor_bid_confirmation = $Common_Filter->vendor_bid_confirmation($_POST);
	echo json_encode($vendor_bid_confirmation);exit;
} elseif($Action == "Get_Bidding_History_Details") {
	$Get_Bidding_History_Details = $Common_Filter->Get_Bidding_History_Details($_POST);
	echo json_encode($Get_Bidding_History_Details);exit;
} elseif($Action == "Get_Material_supply_vendors") {
	$Get_Material_supply_vendors = $Common_Filter->Get_Material_supply_vendors($_POST);
	echo json_encode($Get_Material_supply_vendors);exit;
}





?>