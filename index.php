<?php
    session_start();
    $user= $_SESSION["user"];
    if(!isset($_SESSION['login'])) {
        header('location: login.php');
         die();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Main Page</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/metisMenu.min.css" rel="stylesheet">
        <link href="css/timeline.css" rel="stylesheet">
        <link href="css/startmin.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">CRUD Operation System</a>
                </div>


                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $user; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout </a>
                            </li>
                        </ul>
                    </li>
                </ul>
               

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse"> <br>
                        <ul class="nav" id="side-menu">
                            <li style="padding-top: 75px;">
                                <a href="tables.php"><i class="fa fa-table fa-fw"></i> Tables</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Welcome to CRUD System!</h1>
                    </div>
                </div>
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/metisMenu.min.js"></script>
                <script src="js/raphael.min.js"></script>
                <script src="js/startmin.js"></script>
    </body>
</html>
