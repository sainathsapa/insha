<?php

require('inc/nav.php');

$qry = "SELECT * FROM patients JOIN payments ON patients.id=pt_id";

$qry_exe = $db->query($qry);



?>

<br>
<div class="conainer bg-white pl-3 pr-5  ml-5 mr-5">
<table class="table table-striped table-light pl-3 pr-5  ml-5 mr-5  table-bordered" style="5" id="paid_tbl">
<h1 class=" "> Payments Completed <hr></h1>




    <thead class="table-dark ">
        <tr>
            <th > Payment ID</th>
            <th > Patient NAME</th>
            <th > LAST PAID DATE</th>
            <th > Patient Treatment Plan</th>

            <th > Patient Paid</th>

           
        </tr>
    </thead>
    <tbody>

        <?php
while($row=$qry_exe->fetchArray(SQLITE3_ASSOC))
{
    if($row['Treatment_plan']==$row['paid'])
    {
    ?>
       <tr>
           <td><?php echo $row['id'];?></td>
           <td><?php echo $row['pt_name'];?></td>
           <td><?php echo $row['date'];?></td>
           <td><?php echo $row['Treatment_plan'];?></td>

           <td><?php echo $row['paid'];?></td>


           


         

        </tr>
<?php } } ?>

    </tbody>
    </table>

    <script>
$(document).ready( function () {
    $('#paid_tbl').DataTable();
} );
</script>



