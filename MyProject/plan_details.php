<?php
   require 'includes/common.php';
   $initial = $_GET['initial'];
   $people= $_GET['people'];
   if($_SESSION['email']==true)
{   
    //getting current user id.
    $user=$_SESSION['email'];
    $query="select id from users where email='$user'";
    $query_submit= mysqli_query($con,$query);
    $row=mysqli_fetch_array($query_submit);
    $id=$row["id"];

    //inserting initial budget,people and user_id(foreign key to id in users table) in new_plan table.
    $user_registration_query = "insert into new_plan(initial_budget,people,user_id) values ('$initial','$people','$id')";
    $user_registration_submit = mysqli_query($con, $user_registration_query) ;   
    $_SESSION['initial']=$initial;
    $_SESSION['id1']=mysqli_insert_id($con);
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New plan</title>
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
                color:white;
            }
            button:hover{
                color:white;
    background-color:#008080;
    border-color:#ac2925;
    
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
        <div class="container">
            <div class="row row-style">
                <div class="col-xs-5 col-xs-offset-3">
                    <div class="panel " style="align-content: center;">                      
                        <div class="panel-body ">                           
                            <form method="post" action="plan_details_submit.php">
                                <div class="form-group col-xs-12">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control"  placeholder="Enter Title (Ex.Trip to Goa)" name="title" required = "true">
                                </div>
                                <div class="form-group form-inline ">                                 
                                    <div class="form-group col-xs-6 ">
                                        <label for="from">From</label><br>
                                        <input type="date" class=" form-control" name="from" min="2019-04-01" max="2019-04-20" required> 
                                    </div>
                                    <div class="form-group ">
                                        <label for="to">To</label><br>
                                        <input type="date" class=" form-control" name="to" min="2019-04-01" max="2019-04-20" required>
                                    </div>          
                                </div>
                                <div class="form-group form-inline ">                                
                                    <div class="form-group col-xs-6">
                                        <label for="initial">Initial Budget</label><br>
                                        <input type='number' class=" form-control" name="initial" placeholder="<?php echo $initial;?>" value="initial"  disabled> 
                                    </div>
                                    <div class="form-group  ">
                                        <label for="people">No. of people</label><br>
                                        <input type="number" class=" form-control" name="people" placeholder="<?php echo $people;?>" value="people" disabled>
                                    </div>          
                                </div>
<?php
    //getting input of number of persons present in current plan.
    for($counter=1;$counter<=$people;$counter++)
    {
?>
                                <div class="form-group col-xs-12">
                                    <label for="name<?PHP echo $counter;?>">Person <?php echo $counter?></label>
                                    <input type="text" class="form-control"  placeholder="Person <?PHP echo $counter;?> Name" name="person<?PHP echo $counter;?>" required = "true">
                                </div>
<?php 
    }
?>
                                <button type="submit" name="submit" class="btn btn-block" >Submit</button>                             
                            </form>
                        </div>        
                    </div><br>
                </div>
            </div>
        </div>
        <!-- Main End -->
        
        <!-- Footer -->
        <?php
            include 'includes/footer.php';
        ?> 
        <!-- Footer End -->
        
    </body>
</html>
