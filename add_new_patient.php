<?php
require('inc/nav.php');

if(!isset($_POST['submit']))
{
    $msg="err";
}
else
{
    $name=$_POST['pat_name'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $chief_complaint=$_POST['compaint'];
    $occ=$_POST['occupation'];
    $medical_history=$_POST['med_history'];
    $diagnosis=$_POST['diagnosis'];
    $addres=$_POST['address'];
    $treatment_plan=$_POST['treat_plan'];
    $mobile_num = $_POST['mob'];



    // $insert_qry = "INSERT INTO patients ('pt_name','Age','sex','Main_Complain','Med_history','Diagnosis','Treatment_plan','Address') VALUES ('$name','$age','$sex','$chief_complaint','$medical_history','$diagnosis','$treatment_plan','$addres')";

    // $db->exec($qry);


    // $insert_qry = "INSERT INTO `admin` [(`username`,`name`,`password`)] VALUES ('demo','demo','demo')";

    // $db->exec($qry);

    
    // $qry2="SELECT * FROM admin";
    // $rslt = $db->query($qry2);
    
    // while($row= $rslt->fetchArray(SQLITE3_ASSOC))
    // {
    //     echo $row['id'];
    // }


    // echo $name . " " . $sex;



    $qry = "INSERT INTO patients ('pt_name','age','sex','main_complain','occupation','med_history','diagnosis','treatment_plan','address', 'mobile') VALUES ('$name','$age','$sex','$chief_complaint','$occ','$medical_history','$diagnosis','$treatment_plan','$addres','$mobile_num')";

    $db->exec($qry);
    
    $num = $db->query("SELECT last_insert_rowid() as last_id");
    $last_id = $num->fetchArray(SQLITE3_ASSOC);
    $last=$last_id['last_id'];


    // $time_now=mktime(date('h')+3,date('i')+30,date('s'));
    // $date = date('d-m-Y H:i:s', $time_now);

    date_default_timezone_set('Asia/Kolkata');
    $date= date('h:i:s A d/m/Y ');
    $qry = "INSERT INTO payments ('pt_id','paid','date') VALUES ('$last','0','$date')";
    $db->exec($qry);


    if(!$rslt)
    {
        $msg='err_ins';
    }
    
   
   

    $msg='suc';


}



?>

<br>
<form class="form container box-shadow_form card p-4 table-bordered" action="#" method="POST">
    <h1><img class="img px-1"src="assets/images/add_user_black.png" height="40px" /> Add New Patient</h1> 

    <?php

    if(isset($_POST['submit']))
    {
        if($msg=='suc')
        {
            $num = $db->query("SELECT last_insert_rowid() as last_id FROM patients");
            $last_id = $num->fetchArray(SQLITE3_ASSOC);
            $L_id=$last_id['last_id'];

            //SENDING SMS


            // Account details
                
                    
        // Message details
        $number = "91".$mobile_num;
        $sender = urlencode('TXTLCL');
        $message = "Dear ".$name." You Succesfully Registered to INSHA PHYSIOTHERAPY CENTER with Reg ID ".$last."Thanks for Visiting ";


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
       


        
        ?>
              <div class="ml-auto"> <div class=" btn-success col-md btn-lg col-md-12"> <b> Added with Reg ID <?php echo $last; ?>

            
            <a class="ml-auto btn btn-primary" href="view_patient.php?id=<?php echo $last; ?>">View / Update</a>
       </div></b> </div>            

        <?php
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
            <input class="form-control " type="text" name="pat_name" placeholder="Name of Patient" required>
        </div>
        <br>
        <div class="col-md-5 col-sm-12">
            <div class="row">
                <label class="col-md-6 col-sm-6" for="sex"><b>Sex : </b></label> <br>
                <label class="col-md-5 col-sm-6" for="age"><b>Age : </b></label> <br>

            </div>

            <div class="row col-md-12 col-sm-12">
                <select class="form-control col-md-6 col-sm-6" type="text" name="sex" placeholder="sex" required>

                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Others">Other</option>

                </select> <br>
                <div> <br>
                    <pre>   </pre>
                </div>
                <input class="form-control col-md-5 col-sm-6" type="number" name="age" placeholder="Age" > <br>
            </div>





        </div>
    </div>

    <div class="row">

        <div class="col-md col-md-7">
            <label for="complaint"><b>Chief Complain : </b></label> <br>
            <textarea class="form-control " type="text" name="compaint" placeholder="Chief Complaint"
                > </textarea>
        </div>

        <div class="col-md col-md-5">

            <label for="occupation"><b>Occupation : </b></label> <br>
            <input class="form-control " type="text" name="occupation" placeholder="Occupation" >
        </div>
    </div>
    <br>


    <div class="row">

        <div class="col-md col-md-7">
            <label for="med_history"><b>Medical History</b></label> <br>
            <input class="form-control " type="text" name="med_history" placeholder="Previous Medical History" >
        </div>

        <div class="col-md col-md-5">

            <label for="diagnosis"><b>Diagnosis : </b></label> <br>
            <input class="form-control" type="text" name="diagnosis" placeholder="Diagnosis" >
        </div>
    </div>


    <br>
    <div class="row">
        <div class="col-md col-md-7">

            <label for="address"><b>Address : </b></label> <br>
            <textarea class="form-control " type="text" name="address" rows="4" cols="15"
                > </textarea>


        </div>

        <div class="col-md col-md-5">
            <label for="treat_plan"><b>Treatment Plan : </b></label> <br>
            <input class="form-control " type="number" name="treat_plan" placeholder="Plan Choosen" >
            <label for="mob"><b>Mobile Number : </b></label> <br>
            <input class="form-control " type="tel" name="mob" placeholder="Without 91" maxlength="10" required>

        </div>
        
    </div>
    <br>
        <br> <input class="btn btn-primary" type="submit" value="Submit" name="submit">

</form>
