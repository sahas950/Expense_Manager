<?php
    require 'includes/common.php';
    
    //getting title,amount spent,date and person name entered by user.
    $title=$_POST['title'];
    $spent=$_POST['spent'];
    $date=$_POST['date'];
    $person=$_POST['person'];


if($_SESSION['email']==true)
{       
        //getting current user id.
        $user=$_SESSION['email'];
        $query="select id from users where email='$user'";
        $query_submit= mysqli_query($con,$query)  or die(mysqli_error($con));
        $row=mysqli_fetch_array($query_submit);
        $id=$row["id"];
        
        //getting total number of people and initial budget from new_plan_detail table.
        $id1=$_SESSION['id'];
        $query3="select * from new_plan_detail where id='$id1' and user_id_2='$id'";
        $query_submit3= mysqli_query($con,$query3)  or die(mysqli_error($con));
        $row2 = mysqli_fetch_array($query_submit3);
        $people=$row2['people'];
        $initial1=$row2['initial_budget'];
        
        //getting current plan id.
        if (isset($_GET['id2']) && is_numeric($_GET['id2'])) {  
             $id2=$_GET['id2'];
             $_SESSION['id3']=$id2;
        }
        else{
             $id2=$_SESSION['id3'];
        }
}
//function and code for file(bill) upload functionality.
function GetImageExtension ($imagetype){
        if ( empty ($imagetype)) return false ;
        switch ($imagetype){
        case 'image/bmp' : return '.bmp' ;
        case 'image/gif' : return '.gif' ;
        case 'image/jpeg' : return '.jpg' ;
        case 'image/png' : return '.png' ;
        default : return false ;
        }
 }
if (!empty($_FILES[ "uploadedimage" ][ "name" ])) {
    $file_name=$_FILES[ "uploadedimage" ][ "name" ];
    $temp_name=$_FILES[ "uploadedimage" ][ "tmp_name" ];
    $imgtype=$_FILES[ "uploadedimage" ][ "type" ];
    $ext= GetImageExtension($imgtype);
    $imagename=date( "d-m-Y" ). "-" .time().$ext;
    $target_path = "img/".$imagename;
    if (move_uploaded_file($temp_name, $target_path)){
        echo "<script>alert('Bill successfully uploaded...')</script>";
    }
}  
    
    //inserting all the values in new_expense table.
    $user_registration_query = "insert into new_expense (user_id_3,title,date,amount_spent,person_name,bill) values('$id2','$title','$date','$spent','$person','$target_path')";
    $user_registration_submit = mysqli_query($con,$user_registration_query) or die(mysqli_error($con)); 
    $_SESSION['title']=$title;
    header('location:view_plan.php'); 
?>