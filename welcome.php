<?php
require('inc/nav.php');



?>
<br>
<br>

<div class="container card">
<div class="row">
<div class="col-md col-md-5 text-center">
<br>
<img class="img col-md-4"src="assets/images/users.png"/>
<br>
<b> Total Patients </b> <br> <strong>
<?php 
$qry_Pat="SELECT count(id) as count_row FROM patients";
$qry_pat_exe = $db->query($qry_Pat);
$row_pt=$qry_pat_exe->fetchArray();

echo $row_pt['count_row'];
?>
</strong>
</div>


</div>


<br>

</div>
