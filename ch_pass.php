<?php
require('inc/nav.php');

if(isset($_POST['submit']))
{
    $new_pwd=$_POST['new_pwd'];
    $repeat_pwd = $_POST['repeat_pwd'];
    if($new_pwd!=$repeat_pwd)
    {
        echo "
        <script>
        location.href = 'ch_pass.php?pass=not_match';
    
        </script>
        ";
        
    }
    else
    {

        $current_pass=$_POST['current_pwd'];


        $admin_id=$_SESSION['admin_id'];
        $qry_pwd_fetch="SELECT password FROM admin WHERE id=$admin_id";
        $qry_exe_pwd=$db->query($qry_pwd_fetch);
        $db_pwd=$qry_exe_pwd->fetchArray();

        if($current_pass==$db_pwd['password'])
        {
                $pwd_update="UPDATE admin SET 'password'='$new_pwd' WHERE id=$admin_id";
                $qry_update_pwd=$db->query($pwd_update);
                if($qry_update_pwd)
                {
                   
                    echo "
                    <script>
                    location.href = 'ch_pass.php?pass=changed';
                
                    </script>
                    ";
                }
        }
        else
        {
            echo "
            <script>
            location.href = 'ch_pass.php?pass=db_not';
        
            </script>
            ";

        }

    }

    
}


?>
<br>

<form class="form py-5 container box-shadow_form card p-4 table-bordered" action="#" method="POST">
    <h1>Change Password</h1>
    <?php 
    if(isset($_GET['pass']))
    {
        if($_GET['pass']=='not_match')
        {
            echo "<div class='bg-danger text-white p-2 card'> Please Repeat Same Password in Two Fields</div>";
        }

        if($_GET['pass']=='db_not')
        {
            echo "<div class='bg-danger text-white p-2 card'> Please Enter Correct Current Password</div>";
        }


        if($_GET['pass']=='changed')
        {
            echo "<div class='bg-success text-white p-2 card'> Succesfully Changed </div>";
        }
        

    }
    ?>
    <hr>
<div class="row">
    <div class="col-md col-md-6">
            <label class="label form" for="current_pwd"><b>Current Password: </b></label> <br>
            <input class="form-control " type="password" name="current_pwd" placeholder="Current Password"
                 required> <br> <br>
                 <label class="label form" for="new_pwd"><b>Enter New Password: </b></label> <br>
            <input class="form-control " type="password" name="new_pwd" placeholder="New Password"
                 required>
                 <label class="label form" for="repeat_pwd"><b>Current Password: </b></label> <br>
            <input class="form-control " type="password" name="repeat_pwd" placeholder="Repeat Password"
                 required> <br>
                 <br>
                 <input class="btn btn-lg btn-primary" type="submit" name="submit" value="submit">

        </div>
        </div>
    </form>

