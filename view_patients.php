<?php
require('inc/nav.php');


$qry = "SELECT * FROM patients ";

$qry_exe = $db->query($qry);

?>
<br>
<div class="conainer bg-white pl-3 pr-5  ml-5 mr-5">
<table class="table table-striped table-light pl-3 pr-5  ml-5 mr-5  table-bordered" id="view_pats">
<h1 class=" "> View Patients <hr></h1>
<?php 
if(isset($_GET['del_id_suc']))
{
    echo "<div class='  p-2 card bg-success  text-white flex'> Patient ". $_GET['del_name_suc']." with ID ".$_GET['del_id_suc']." has been deleted</div>"; 

}

?> 



    <thead class="table-dark ">
        <tr>
            <th > Patient ID</th>
            <th > Patient NAME</th>
            <th > Patient AGE</th>
            <th > Patient Compaint</th>

            <th > Patient Address</th>

            <th > Patient ACTION</th>
        </tr>
    </thead>
    <tbody>

        <?php
while($row=$qry_exe->fetchArray(SQLITE3_ASSOC))
{
    ?>
       <tr>
           <td><?php echo $row['id'];?></td>
           <td><?php echo $row['pt_name'];?></td>
           <td><?php echo $row['Age'];?></td>
           <td><?php echo $row['Main_Complain'];?></td>

           <td><?php echo $row['Address'];?></td>

           <td>  
               <center>
            <a class="ml-auto btn btn-primary" href="view_patient.php?id=<?php echo $row['id'];?>">View / Update</a>
            <a class="mr-auto btn btn-danger" href="del_patient.php?id=<?php echo $row['id'];?>">Delete</a>
</center>
       </td>


         

        </tr>
<?php } ?>

    </tbody>
    </table>
    </div>
    <script>
$(document).ready( function () {
    $('#view_pats').DataTable();
} );
</script>


