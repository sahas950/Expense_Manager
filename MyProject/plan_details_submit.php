<?php

require 'includes/common.php';

//getting title and date as entered by the user.
$title=$_POST['title'];
$from=$_POST['from'];
$to=$_POST['to'];

if($_SESSION['email']==true)
{   
    //getting current user id.
    $user=$_SESSION['email'];
    $query="select id from users where email='$user'";
    $query_submit= mysqli_query($con,$query)  or die(mysqli_error($con));
    $row=mysqli_fetch_array($query_submit);
    $id=$row["id"];
    
    //getting al the person name in current plan as entered by user.
    $query1="select * from new_plan where user_id='$id'";
    $query_submit1= mysqli_query($con,$query1);
    while($row1=mysqli_fetch_array($query_submit1))
    {
        $people=$row1["people"];
        $initial=$row1['initial_budget'];
        if($people>=1)
            $person1=$_POST['person1'];
        else {
            $person1=null;
        }
        if($people>=2)
            $person2=$_POST['person2'];
        else
            $person2=null;
        if($people>=3)
            $person3=$_POST['person3'];
        else {
            $person3=null;
        }
        if($people>=4)
            $person4=$_POST['person4'];
        else {
            $person4=null;
        }
        if($people>=5)
            $person5=$_POST['person5'];
        else {
            $person5=null;
        }
        if($people>=6)
            $person6=$_POST['person6'];
        else {
            $person6=null;
        }
        if($people>=7)
            $person7=$_POST['person7'];
        else {
            $person7=null;
        }
        if($people>=8)
            $person8=$_POST['person8'];
        else {
            $person8=null;
        }
        if($people>=9)
            $person9=$_POST['person9'];
        else {
            $person9=null;
        }
        if($people>=10)
            $person10=$_POST['person10'];
        else {
            $person10=null;
        }
    }
        
        //inserting all the values in new_plan_detail table.
        $user_registration_query = "insert into new_plan_detail (user_id_2,initial_budget,people,title,from_date,to_date,person_1,person_2,person_3,person_4,person_5,person_6,person_7,person_8,person_9,person_10) values ('$id','$initial','$people','$title','$from','$to','$person1','$person2','$person3','$person4','$person5','$person6','$person7','$person8','$person9','$person10')";
        $user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));    
        header('location:home.php');
    
}

   
?>