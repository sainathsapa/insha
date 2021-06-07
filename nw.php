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

if(isset($_POST['submit']))
{
$send_name=$row_patients['pt_name'];
$send_pay_id=$row_payments['id'];
$send_pat_id=$row_patients['id'];
$mobile_num=$row_patients['mobile'];


 
$paid=$_POST['paid'];


    
date_default_timezone_set('Asia/Kolkata');
$date= date('h:i:s A d/m/Y ');

$qry = "INSERT INTO  payments  ('pt_id','paid','date') VALUES ('$send_pat_id','$paid','$date')";
$db->exec($qry);
if($db)
{
$msg='suc';


            //SENDING SMS


            // Account details
                
            $apiKey = urlencode('-13q78SRvWsUWgmKfo3kZoFP82vilyV');
                    
            // Message details
            $number = "91".$mobile_num;
            $sender = urlencode('TXTLCL');


            $due_send = $row_patients['Treatment_plan']-$row_payments['paid'];
            $num = $db->query("SELECT last_insert_rowid() as last_id");
            $last_id = $num->fetchArray(SQLITE3_ASSOC);


            $message = "Dear ".$send_name." You've Paid ".$paid." Succesfully  to INSHA PHYSIOTHERAPY CENTER with Payment ID ".$last_id['last_id']." and Left the due of ".$due_send." Thanks for Visiting #DSK Solutions";
    
    
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
    
            $rslt = json_decode($response, JSON_PRETTY_PRINT);
           
        echo $message;



// echo "

// <script>
// location.href = 'dues.php?due_id_suc=$send_pay_id&due_name_suc=$send_name';

// </script>

// ";
}

}

?>

<form class="form container box-shadow_form card p-4 table-bordered" action="#" method="POST">
    <h1>Update Due for Payment ID <?php echo $row_payments['id'];?></h1> 
    <hr>
    <h4 class="ml-auto"> Patient ID : <?php echo $row_patients['id'];?></h4>

    <?php

    if(isset($_POST['submit']))
    {
        if($msg=='suc')
        {
            $num = $db->query("SELECT last_insert_rowid() as last_id");
            $last_id = $num->fetchArray(SQLITE3_ASSOC);
            $l_id=$last_id['last_id'];

            echo '   <div class="ml-auto"> <div class=" btn-success col-md btn-lg col-md-12"><a class="text-white" href="dues.php"> <b> Update Succesfull  Go Back </a><div >
           
        </div></b> </div> </div>
            ';


        
        }

        if($msg=='err_ins')
        {
            echo '    <div class="ml-auto"> <div class=" btn-danger col-md btn-lg col-md-12"> <b> Something went Wrong.! </b> </div> </div>
            ';

        }
    }

    ?>

    <br>


    <div class="row">

        <div class="col-md col-md-7">
            <label class="label form" for="pat_name"><b>Name of Patient : </b></label> <br>
            <input class="form-control " type="text" name="pat_name" placeholder="Name of Patient" value="<?php echo $row_patients['pt_name'];?>" readonly>
        </div>
        <br>
        <div class="col-md-5">
        <label for="treat_plan"><b>Treatment Plan : </b></label> <br>
            <input class="form-control " type="text" name="treat_plan" placeholder="Plan Choosen" value="<?php echo $row_patients['Treatment_plan'];?>" readonly>
            <br> 

            </div>


           
        


        <div class="col-md col-md-3">
        <label for="paid"><b>Paid : </b></label> <br>
            <input class="form-control " type="text" name="paid" placeholder="Paid"  value="<?php echo $row_payments['paid'];?>" required>

        </div>
        <div class="col-md col-md-3">
        <label for="Due"><b>Due : </b></label> <br>
            <input class="form-control " type="text" name="Due" placeholder="Due"  value="<?php echo $row_patients['Treatment_plan']-$row_payments['paid'];?>" readonly>
           

        </div>


  
<input class="btn ml-auto btn-lg col-md-6 btn-primary" type="submit" value="Update" name="submit">
</div>
</form>


