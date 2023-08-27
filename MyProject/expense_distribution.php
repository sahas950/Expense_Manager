<?php
    require 'includes/common.php';    
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View plan</title>
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
    box-shadow:inset 0 3px 5px rgba(0, 0, 0,.125);
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
            if($_SESSION['email']==true)
            {   
                //getting current user id
                $user=$_SESSION['email'];
                $query="select id from users where email='$user'";
                $query_submit= mysqli_query($con,$query)  or die(mysqli_error($con));
                $row=mysqli_fetch_array($query_submit);
                $id=$row["id"];

                if (isset($_GET['id']) && is_numeric($_GET['id'])) {  
                     $id1=$_GET['id'];
                     $_SESSION['id1']=$id1;
                }
                else{
                     $id1=$_SESSION['id1'];
                }
                
                //getting total number of people,title and initial budget
                $query3="select * from new_plan_detail where id='$id1' and user_id_2='$id'";
                $query_submit3= mysqli_query($con,$query3)  or die(mysqli_error($con));
                $row2 = mysqli_fetch_array($query_submit3);
                $people=$row2['people'];
                $title1=$row2['title'];
                $initial1=$row2['initial_budget'];
                $expense=0;
                
                //getting sum of total amount spent in current plan and calculating remaining amount and individual share.
                $query = "SELECT SUM(amount_spent) FROM new_expense where user_id_3='$id1' "; 	 
                $result = mysqli_query($con,$query) or die(mysqli_error($con));
                $row1= mysqli_fetch_array($result);
                $expense=$row1['SUM(amount_spent)']; 
                $rem=$initial1-$expense;
                $share=$expense/$people;
            }
        ?>
        <div class="container">
            <div class="row row-style">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="panel" >                       
                        <div class="panel-heading"  style="background-color:#008080; color:white;">
                            <center>                              
                                <h3><?php echo $title1;?>                          
                                <div class="pull-right"><span class="glyphicon glyphicon-user"></span><?php echo $people;?></div></h3>                          
                            </center>
                        </div>
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <br><b>Initial Budget</b>
                                    <div class="pull-right"> <?php echo '₹'.$initial1;?></div>                             
                                </div>
                                <?php
                                            //getting name of all persons in current plan
                                            for($counter=1;$counter<=$people;$counter++)
                                            { 
                                                if($counter==1)
                                                $person=$row2['person_1'];
                                                else if($counter==2)
                                                    $person=$row2['person_2'];
                                                else if($counter==3)
                                                    $person=$row2['person_3']; 
                                                else if($counter==4)
                                                    $person=$row2['person_4']; 
                                                else if($counter==5)
                                                    $person=$row2['person_5'];
                                                else if($counter==6)
                                                    $person=$row2['person_6'];
                                                else if($counter==7)
                                                    $person=$row2['person_7'];
                                                else if($counter==8)
                                                    $person=$row2['person_8'];
                                                else if($counter==9)
                                                    $person=$row2['person_9'];
                                                else 
                                                    $person=$row2['person_10'];
                                    ?>
                                <div class="form-group">                                     
                                <b><?php echo $person;?></b>
                                <?php 
                                //getting sum of total amount spent by individual person
                                $query2 = "SELECT SUM(amount_spent) FROM new_expense where user_id_3='$id1' and person_name='$person'"; 	 
                                $result2 = mysqli_query($con,$query2) or die(mysqli_error($con));
                                $row3= mysqli_fetch_array($result2);

                                if($row3['SUM(amount_spent)']){
                                $expense1=$row3['SUM(amount_spent)'];
                                }
                                else{
                                    $expense1=0;
                                }

                                ?>
                                    <div class="pull-right" ><?php echo '₹'.$expense1;?></div>                                    
                                </div>
                                <?php }?>
                                <div class="form-group">                                                       
                                    <b>Total Amount Spent</b>
                                    <div class="pull-right"><?php echo '₹'.$expense;?></div>                                    
                                </div>
                                <div class="form-group">
                                    <b>Remaining Amount</b>
                                    <div class="pull-right" style="<?php if($rem>0){?>
                                                                color:green;
                                                                <?php } else if($rem<0){?>
                                                                color:red;
                                                                <?php }else{?>
                                                                color:black;
                                                                <?php }?>" ><?php echo '₹'.$rem;?>
                                    </div>                                    
                                </div>
                                <div class="form-group">
                                    <b>Individual Shares</b>
                                    <div class="pull-right"><?php echo '₹'.$share;?></div>                                    
                                </div>
                                <?php
                                    //getting name of all persons in current plan
                                    for($counter=1;$counter<=$people;$counter++)
                                    { 
                                        if($counter==1)
                                            $person=$row2['person_1'];
                                        else if($counter==2)
                                            $person=$row2['person_2'];
                                        else if($counter==3)
                                            $person=$row2['person_3']; 
                                        else if($counter==4)
                                            $person=$row2['person_4']; 
                                        else if($counter==5)
                                            $person=$row2['person_5'];
                                        else if($counter==6)
                                            $person=$row2['person_6'];
                                        else if($counter==7)
                                            $person=$row2['person_7'];
                                        else if($counter==8)
                                            $person=$row2['person_8'];
                                        else if($counter==9)
                                            $person=$row2['person_9'];
                                        else 
                                            $person=$row2['person_10'];
                                ?>
                                <div class="form-group">
                                    <b><?php echo $person;?></b>
                                    <?php 
                                    
                                    //get sum of expense of particular person
                                    $expense2=0;
                                    $query2 = "SELECT SUM(amount_spent) FROM new_expense where user_id_3='$id1' and person_name='$person'"; 	 
                                    $result2 = mysqli_query($con,$query2) or die(mysqli_error($con));
                                    $row3= mysqli_fetch_array($result2);
                                    $expense2=$row3['SUM(amount_spent)'];
                                    
                                    //calculation of individual share of particuar person.
                                    $individual_share=$share-$expense2;

                                    ?>
                                    <div class="pull-right" style=" <?php //applying proper validation
                                                                    if($individual_share>0){?>
                                                                         color:green;
                                                                    <?php } else if($individual_share<0){?>
                                                                        color:red;
                                                                    <?php }else{?>
                                                                        color:black;
                                                                    <?php }?>" > 
                            <?php 
                            if($individual_share>0){
                                echo 'Gets back ₹'.$individual_share;
                            }
                            else if($individual_share<0){
                                echo 'Owes ₹'.$individual_share;
                            }
                            else{
                                echo 'All Settled Up';
                            }
                            ?>
                                    </div>                             
                                </div>
                            <?php }?>
                            </form>
                            <?php
                            if($_SESSION['email']==true)
                            {   
                                //get number of people and initial budget
                                $query3="select * from new_plan_detail where id='$id1' and user_id_2='$id'";
                                $query_submit3= mysqli_query($con,$query3)  or die(mysqli_error($con));
                                $row2 = mysqli_fetch_array($query_submit3);
                                $people=$row2['people'];
                                $initial1=$row2['initial_budget'];
                                
                                //get id of current plan
                                $query4="select id from new_plan_detail where people='$people' and initial_budget='$initial1' and user_id_2='$id'";
                                $query_submit4= mysqli_query($con,$query4)  or die(mysqli_error($con));
                                $row3=mysqli_fetch_array($query_submit4);
                                $id2=$row3["id"];

                             }
                              ?>
                            <center>
                                <a href="view_plan.php?id=<?php echo $id2;?>"><button type="BUTTON" name="submit" class="btn " ><span class="glyphicon glyphicon-arrow-left"></span>Go Back</button></a>
                            </center> 
                        </div>                        
                    </div><br><br>
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
