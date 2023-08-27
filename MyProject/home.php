<?php
    require 'includes/common.php';   
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
                .row-style{
                    margin-top:75px;
                }
                .xyz{
                    background-color: #f2eded;
                }
             button:link{
                color:black;
            }
         
            button:hover{
                color:white;
                background-color:#008080;
                border-color:#ac2925;
                box-shadow:inset 0 3px 5px rgba(0, 0, 0,.125);
            }
            button{
                color:#008080;
                background-color: white;
            }
        </style>
    </head>
    <body class="xyz">
        
        <!-- Header -->
        <?php
            include 'includes/header.php';
        ?>
        <!-- Header End -->
        
        <!-- Main -->
        <?php
            include 'includes/check_if_added.php';
            //checking if there is any previous plan.
            if(check_if_added())
            {
                if($_SESSION['email']==true)
                {   
                    //getting current user id.
                    $user=$_SESSION['email'];
                    $query="select id from users where email='$user'";
                    $query_submit= mysqli_query($con,$query)  or die(mysqli_error($con));
                    $row=mysqli_fetch_array($query_submit);
                    $id=$row["id"];
                    $query1="select id1 from new_plan where user_id='$id'";
                    $query_submit1= mysqli_query($con,$query1) or die(mysqli_error($con));
                    $row=mysqli_fetch_array($query_submit);
                    $id1=$row["id1"];
                }
                
                //getting all the required information for all the plans of current user.
                $query2="select * from new_plan_detail where user_id_2='$id'" ;
                $query_submit2= mysqli_query($con,$query2) or die(mysqli_error($con));  
        ?>     
        <div class="container">
            <div class="row row-style" >
                <h1 >Your Plans</h1><br>
<?php
     //displaying all the plans of current user(if any).
    while($row2 = mysqli_fetch_array($query_submit2)) 
    {   
        $people=$row2['people'];
        $initial1=$row2['initial_budget'];
        $from= date_format(date_create($row2['from_date']),"jS M");
        $to=date_format(date_create($row2['to_date']),"jS M Y");
        $query3="select * from new_plan_detail where people='$people' and initial_budget='$initial1' and user_id_2='$id'";
        $query_submit3= mysqli_query($con,$query3)  or die(mysqli_error($con));
        $row3=mysqli_fetch_array($query_submit3);
        $id2=$row3["id"];
        $title=$row3['title'];
?>            
                <div class="col-xs-3">             
                    <div class="panel" >                       
                        <div class="panel-heading"  style="background-color:#008080; color:white;">
                            <center>                              
                                <h3><?php echo $title;?>                          
                                <div class="pull-right">  <span class="glyphicon glyphicon-user"></span><?php echo $people;?></div></h3>  
                            </center>
                        </div>
                        <div class="panel-body">
                            <form method="get" action="view_plan.php">
                                <div class="form-group">
                                    <br><b>Budget</b>
                                    <div class="pull-right"><?php echo '₹'.$initial1;?></div>                            
                                </div>
                                <div class="form-group">
                                    <b>Date</b>
                                    <div class="pull-right"><?php echo $from."-".$to;?></div>
                                </div>                            
                                <a href="view_plan.php?id=<?php echo $id2;?>" ><button  type="BUTTON" name="submit" class="btn btn-block" style="border:solid;">View Plan</button></a>
                            </form>
                        </div>                        
                    </div>
                </div>
<?php           
    }
?>         
            </div>       
        </div>
        <a href="create_new_plan.php"> <h1  style="position:fixed; bottom:0; padding-bottom: 50px; padding-left:1320px"><span class="glyphicon glyphicon-plus-sign" style="color:green;" ></span></h1></a>
<?php        
}
else {
?>       
        <h2  class='space'>You don't have any active plans</h2>
        <div class="container">
            <div class="row row-style">                
                <div class="col-xs-4 col-xs-offset-4">                  
                    <div class="box">
                        <a href="create_new_plan.php">    
                            <center>
                                <span class = "glyphicon glyphicon-plus-sign " ></span>Create a New Plan
                            </center>
                        </a>
                    </div>     
                </div>
            </div>
        </div>
<?php
}
?>
    <!-- Main End -->    
        
    <!-- Footer -->    
        <?php
            include 'includes/footer.php';
        ?>
    <!-- Footer End -->
    
    </body>   
</html>