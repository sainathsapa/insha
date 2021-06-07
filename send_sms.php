<?php
require('inc/nav.php');
$id=$_GET['id'];
$qry="SELECT * FROM payments WHERE id=$id";
$exe_payment = $db->query($qry);

$row_payments=$exe_payment->fetchArray(SQLITE3_ASSOC);

$pt_id=$row_payments['pt_id'];
$qry="SELECT * FROM patients  WHERE id=$pt_id ORDER BY id DESC LIMIT 1 ";
$exe_patient = $db->query($qry);
$row_patients=$exe_patient->fetchArray(SQLITE3_ASSOC);



$send_name=$row_patients['pt_name'];
$send_pay_id=$row_payments['id'];
$send_pat_id=$row_patients['id'];
$mobile_num=$row_patients['mobile'];


  // Account details
                
  $apiKey = urlencode('pumoyhOgfUQ-13q78SRvWsUWgmKfo3kZoFP82vilyV');
                    
  // Message details
  $number = "91".$mobile_num;
  $sender = urlencode('TXTLCL');


  $due_send = $row_patients['Treatment_plan']-$row_payments['paid'];
  $num = $db->query("SELECT last_insert_rowid() as last_id");
  $last_id = $num->fetchArray(SQLITE3_ASSOC);


  $message = "Dear, ".$send_name." You've due of ".$due_send." to INSHA PHYSIOTHERAPY CENTER Kindly Pay the the Bill to Dr. Abdul, Thanks for Visiting";


  // Prepare data for POST request
  $data = array('apikey' => $apiKey, 'numbers' => $number, "sender" => $sender, "message" => $message);

  // Send the POST request with cURL
  $ch = curl_init('https://api.textlocal.in/send/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);

  // Process your response here


$rslt_json = json_decode($response, JSON_PRETTY_PRINT);
if($rslt_json['status']=='success')
{

    echo "

    <script>
    location.href = 'dues.php?sms_pat_id=$send_pat_id&sms_name_suc=$send_name';
    
    </script>
    
    ";
} 
else
{
    echo "Something Went Wrong";
}




?>