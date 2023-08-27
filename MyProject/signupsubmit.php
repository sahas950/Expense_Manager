<?php
    require 'includes/common.php';
    
    //getting all the details as entered by the user in form.
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($con , $name);

    $email = $_POST['email'];
    $email = mysqli_real_escape_string($con , $email);

    $password = $_POST['password'];
    $password = mysqli_real_escape_string($con , $password);
    $password = md5($password);

    $phone = $_POST['phone'];
    $phone = mysqli_real_escape_string($con , $phone);
    
    //required format.
    $email_regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    $contact_regex = "/^[789][0-9]{9}$/";
    
    //checking if the email id is already present.
    $select_query = "SELECT * from users WHERE email = '$email'";
    $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
    $select_rows = mysqli_num_rows($select_query_result);
    
    //checking all the required credentials.
    if($select_rows!=0){
        
       echo "<script>alert('E-mail already exist.')</script>";
       echo ("<script>location.href='signup.php'</script>");
       
    }else if(!preg_match($email_regex , $email)){
        
       echo "<script>alert('Incorrect E-mail ID.')</script>";
       echo ("<script>location.href='signup.php'</script>");
        
    }else if(!preg_match($contact_regex , $phone )){
        
       echo "<script>alert('Incorrect Contact Number.')</script>";
       echo ("<script>location.href='signup.php'</script>");
        
    }
 else {
     
    //inserting all the values in users table. 
    $user_registration_query = "insert into users(email,name,password,phone) values ('$email','$name','$password','$phone')";
    $user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
    mysqli_insert_id($con);
    $_SESSION['email']=$email;
    $_SESSION['id']=mysqli_insert_id($con);
    header('location:home.php');

}


?>



