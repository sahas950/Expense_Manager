<?php
    require 'includes/common.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> New Plan</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
                .row-style{
                    margin-top:100px;
            }
                .xyz{
                background-color:  #f2eded;
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
        <div class="container">
            <div class="row row-style">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel  " >
                        <div class="panel-heading" style="background-color:#008080; color:white;">
                            <center>
                                <h4>Create New Plan</h4>
                            </center>
                        </div>
                        <div class="panel-body" >
                            <form method="get" action="plan_details.php">
                                <div class="form-group">
                                    <label for="initial">Initial Budget</label>
                                    <input type="number" class="form-control"  placeholder="Initial Budget(Ex.4000)" name="initial" required = "true" >              
                                </div>
                                <div class="form-group">
                                    <label for="people">How many peoples you want to add in your group?</label>
                                    <input type="number" class="form-control" placeholder="No. of people (max 10 people)" min="1" max="10" name="people" required = "true">                                   
                                </div>
                                <button type="submit" name="next" class="btn btn-block ">Submit</button>
                            </form>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Main End --> `
        
        <!-- Footer -->
        <?php
            include 'includes/footer.php';
        ?>
        <!-- Footer End -->
        
    </body>
</html>