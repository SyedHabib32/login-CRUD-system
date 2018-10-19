<?php
  require_once('db.php');
    session_start();
    $user= $_SESSION["user"];
    if(!isset($_SESSION['login'])) {
        header('location: login.php');
         die();
    }

// die("working");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Manipulation</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/metisMenu.min.css" rel="stylesheet">
        <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="css/startmin.css" rel="stylesheet">
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
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
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
                        <h1 class="page-header">ePlanet Visitors</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="col-lg-2">
                        <button type="submit" name="insert" onclick="clickInsert();" class="btn btn-lg btn-success btn-block"> Insert </button>  
                        </div>  
                        <div class="col-lg-2">
                        <button type="submit" name="search" onclick="clickSearch();" class="btn btn-lg btn-success btn-block"> Search </button>  
                        </div> 
                        <div class="col-lg-2">
                        <button type="submit" name="update" class="btn btn-lg btn-success btn-block"> Update </button>  
                        </div>   
                        <div class="col-lg-2">
                        <button type="submit" name="delete" class="btn btn-lg btn-success btn-block"> Delete </button>  
                        </div>    
                    </div>         
                </div>
                <!--For Insert -->
                <div class="row" id="insert" style="display:none;">
                    <div class="col-lg-10 col-lg-offset-1">
                                <fieldset> <br> <br> <br>
                                    <form method="POST" autocomplete="off">
                                        <div class="form-group col-lg-3">
                                            <input class="form-control" placeholder="Name" name="name" type="text" autofocus required>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <input class="form-control" placeholder="CNIC" name="cnic" type="text" required>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <input class="form-control" placeholder="Number" name="number" type="text" required>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <input class="form-control" placeholder="Address" name="address" type="text" required>
                                        </div>
                                        <div class="form-group col-lg-1">
                                        <input type="submit" name="submit1" class="btn btn-lg btn-success btn-block" style="font-size:14px; padding:7px;" value="Insert"/>  
                                        </div>   
                                    </form>
                               </fieldset>
                    </div>
                </div>
                <br><br>
                                     <?php
                                        if(isset($_POST['submit1'])){
                                            $name=$_POST['name'];
                                            $cnic=$_POST['cnic'];
                                            $number=$_POST['number'];
                                            $address=$_POST['address'];
                                       
                                        $sql = "INSERT INTO visitors_info (fname, cnic, phone,addr)
                                        VALUES ('$name','$cnic' ,'$number' ,'$address')";
                                        if (mysqli_query($conn, $sql)) {
                                            echo "<div class='alert alert-success col-lg-6' id='inv'>Data is inserted successfully</div>";
                                        } else {
                                            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                        }
                                        // mysqli_close($conn);
                                        }
                                    ?> 
                <!--For Insert End -->
                 <!--For search -->
                 <div class="row" id="search" style="display:none;">
                    <div class="col-lg-10 col-lg-offset-1">
                            <br> <br>                     
                                    <form method="POST">
                                        <div class="form-group col-lg-3">
                                            <input class="form-control" placeholder="Search By Name" name="name" type="text" autofocus required>
                                        </div>
                                        <div class="form-group col-lg-1">
                                        <button type="submit" name="submit2" class="btn btn-lg btn-success btn-block" style="font-size:14px; padding:7px;"> search </button>  
                                        </div>   
                                    </form>                          
                    </div>
                </div>
                <div class="row" id="showSearch">
                                        <div class="col-lg-10">
                                        <br> <br>
                                        <?php
                                        if(isset($_POST['submit2'])){
                                            $name=$_POST['name'];
                                       
                                        $sql1 = "SELECT * FROM visitors_info WHERE fname = '$name'";
                                        // mysqli_error($conn.$sql1);
                                        // die("working");
                                        if ($result=mysqli_query($conn, $sql1)) {
                                            // echo "<div class='alert alert-success col-lg-6' id='inv'>Data Searched Successfully</div>";
                                            echo "<table class='col-lg-12 text-center' border='2'>
                                            <thead>
                                                <tr>
                                                <th class='text-center' style='padding:10px;'>Name</th>
                                                <th class='text-center'>CNIC</th>
                                                <th class='text-center'>Number</th>
                                                <th class='text-center'>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>";      
                                                if(mysqli_num_rows($result)==0 ){
                                                    echo "<tr><td colspan='4'>No result found</td></tr>";
                                                }else{
                                                    while($row = mysqli_fetch_assoc($result)){
                                                    echo "<tr>
                                                          <td>{$row['fname']}</td>
                                                          <td>{$row['cnic']}</td>
                                                          <td>{$row['phone']}</td>
                                                          <td>{$row['addr']}</td>
                                                          </tr>\n";
                                                    }
                                                }
                                           echo "</tbody>  
                                            </table>";
                                        } else {
                                            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                        }
                                        // mysqli_close($conn);
                                        }
                                ?>     
                                        </div>
                </div>
                <!--For search End -->
                <!--For update -->
                                <div class="row" id="update" style="display:none;">
                    <div class="col-lg-10 col-lg-offset-1">
                                <fieldset> <br> <br>
                                    <form method="POST">
                                        <div class="form-group col-lg-3">
                                            <input class="form-control" placeholder="Name" name="name" type="text" autofocus required>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <input class="form-control" placeholder="CNIC" name="cnic" type="text" required>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <input class="form-control" placeholder="Number" name="number" type="text" required>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <input class="form-control" placeholder="Address" name="address" type="text" required>
                                        </div>
                                        <div class="form-group col-lg-1">
                                        <button type="submit" name="submit3" class="btn btn-lg btn-success btn-block" style="font-size:14px; padding:7px;"> update </button>  
                                        </div>   
                                    </form>                          
                                </fieldset>
                    </div>
                </div>
                <!--For update End -->
                <div class="row" style="display:none;">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                             Tables
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>CNIC</th>
                                                <th>Number</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="center"></td>
                                                <td class="center"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/metisMenu.min.js"></script>
                <script src="js/raphael.min.js"></script>
                <script src="js/morris.min.js"></script>
                <script src="js/morris-data.js"></script>
                <script src="js/startmin.js"></script>
                <script>
                function clickInsert(){
                    document.getElementById("search").style.display="none";
                    document.getElementById("insert").style.display="block";
                    document.getElementById("showSearch").style.display="none";
                    document.getElementById("inv").style.display="none";
                }
                function clickSearch(){
                    document.getElementById("search").style.display="block";
                    document.getElementById("insert").style.display="none";
                    document.getElementById("inv").style.display="none";
                }
                </script>
    </body>
</html>