<?php

require('inc/nav.php');

if(isset($_POST['submit']))
{

    $qry = "SELECT * FROM patients ";
$numbers_to_send="";
    $qry_exe = $db->query($qry);
    while($row=$qry_exe->fetchArray(SQLITE3_ASSOC))
    {

        $numbers_to_send .= "91".$row['mobile'].',';
    }
    $numbers_to_send = rtrim($numbers_to_send, ",");

    //SENDING SMS

    $apiKey = urlencode('pumoyhOgfUQ-13q78SRvWsUWgmKfo3kZoFP82vilyV');
	
	// Message details
	$numbers = array($numbers_to_send);
    $sender = urlencode('TXTLCL');
    $temp = "TEMP";
	$message = $_POST['msg']." INSHA PHYSIOTHERAPY CENTER";
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
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

    <div class='bg-success'><b>Sent Success</div>
    
    ";
} 



 








}



?>


<br>
<div class="conainer bg-white pl-3 pr-5  ml-5 mr-5">
<h1>Send Bulk SMS </h1>
<br>
<?php

if(isset($_POST['submit']))
{
    if($rslt_json['status']=='sucess')
    echo "<div class='bg-success'> Success </div>";
}


?>
<form action="#" method="POST">
   
<label for="msg"><b>Message : </b></label> <br>
            <textarea class="col-md-5 form-control " type="text" name="msg" rows="4" cols="15" required> </textarea>

       

            <br> <input class="btn btn-success" type="submit" value="Send" name="submit">

<br>
<br>
</form>
</div>


