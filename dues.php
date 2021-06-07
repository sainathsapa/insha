<?php
require('inc/nav.php');


$qry ="SELECT * FROM patients JOIN payments ON patients.id=pt_id GROUP BY patients.pt_name";


$qry_exe = $db->query($qry);

?>
<br>
<div class="conainer bg-white pl-3 pr-5  ml-5 mr-5">


<table class="table table-striped table-light pl-3 pr-5  ml-5 mr-5  table-bordered" style="5" id="due_table">
<h1 class=" "> Dues <hr></h1>
<?php 
if(isset($_GET['due_id_suc']))
{
    echo "<div class=' container p-2 card bg-success  text-white flex'> Payment ID ". $_GET['due_id_suc']." Which linked to  ".$_GET['due_name_suc']." has been Updated</div>"; 

}

?> 



    <thead class="table-dark ">
        <tr>
            <th > Payment ID</th>
            <th > Patient NAME</th>
            <th > LAST PAID DATE</th>
            <th > Patient Paid</th>

            <th > Patient Due</th>

            <th > Send Notification</th>
        </tr>
    </thead>
    <tbody>

        <?php
while($row=$qry_exe->fetchArray(SQLITE3_ASSOC))
{
    if($row['Treatment_plan']-$row['paid']!=0)
    { 
    ?>
       <tr>
           <td><?php echo $row['id'];?></td>
           <td><?php echo $row['pt_name'];?></td>
           <td><?php echo $row['date'];?></td>
           <td><?php echo $row['paid'];?></td>

           <td><?php echo $row['Treatment_plan']-$row['paid'];?></td>

           <td>  
               <center>
            <a class="ml-auto btn btn-primary" href="due_update.php?id=<?php echo $row['id'];?>">View / Update</a>
            <a class="ml-auto btn btn-danger" href="send_sms.php?id=<?php echo $row['id'];?>">Send SMS</a>

</center>
       </td>


         

        </tr>
<?php } else {;}}?>

    </tbody>
    </table>

    <script>
$(document).ready( function () {
    $('#due_table').DataTable();
} );
</script>



