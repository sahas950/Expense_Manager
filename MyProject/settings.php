<?php
    require 'includes/common.php';
?>
<?php
    if (!isset($_SESSION['email'])) { header('location:index.php'); }
?>

<html lang="en">
    <head>
         <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Expense Manager</title>
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
        
        <!-- Header  -->
        <?php
        include 'includes/header.php';
        ?>
        <!-- Header End -->
        
        <!-- Main -->
        <div class="container">
            <div class="row row-style">
                <div class="col-xs-4 col-xs-offset-4">
                    <div class="panel panel-default" >
                        <div class="panel-heading" style="background-color:#008080; color:white;">
                            <center>
                                <h4>Change Password</h4>
                            </center>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="settingssubmit.php">
                                <div class="form-group">
                                    <label for="password">Old Password</label>
                                    <input type="password" class="form-control" placeholder="Old Password" name="password" required = "true" pattern=".{8,}">                                   
                                </div>
                                <div class="form-group">
                                    <label for="password1">New Password</label>
                                    <input type="password" class="form-control" placeholder="New Password(Mn. 8 characters)" name="password1" required = "true" pattern=".{8,}">                                    
                                </div>
                                 <div class="form-group">
                                    <label for="password2">Confirm New Password</label>
                                    <input type="password" class="form-control" placeholder="Re-type New Password" name="password2" required = "true" pattern=".{8,}">                                    
                                </div>                                
                                <button type="submit" name="submit" class="btn btn-block" style="background-color:#008080; color:white;">Change</button>
                            </form>
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