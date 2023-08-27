<?php
    require 'includes/common.php';
    
    //getting all the details as entered by the user in the form.
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($con , $email);

    $password = $_POST['password'];
    $password = mysqli_real_escape_string($con , $password);
    $password = md5($password);   
    
    //checking all the required credentials.
    $select_query="SELECT * FROM users WHERE Email='$email' and Password='$password'";
    $select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
    if (mysqli_num_rows($select_query_result) == 0)
    {    
        echo "<script>alert('Invalid Credentials')</script>";
        echo ("<script>location.href='login.php'</script>");      
    }
    else 
    {    
        mysqli_fetch_array($select_query_result);
        $_SESSION['email']=$email;
        $_SESSION['id']=mysqli_insert_id($con);
        header('location: home.php');
    }

?>