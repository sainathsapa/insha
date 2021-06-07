<?php
require('inc/nav.php');


$id=$_GET['id'];

if(isset($_POST['submit']))
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
    
    $qry = "UPDATE  patients SET 'pt_name'='$name', 'age' ='$age','sex'='$sex','main_complain'='$chief_complaint','occupation'='$occ','med_history'='$medical_history','diagnosis'='$diagnosis','treatment_plan'='$treatment_plan','address'='$addres', 'mobile'='$mobile_num'  WHERE id='$id'";
    $db->exec($qry);
    if($db)
    {
    $msg='suc';
}


}


$qry = "SELECT * FROM patients WHERE id='$id'";

$qry_exe = $db->query($qry);

$row=$qry_exe->fetchArray(SQLITE3_ASSOC);




?>
<br>



<form class="form container  box-shadow_form card p-4 table-bordered" action="#" method="POST">
    <h1>View Patinet</h1>
    <hr>
    <h4 class="ml-auto"> Patient ID : <?php echo $row['id'];?></h4>

    <?php

    if(isset($_POST['submit']))
    {
        if($msg=='suc')
        {
            $num = $db->query("SELECT last_insert_rowid() as last_id");
            $last_id = $num->fetchArray(SQLITE3_ASSOC);

            echo '   <div class="ml-auto"> <div class=" btn-success col-md btn-lg col-md-12"><a class="text-white" href="view_patients.php"> <b> Update Succesfull  Go Back </a><div >
           
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
            <input class="form-control " type="text" name="pat_name" placeholder="Name of Patient"
                value="<?php echo $row['pt_name'];?>" >
        </div>
        <br>
        <div class="col-md-5">
            <div class="row">
                <label class="col-md-6" for="sex"><b>Sex : </b></label> <br>
                <label class="col-md-5" for="age"><b>Age : </b></label> <br>

            </div>

            <div class="row col-md-12">
                <select class="form-control col-md-6 " name="sex" placeholder="sex" >

                    <option value="Female" <?php if($row['Sex']=="Female"){echo "selected";}?>>Female</option>
                    <option value="Male" <?php if($row['Sex']=="Male"){echo "selected";}?>>Male</option>
                    <option value="Others" <?php if($row['Sex']=="Other"){echo "selected";}?>>Other</option>

                </select> <br>
                <div> <br>
                    <pre>   </pre>
                </div>
                <input class="form-control col-md-5 " type="number" name="age" placeholder="Age"
                    value="<?php echo $row['Age'];?>" > <br>
            </div>





        </div>
    </div>

    <div class="row">

        <div class="col-md col-md-7">
            <label for="complaint"><b>Chief Complain : </b></label> <br>
            <textarea class="form-control " type="text" name="compaint" placeholder="Chief Complaint"
                ><?php echo $row['Main_Complain'];?></textarea>
        </div>

        <div class="col-md col-md-5">

            <label for="occupation"><b>Occupation : </b></label> <br>
            <input class="form-control " type="text" name="occupation" placeholder="Occupation"
                value="<?php echo $row['Occupation'];?>" >
        </div>
    </div>
    <br>


    <div class="row">

        <div class="col-md col-md-7">
            <label for="med_history"><b>Medical History</b></label> <br>
            <input class="form-control " type="text" name="med_history" placeholder="Previous Medical History"
                value="<?php echo $row['Med_history'];?>" >
        </div>

        <div class="col-md col-md-5">

            <label for="diagnosis"><b>Diagnosis : </b></label> <br>
            <input class="form-control" type="text" name="diagnosis" placeholder="Diagnosis"
                value="<?php echo $row['Diagnosis'];?>" >
        </div>
    </div>


    <br>
    <div class="row">
        <div class="col-md col-md-7">

            <label for="address"><b>Address : </b></label> <br>
            <textarea class="form-control " type="text" name="address" rows="4" cols="15"
                > <?php echo $row['Address'];?></textarea>


        </div>

        <div class="col-md col-md-5">
            <label for="treat_plan"><b>Treatment Plan : </b></label> <br>
            <input class="form-control " type="number" name="treat_plan" placeholder="Plan Choosen"
                value="<?php $Treat=$row['Treatment_plan']; echo $row['Treatment_plan'];?>" >
            
            <label for="mob"><b>Mobile Number : </b></label> <br>
            <input class="form-control " type="tel" name="mob" placeholder="Without 91" value="<?php  echo $row['mobile']; ?>"required>


        </div>

    </div>
    <br>
        <br> <input class="btn btn-primary" type="submit" value="Submit" name="submit">


</form>

<div class="container card">
    <table class=" table table-bordred table-striped table-hover">
        <h1> Patient Transactions </h1>

        <thead>

            <tr>
                <th>Payment ID</th>
                <th>Paid</th>
                <th>Due</th>
                

                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php 

                $payment_qry="SELECT * FROM payments WHERE pt_id=$id";
                $qry_exe_payment=$db->query($payment_qry);

                while($row=$qry_exe_payment->fetchArray())
                {

                    
                


            ?>
            <tr>
                <td><?php echo $row['id']; ?> </td>
                <td><?php echo $row['paid']; ?> </td>
                <td><?php echo $Treat-$row['paid']; ?> </td>
                <td><?php echo $row['date']; ?> </td>


            </tr>

                <?php } ?>
        </tbody>
    </table>

</div>

<?php
$qry = "SELECT * FROM  check_in WHERE pt_id=$id";

$qry_exe = $db->query($qry);



?>
<table class="table table-striped table-light container table-hover table-bordered" style="5">
<h1 class="card container">Check Ins <hr></h1>




    <thead class="table-dark ">
        <tr>
        <th > <b>Row No</b> </th>

            <th > <b>Checkin ID</b> </th>
            <th > <b>Checked in On</b> </th>


           
        </tr>
    </thead>
    <tbody>

        <?php
        $count=1;
while($row_check_in=$qry_exe->fetchArray(SQLITE3_ASSOC))
{
   
    ?>
       <tr>
       <td><?php echo $count++; ?></td>

           <td><?php echo $row_check_in['check_in_id'];?></td>
           <td><?php echo $row_check_in['time_date'];?></td>



           


         

        </tr>
<?php }  ?>

    </tbody>
    </table>

