<?php
if(ISSET($_POST))
{
	$name=$_POST['driver_name'];
  $email=$_POST['email'];
	$phone=$_POST['phone'];
  $driver_dob=$_POST['driver_dob'];
  $address=$_POST['address'];
	$city=$_POST['city'];
  $state=$_POST['state'];
  $zip_code=$_POST['zip_code'];
  $country=$_POST['country'];
  $vehicle_model=$_POST['vehicle_model'];
 $year_febrication=$_POST['year_febrication'];
 $license_number=$_POST['license_number'];
 $insurance_covrage=$_POST['insurance_covrage'];
 $any_mess=$_POST['any_mess'];


  $field1="<b>Driver DOB:</b> ".$driver_dob."<br>"."<b>Address: </b>"."<br>"."Street: ".$address."<br>"."City: ".$city."<br>"."State: ".$state."<br>"."Zip Code: ".$zip_code."<br>"."Country: ".$country."<br>"."<b>Vehicle Model:</b> ".$vehicle_model."<br>"."<b>Year Of Febrication:</b> ".$year_febrication."<br>"."<b>License Number:</b> ".$license_number."<br>"."<b>Insurance Covrage:</b> ".$insurance_covrage."<br>"."<b>Any Message:</b> ".$any_mess;

}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email, 'field_1'=>$field1);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>