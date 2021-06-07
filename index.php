<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- LINK CSS -->

    <link rel="stylesheet" href="assets/style/bootstrap.css">
    <link rel="stylesheet" href="assets/style/custom.css">
    <link rel="icon" href="assets/images/logo.png" type="image/gif" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!-- Bootstrap CSS -->
<!-- Meta TAGS -->
<meta name="description" content="INSHA PHYSIOTHERAPY CENTER, DSK Solutions Kubeer Pvt. Ltd. Ask Here For Tech And Music Solutions. Home Page | Dj Sai Kubeer Softwares And Worlds Pvt. Ltd., Any Technical And Music Issue Solutions"/>
<meta name="author" content="Sainath Sapa"/>
<meta name="copyright" content="Dj Sai Kubeer Softwares And Worlds Pvt. Ltd. All Rights Reserved."/>
<meta name="robots" content="index,follow"/>
<meta name="googlebot" content="index,follow"/>
<title> Login | DSK Solutions Pvt. Ltd. 2020 | Management Software </title>


</head>

<body class="container" background="assets/images/bg.jpeg">
<br> <br> 
<div class="col-md col-md-12 col-sm col-sm-12">
<div class="row"> 

<div class="col-md col-md-6 col-sm-6">
<h4 class="text-left mr-3">Reg. No. PR232</h4>

</div>


<div class="col-md col-md-6 col-sm-6">
<h4 class="text-right mr-3">Mobile : 8802786248</h4>

</div>

 </div>
</div>
<br>

    <h1 class="text-center head_line "> INSHA PHYSIOTHERAPY CENTER</h1>
    <h3 class="text-left mr-3">- Dr. Abdul Kadir</h3>
    <h5 class="text-left mr-3">     <i>BPT, MIAP <br> Fitness  Consultation </i> </h5>
    <br>
    <div class="m-auto text-center  card py-4 px-5 col-md col-md-5 col-sm col-sm-12">
        <h2>Login</h2> <br>
         <?php if(isset($_GET['log'])) { if($_GET['log']=='suc') { echo "<h5 class='bg-success px-5 card' > Logged Out Succesfully </h5>";}} ?> 
        <form class="form form_control" action="login_process.php" method="POST">
            <input class="form-control" type="text" name="username" placeholder="Username" required>
            <br>
            <input class="form-control" type="password" name="password" placeholder="Password" required>
            <br>
            <?php 

            if(isset($_GET['err']))
            {
                if($_GET['err']=="invalid")
                {
                    echo "
                    <div class='btn-danger py-1'>
                    Enter Correct Details
                    </div> <br>
                    ";
                }

            }
            ?>

            <input type="submit" class="btn btn-lg btn-success btn-block" name="Login" value="Login">
        </form>
    </div>
</body>

<!-- LINK JS -->
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<a class="copy" href="add_new.html"><font color="black">Designed By DSK Solutions Pvt. Ltd. 2020</font></a>

</html>