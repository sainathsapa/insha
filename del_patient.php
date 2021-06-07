<?php


require('inc/nav.php');
$id=$_GET['id'];

$qry = "SELECT * FROM patients WHERE id='$id'";

$qry_exe = $db->query($qry);

$row=$qry_exe->fetchArray(SQLITE3_ASSOC);

if(isset($_POST['submit']))
{

    $qry_del="DELETE FROM patients WHERE id=$id";
    $db->exec($qry_del);

   
$send_name=$row['pt_name'];


    echo "
    
    <script>
    location.href = 'view_patients.php?del_id_suc=$id&del_name_suc=$send_name';

    </script>
    
    ";



}



?>
<br>
<div class="container card">
<h1 class=""> Delete Patient </h1>
<hr>

<form action="#" method="POST">
<h2 class="heading text-center bg-danger text-white"> Are You Sure to Delete </h2>
<br>
<div class='text'> <b> Patient ID : </b> <?php echo $row['id']; ?></div>
<div class='text'> <b> Patient NAME : </b> <?php echo $row['pt_name']; ?></div>
<div class='text'> <b> Patient Main Complaint : </b> <?php echo $row['Main_Complain']; ?></div>
<div class='text'> <b> Patient Address : </b> <?php echo $row['Address']; ?></div>
<center>
<button class="btn btn-lg btn-success col-md-1 p-0 py-0 px-0" type="submit" name="submit" value="Delete"> Yes </button>
<a class="btn btn-lg btn-danger col-md-1 p-0 py-0 px-0" href="view_patients.php"> Back </a>

</center>
</form>
<br>

</div>