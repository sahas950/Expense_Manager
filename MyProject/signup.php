<?php
    require 'includes/common.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign up</title>
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
                <div class="col-xs-4 col-xs-offset-4">
                    <div class="panel " >
                        <div class="panel-heading"  style="background-color:#008080; color:white;">
                            <center>
                                <h4>Sign Up</h4>
                            </center>
                        </div>
                        <div class="panel-body">                            
                            <form method="POST" action="signupsubmit.php">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="name" class="form-control"  placeholder="Name" name="name" required = "true">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control"  placeholder="Enter Valid Email" name="email" required = "true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">                               
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password (min. 8 characters)" name="password" required = "true">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control" placeholder="Enter Valid Phone Number (Ex.8484487452)" name="phone" maxlength="10" required = "true" pattern=".{10,}">                                
                                </div>
                                <button type="submit" name="submit" class="btn btn-block"  style="background-color:#008080; color:white;">Sign Up</button>
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