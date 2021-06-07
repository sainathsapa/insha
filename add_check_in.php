<?php

require('inc/nav.php');


if(isset($_POST['submit']))
{

    $pt_id=$_POST['pt_id'];
    date_default_timezone_set('Asia/Kolkata');
    $time_date= date('h:i:s A d/m/Y ');

        $qry="INSERT INTO check_in ('pt_id','time_date') VALUES ('$pt_id','$time_date')";
        $qry_exe=$db->exec($qry);

        if($qry_exe)
        {
            $msg='suc';
        }

}

$qry="SELECT * FROM patients";
$qry_exe=$db->query($qry);


?>


<br>

<style>
    .s-select {
        font-size:larger;
    }
    </style>

<form class="form p-4 container bg-light " action="#" method="POST">

<h1 class="text-center"> Add Checkin </h1>

<?php 
if(isset($_POST['submit'])) 
{
    if($msg=='suc')
    {
        echo '<div class="ml-auto"> <div class=" btn-success col-md btn-lg col-md-12"><b>Checkin Added<div >

           
           </div></b> </div> </div>'; 
        
    } 
           
} ?>
<hr>

<h3><b>SELECT PATIENT </b> </h3>
<br><b> Patient ID - Patient NAME : </b>
<div class="row p-3">
<select  class="s-select form-control col-md-7 col-md" name="pt_id">


<?php

while($row=$qry_exe->fetchArray())
{ ?>

<option value="<?php echo $row['id'];?>"> <?php echo $row['id']." - ".$row['pt_name']  ;?> </option> 

<?php } ?>
</select>

<div class="col-md col-md-5">
   <b> Current Date And Time : 

    <?php  
    date_default_timezone_set('Asia/Kolkata');
    $date= date('h:i:s A d/m/Y ');
   echo $date;
   ?>
   </b>

</div>
</div>


<input class="btn btn-lg btn-primary "type="submit" name="submit" value="Add Checkin">

</form>