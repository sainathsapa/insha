<?php
session_start();

if(!isset($_POST['Login']))
{
    echo "Failed to Login";
}

else {
    require('inc/db.php');


    $username = $_POST['username'];
    $pwd= $_POST['password'];

  
$qry2="SELECT * FROM admin";
$rslt = $db->query($qry2);


while($row= $rslt->fetchArray(SQLITE3_ASSOC))
{
    if(!(($username==$row['username']) && ($pwd==$row['password'])))
    {
        echo "invalid login";

        echo " <script> location.replace('index.php?err=invalid'); </script>";
        exit;





    }

    else
    {
        
        $_SESSION["admin_id"]= $row['id'];
        header("location: welcome.php");

    }
}


}


?>


