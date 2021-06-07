<?php

session_start();
require('db.php');
require('style.php');
require('js.php');



$username = $_SESSION['admin_id'];


$qry="SELECT * FROM admin WHERE id=$username";

$rslt = $db->query($qry);

$row= $rslt->fetchArray(SQLITE3_ASSOC);
$welcome_name = $row['name'];


?>
<a class="copy" href="http://dsksolutions.unaux.com"><img src="assets/images/logo.png" height="70px"/></a>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!-- Bootstrap CSS -->
<!-- Meta TAGS -->
<meta name="description" content="INSHA PHYSIOTHERAPY CENTER, DSK Solutions Kubeer Pvt. Ltd. Ask Here For Tech And Music Solutions. Home Page | Dj Sai Kubeer Softwares And Worlds Pvt. Ltd., Any Technical And Music Issue Solutions"/>
<meta name="author" content="Sainath Sapa"/>
<meta name="copyright" content="Dj Sai Kubeer Softwares And Worlds Pvt. Ltd. All Rights Reserved."/>
<meta name="robots" content="index,follow"/>
<meta name="googlebot" content="index,follow"/>
<link rel="shortcut icon" href="assets/images/logo.png" type="image/png"/>
<title> DSK Solutions Pvt. Ltd. 2020 | Management Software </title>

</head>
<br>
                                            
 <h1 class="text-center head_line "> INSHA PHYSIOTHERAPY CENTER</h1>
<br>
<nav class=" navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Welcome <?php echo $welcome_name; ?> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Nav_bar" aria-controls="Nav_bar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="Nav_bar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php"><img class="img px-1"src="assets/images/dash.png" height="15px" />Dashboard <span class="sr-only">(current)</span></a>
      </li>
   
      <li class="nav-item dropdown text-white">
        <a class="nav-link dropdown-toggle text-white " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img px-1"src="assets/images/users_a.png" height="25px" />Patients</a>
        <div class="dropdown-menu bg-dark " aria-labelledby="dropdown04">

          <a class=" p-1 px-2 text-left text-white" href="add_new_patient.php"><img class="img px-1"src="assets/images/add_user.png" height="20px" /> New Patients </a> <hr color="white">
          <a class=" p-1 px-2 text-left text-white" href="view_patients.php"><img class="img px-1"src="assets/images/view_user.png" height="20px" /> View Patients </a>

        </div>
      </li>

      <li class="nav-item dropdown text-white">
        <a class="nav-link dropdown-toggle text-white " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img px-1"src="assets/images/rupee.png" height="13px" />PayMents</a>
        <div class="dropdown-menu  bg-dark " aria-labelledby="dropdown04">

          <a class=" p-1 px-2 text-white" href="dues.php"><img class="img px-1"src="assets/images/due.png" height="20px" width="40px" /> Dues </a> <br> <hr color="white">
          <a class=" p-1 px-2 text-white" href="paid.php"><img class="img px-1"src="assets/images/right.png" height="20px" /> Paid </a>

        </div>
      </li>


      <li class="nav-item dropdown text-white">
        <a class="nav-link dropdown-toggle text-white " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img px-1"src="assets/images/attendance.png" height="13px" />Attendance</a>
        <div class="dropdown-menu  bg-dark " aria-labelledby="dropdown04">

          <a class=" p-1 px-2 text-white" href="add_check_in.php"><img class="img px-1"src="assets/images/check_in_new.png" height="20px" /> Check Ins </a> <br> <hr color="white">
          <a class=" p-1 px-2 text-white" href="view_check_in.php"><img class="img px-1"src="assets/images/check_in.png" height="20px" /> View Checkins </a>

        </div>
      </li>

      <li class="nav-item text-white">
        <a class="nav-link text-white" href="bulk_sms.php"><img class="img px-1"src="assets/images/sms.png" height="18px" />Send Bulk SMS </a>
      </li>
      <li class="nav-item text-white">
        <a class="nav-link text-white" href="ch_pass.php"><img class="img px-1"src="assets/images/key.png" height="18px" />Change Password </a>
      </li>

      
     

    </ul>
    <div class="nav-item text-white log_out mr-auto">
        <a class="nav-link text-white ml-auto" href="log_out.php"><img class="img px-1"src="assets/images/log_out.png" height="20px" />Log Out </a>
      </div>
  </div>
</nav>
<body background="assets/images/bg.jpeg">
