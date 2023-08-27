<?php
    require 'includes/common.php';
?>
<html lang="en">
    <head>
         <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log in</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
                .row-style{
                    margin-top:100px;
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
                                <h4>Login</h4>
                            </center>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="loginsubmit.php">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control"  placeholder="Email" name="email" required = "true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">                             
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required = "true" pattern=".{8,}">                                    
                                </div>
                                <button type="submit" name="submit" class="btn btn-block"  style="background-color:#008080; color:white;">Login</button>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <p>Don't have an account? <a href="signup.php">Click here to sign up</a></p>
                        </div>
                    </div>
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