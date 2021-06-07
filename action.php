<?php


//Get Vars//

$fname = $_POST['fname'];
$lname = $_POST['lname'];

$gender = $_POST['gender'];

$checkbox = $_POST['check_me'];
$empty_check = "";

//Assigning Each Checck to var
foreach ($checkbox as $check ) {

    $empty_check .= $check." , ";

}


echo "<h3>";
echo "Your Name is ".$fname." ".$lname." <br> Your Are ".$gender;
echo " <br> You've Checked ". $empty_check ;

echo '</h3>';

?>

<style>
        * {
            background-color: rgb(219, 206, 206);
            font-size: larger;
        }

        h3 {
            color: black;
        }
    </style>