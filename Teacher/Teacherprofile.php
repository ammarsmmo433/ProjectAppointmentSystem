<?php
session_start();
include_once '../assets/conn/dbconnect.php';
// include_once 'connection/server.php';
if(!isset($_SESSION['teacherSession']))
{
header("Location: ../index.php");
}
$usersession = $_SESSION['teacherSession'];
$res=mysqli_query($con,"SELECT * FROM Teacher WHERE TeacherId=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);


if (isset($_POST['submit'])) {
//variables
$tFirstName = $_POST['FirstName'];
$tLastName = $_POST['LastName'];
$tPhone = $_POST['Phone'];
$tEmail = $_POST['Email'];
$tAddress = $_POST['Address'];

$res=mysqli_query($con,"UPDATE Teacher SET FirstName='$tFirstName', LastName='$tLastName', Phone='$tPhone', Email='$tEmail', Address='$tAddress' WHERE TeacherId=".$_SESSION['teacherSession']);
// $userRow=mysqli_fetch_array($res);

header( 'Location: Teacherprofile.php' ) ;

}





?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome Dr <?php echo $userRow['FirstName'];?> <?php echo $userRow['LastName'];?></title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
        <link href="assets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">
        <link href="assets/css/time/bootstrap-clockpicker.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
        <!-- Custom Fonts -->
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Teacherdashboard.php"><img alt="Brand" src="../assets/img/logo-white-1.png" style="margin-top: -20px;height: 70px;"></a>
                    <a class="navbar-brand" href="Teacherdashboard.php">Welcome Dr <?php echo $userRow['FirstName'];?> <?php echo $userRow['LastName'];?></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['FirstName']; ?> <?php echo $userRow['LastName']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="Teacherprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                           
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                         <li>
                            <a href="Teacherdashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="addschedule.php"><i class="fa fa-fw fa-table"></i> Teacher Schedule</a>
                        </li>
                        <li>
                            <a href="Studentlist.php"><i class="fa fa-fw fa-edit"></i> Student List</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <!-- navigation end -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                            Teacher Profile
                            </h2>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-calendar"></i> Teacher Profile
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- Page Heading end-->

                    <!-- panel start -->
                    <div class="panel panel-primary">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Teacher Details</h3>
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body">
                        <!-- panel content start -->
                          <div class="container">
            <section style="padding-bottom: 50px; padding-top: 50px;">
                <div class="row">
                    <!-- start -->
                    <!-- USER PROFILE ROW STARTS-->
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            
                            <div class="user-wrapper">
                                <img src="assets/img/3.jpg" class="img-responsive" />
                                <div class="description">
                                    <h4><?php echo $userRow['FirstName']; ?> <?php echo $userRow['LastName']; ?></h4>
                                    <h5> <strong> Teacher </strong></h5>
                                    
                                    <hr />
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Profile</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-9 col-sm-9  user-wrapper">
                            <div class="description">
                                <h3> <?php echo $userRow['FirstName']; ?> <?php echo $userRow['LastName']; ?> </h3>
                                <hr />
                                
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        
                                        
                                        <table class="table table-user-information" align="center">
                                            <tbody>
                                                
                                                
                                                <tr>
                                                    <td>Teacher ID</td>
                                                    <td><?php echo $userRow['TeacherId']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>IC Number</td>
                                                    <td><?php echo $userRow['icTeacher']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td><?php echo $userRow['Address']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Number</td>
                                                    <td><?php echo $userRow['Phone']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo $userRow['Email']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Birthdate</td>
                                                    <td><?php echo $userRow['DOB']; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- USER PROFILE ROW END-->
                    <div class="col-md-4">
                        
                        <!-- Large modal -->
                        
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="<?php $_PHP_SELF ?>" method="post" >
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td>IC Number:</td>
                                                        <td><?php echo $userRow['icTeacher']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>First Name:</td>
                                                        <td><input type="text" class="form-control" name="FirstName" value="<?php echo $userRow['FirstName']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name</td>
                                                        <td><input type="text" class="form-control" name="LastName" value="<?php echo $userRow['LastName']; ?>"  /></td>
                                                    </tr>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <tr>
                                                        <td>Phone number</td>
                                                        <td><input type="text" class="form-control" name="Phone" value="<?php echo $userRow['Phone']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input type="text" class="form-control" name="Email" value="<?php echo $userRow['Email']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td><textarea class="form-control" name="Address"  ><?php echo $userRow['Address']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="submit" name="submit" class="btn btn-info" value="Update Info"></td>
                                                        </tr>
                                                    </tbody>
                                                    
                                                </table>
                                                
                                                
                                                
                                            </form>
                                            <!-- form end -->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br /><br/>
                        </div>
                        
                    </div>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>
                    <!-- panel start -->

                </div>
            </div>
        <!-- /#wrapper -->


       
        <!-- jQuery -->
        <script src="../Student/assets/js/jquery.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="../Student/assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-clockpicker.js"></script>
        <!-- Latest compiled and minified JavaScript -->
         <!-- script for jquery datatable start-->
        <!-- Include Date Range Picker -->
    </body>
</html>