<?php
    function check_if_added()
    {   
        //connection to the database.
        $con = mysqli_connect("localhost","root","","expense_manager") or die(mysqli_error($con));
        if($_SESSION['email']==true)
        {
            //getting current user id.
            $user=$_SESSION['email'];
            $query="select id from users where email='$user'";
            $query_submit= mysqli_query($con,$query);
            $row=mysqli_fetch_array($query_submit);
            $id=$row["id"];

            //checking if any previous plan is present or not.
            $user_registration_query = "SELECT * FROM new_plan WHERE user_id='$id'";
            $user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));                                

        if(mysqli_num_rows($user_registration_submit)>= 1){
            return 1;
        }
        else{
                return 0;
            }
        }
    }
?>
