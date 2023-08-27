<?php
    require 'includes/common.php';
    
    //getting old password and encrypting it.
    $password = $_POST['password'];
    $password = mysqli_real_escape_string ($con , $password);
    $password = md5($password);
    
    //getting new password and encrypting it.
    $password1 = $_POST['password1'];
    $password1 = mysqli_real_escape_string ($con , $password1);
    $password1 = md5($password1);
    
    //getting re-typed password and encrypting it.
    $password2 = $_POST['password2'];
    $password2 = mysqli_real_escape_string ($con , $password2);
    $password2 = md5($password2);
    
    $email = $_SESSION['email'];
    
    //getting old password from database.
    $select_query="SELECT password FROM users WHERE email='$email' and Password='$password'";
    $select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($select_query_result);
    if ($rows > 0 && $password1==$password2){
    
    //updating new password.
    $select_query1="update users set password='$password1' where email='$email'";
    $select_query_result1=mysqli_query($con,$select_query1) or die(mysqli_error($con));
    echo "<script>alert('Password Changed')</script>";
    echo ("<script>location.href='home.php'</script>");
    
}else{
        echo "<script>alert('Invalid Credentials')</script>";
       echo ("<script>location.href='settings.php'</script>");
    }


?>
