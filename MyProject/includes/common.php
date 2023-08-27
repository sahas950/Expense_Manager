<?php
    
    //connection to the database and starting the session.
    $con = mysqli_connect("localhost","root","","expense_manager") or die(mysqli_error($con));
    session_start();

?>
