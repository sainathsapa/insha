<?php

require('inc/nav.php');

$qry = "SELECT * FROM patients JOIN check_in ON patients.id=pt_id";

$qry_exe = $db->query($qry);



?>

<br>
<div class="conainer bg-white pl-3 pr-5  ml-5 mr-5">


<table class="table table-striped pl-3 pr-5  ml-5 mr-5 table-light table-bordered" style="5" id="check_in_tbl">
<h1 class="">Check Ins <hr></h1>




    <thead class="table-dark ">
        <tr>
            <th > Checkin ID</th>
            <th > Patient ID</th>
            <th > Patient Name</th>
            <th > Checked in On</th>


           
        </tr>
    </thead>
    <tbody>

        <?php
while($row=$qry_exe->fetchArray(SQLITE3_ASSOC))
{
   
    ?>
       <tr>
           <td><?php echo $row['check_in_id'];?></td>
           <td><?php echo $row['pt_id'];?></td>
           <td><?php echo $row['pt_name'];?></td>
           <td><?php echo $row['time_date'];?></td>



           


         

        </tr>
<?php }  ?>

    </tbody>
    </table>
    
    
    <script>
$(document).ready( function () {
    $('#check_in_tbl').DataTable();
} );
</script>



