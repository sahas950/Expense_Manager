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
            if($_SESSION['email']==true)
            {   
                //getting current user id.
                $user=$_SESSION['email'];
                $query="select id from users where email='$user'";
                $query_submit= mysqli_query($con,$query)  or die(mysqli_error($con));
                $row=mysqli_fetch_array($query_submit);
                $id=$row["id"];
                if(isset($_GET['id']) && is_numeric($_GET['id'])) 
                {  
                    $id1=$_GET['id'];
                    $_SESSION['id1']=$id1;
                }
                else{
                    $id1=$_SESSION['id1'];
                }
                //getting title,total number of people,initial budget and date.
                $query3="select * from new_plan_detail where id='$id1' and user_id_2='$id'";
                $query_submit3= mysqli_query($con,$query3)  or die(mysqli_error($con));
                $row2 = mysqli_fetch_array($query_submit3);
                $people=$row2['people'];
                $title=$row2['title'];
                $initial1=$row2['initial_budget'];
                $from= date_format(date_create($row2['from_date']),"jS M");
                $from1=$row2['from_date'];
                $to=date_format(date_create($row2['to_date']),"jS M Y");
                $to1=$row2['to_date'];
                
                //getting sum of total amount spent and calculating remaining budget.
                $expense=0;
                $query = "SELECT SUM(amount_spent) FROM new_expense where user_id_3='$id1' "; 	 
                $result = mysqli_query($con,$query) or die(mysqli_error($con));
                $row1= mysqli_fetch_array($result);
                $expense=$row1['SUM(amount_spent)'];
                $rem=$initial1-$expense;
            }
        ?>   
        <div class="container">
            <div class="row row-style" >
                <div class="col-xs-6">
                    <div class="panel" >                      
                        <div class="panel-heading"  style="background-color:#008080; color:white;">
                            <center>                              
                                <h3><?php echo $title;?>                          
                                <div class="pull-right">  <span class="glyphicon glyphicon-user"></span><?php echo $people;?></div></h3>                          
                            </center>
                        </div>
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <br><b>Budget</b>
                                    <div class="pull-right"> <?php echo '₹'.$initial1;?></div>                             
                                </div>
                                <div class="form-group">
                                    <b>Remaining Amount</b>
                                    <div class="pull-right" style=" <?php if($rem>0){?>
                                                                        color:green;
                                                                    <?php } else if($rem<0){?>
                                                                        color:red;
                                                                    <?php }else{?>
                                                                        color:black;
                                                                    <?php }?>" ><?php echo '₹'.$rem;?>
                                    </div>                                    
                                </div>
                                <div class="form-group">
                                    <b>Date</b>
                                    <div class="pull-right"> <?php echo $from.'-'.$to;?></div>                             
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
                <div class="col-xs-6">
                    <center>
                        <a href="expense_distribution.php?id=<?php echo $id1;?>"><button type="BUTTON" name="submit" class="btn btn-lg row-style" style="border:solid; " >Expense Distribution</button></a>
                    </center>
                </div>
            </div>
            <div class="row">              
<?php
    //checking and displaying all the expenses in current plan
    //getting current user id.
    $user=$_SESSION['email'];
    $query="select id from users where email='$user'";
    $query_submit= mysqli_query($con,$query);
    $row=mysqli_fetch_array($query_submit);
    $id=$row["id"];
    
    //checking if there is any expense present or not.
    $user_registration_query = "SELECT * FROM new_expense WHERE user_id_3='$id1' ";
    $user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));                                
                               
    if(mysqli_num_rows($user_registration_submit)>= 1){
        
        $query2="select * from new_expense where user_id_3='$id1'" ;
        $query_submit2= mysqli_query($con,$query2) or die(mysqli_error($con)); 
        
    while($row3 = mysqli_fetch_array($query_submit2)) {
        
        $amount=$row3['amount_spent'];
        $person=$row3['person_name'];
        $date=date_format(date_create($row3['date']),"jS M Y");
        $title1=$row3['title'];
        
?>          
                <div class="col-xs-3">               
                    <div class="panel" >                     
                        <div class="panel-heading"  style="background-color:#008080; color:white;">
                            <center>                              
                                <h3><?php echo " "."'".$title1."'";?></h3>   
                            </center>
                        </div>
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <br><b>Amount</b>
                                    <div class="pull-right"><?php echo '₹'.$amount;?></div>                  
                                </div>
                                <div class="form-group">
                                    <b>Paid by</b>
                                    <div class="pull-right"><?php echo $person;?></div>           
                                </div>
                                <div class="form-group">
                                    <b>Paid on</b>
                                    <div class="pull-right"><?php echo $date;?></div>          
                                </div>
<?php         if($bill1=$row3['bill']){
?>
                                <center>
                                    <a href="<?php echo $bill1;?>" target="_blank"> <p>show bill</p></a>
                                </center>
<?php 
}
else{
?>
                                <center>
                                    <p style='color:#337ab7;'>You Don't have any bill</p>
                                </center> 
<?php }?>
                            </form>
                        </div>                       
                    </div>
                </div>
<?php         
        }
    }
?>                  
                <div class=" col-xs-4" style="float:right;">
                    <div class="panel" > 
                        <div class="panel-heading"  style="background-color:#008080; color:white;">
                            <center>                              
                                <h3>Add New Expense</h3>                          
                            </center>
                        </div>
                        <div class="panel-body ">                   
                            <form method="post" action="expense_submit.php?id2=<?php echo $id1;?>" enctype='multipart/form-data'>
                                <div class="form-group ">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control"  placeholder="Expense Name" name="title" required = "true">
                                </div>
                                <div class="form-group ">
                                    <label for="date">Date</label>
                                    <input type="date" class=" form-control" name="date" min="<?php echo $from1;?>" max="<?php echo $to1;?>" required>
                                </div>     
                                <div class="form-group ">
                                    <label for="spent">Amount Spent</label>
                                    <input type='number' class=" form-control" name="spent" placeholder="Amount Spent" required> 
                                </div>
                                <div class="form-group">                                               
                                    <select class='form-control' name="person" required>
                                        <option value="1">Choose</option>
                                        <?php
                                            //getting name of all persons in current plan.
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
                                        <option value="<?php echo $person;?>"><?php  echo $person;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>               
                                <div class="form-group">
                                    <label for="uploadedimage">Upload Bill</label>
                                    <input type = "file" class = "form-control" name="uploadedimage" /> 
                                </div>
                                <button type="submit" name="submit" class="btn btn-block xyz" >Add</button>
                            </form>                       
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