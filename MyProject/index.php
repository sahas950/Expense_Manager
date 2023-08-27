<?php
    require 'includes/common.php';
?>
<?php
    if (isset($_SESSION['email'])) { header('location:home.php'); }
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
    </head>
    <body>
        
        <!-- Header -->
        <?php
            include 'includes/header.php';
        ?>
        <!-- Header End -->
        
        <!-- Main -->
        <div class="banner-image">
            <div class="inner-banner-image">
                <center>
                    <div class="banner-content">
                        <h1>We help you control your budget</h1>
                        <br>
                        <a class="btn btn-success btn-lg " href="login.php">Start Today</a>
                    </div>
                </center>
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
