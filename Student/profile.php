<?php
session_start();
// include_once '../connection/server.php';
include_once '../assets/conn/dbconnect.php';
if(!isset($_SESSION['studentSession']))
{
header("Location: ../index.php");
}
$res=mysqli_query($con,"SELECT * FROM Student WHERE icStudent=".$_SESSION['studentSession']);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
//variables
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$DOB = $_POST['DOB'];
$Gender = $_POST['Gender'];
$Address = $_POST['Address'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];
$Id = $_POST['StudentId'];
// mysqli_query("UPDATE blogEntry SET content = $udcontent, title = $udtitle WHERE id = $id");
$res=mysqli_query($con,"UPDATE Student SET FirstName='$FirstName', LastName='$LastName', Gender='$Gender', Address='$Address', Phone=$Phone, Email='$Email', DOB='$DOB' WHERE icStudent=".$_SESSION['studentSession']);
// $userRow=mysqli_fetch_array($res);
header( 'Location: profile.php' ) ;
}
?>
<?php
$male="";
$female="";
if ($userRow['Gender']=='male')
{
$male = "checked";
}
elseif ($userRow['Gender']=='female') 
{
$female = "checked";
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Make Appoinment</title>
	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
	<link href="assets/css/material.css" rel="stylesheet">
	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
	<!--Font Awesome (added because you use icons in your prepend/append)-->
	<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
	<link href="assets/css/default/style.css" rel="stylesheet">
	<link href="assets/css/default/blocks.css" rcel="stylesheet">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />
	</head>
	<body>
		
		<!-- navigation -->
		<nav class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
                    <a class="navbar-brand" href="Student.php"><img alt="Brand" src="../assets/img/logo-white-1.png" style="margin-top: -20px;height: 60px;"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<ul class="nav navbar-nav">
							<li><a href="Student.php">Home</a></li>
							<li><a href="profile.php?studentId=<?php echo $userRow['icstudent']; ?>" >Profile</a></li>
							<li><a href="Studentapplist.php?studentId=<?php echo $userRow['icstudent']; ?>">Appointment</a></li>
						</ul>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['FirstName']; ?> <?php echo $userRow['LastName']; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="profile.php?studentId=<?php echo $userRow['icstudent']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
								</li>
								<li>
									<a href="Studentapplist.php?studentId=<?php echo $userRow['icstudent']; ?>"><i class="fa fa-file"></i> Appointment</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="Studentlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>		<!-- navigation -->
		
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
									<h5> <strong> Student </strong></h5>
									<p>
										Final project.
									</p>
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
													<td>DOB</td>
													<td><?php echo $userRow['DOB']; ?></td>
												</tr>
												<tr>
													<td>Gender</td>
													<td><?php echo $userRow['Gender']; ?></td>
												</tr>
												<tr>
													<td>Address</td>
													<td><?php echo $userRow['Address']; ?>
													</td>
												</tr>
												<tr>
													<td>Phone</td>
													<td><?php echo $userRow['Phone']; ?>
													</td>
												</tr>
												<tr>
													<td>Email</td>
													<td><?php echo $userRow['Email']; ?>
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
					<!-- end -->
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
														<td><?php echo $userRow['icStudent']; ?></td>
													</tr>
													<tr>
														<td>First Name:</td>
														<td><input type="text" class="form-control" name="FirstName" value="<?php echo $userRow['FirstName']; ?>"  /></td>
													</tr>
													<tr>
														<td>Last Name</td>
														<td><input type="text" class="form-control" name="LastName" value="<?php echo $userRow['LastName']; ?>"  /></td>
													</tr>
													
													<!-- radio button -->
											
													<!-- radio button end -->
													<tr>
														<td>DOB</td>
														<!-- <td><input type="text" class="form-control" name="patientDOB" value="<?php echo $userRow['patientDOB']; ?>"  /></td> -->
														<td>
															<div class="form-group ">
																
																<div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-calendar">
																		</i>
																	</div>
																	<input class="form-control" id="DOB" name="DOB" placeholder="MM/DD/YYYY" type="text" value="<?php echo $userRow['DOB']; ?>"/>
																</div>
															</div>
														</td>
														
													</tr>
													<!-- radio button -->
													<tr>
														<td>Gender</td>
														<td>
															<div class="radio">
																<label><input type="radio" name="Gender" value="male" <?php echo $male; ?>>Male</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="Gender" value="female" <?php echo $female; ?>>Female</label>
															</div>
														</td>
													</tr>
													<!-- radio button end -->
													
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
					<!-- ROW END -->
				</section>
				<!-- SECTION END -->
			</div>
			<!-- CONATINER END -->
			<script src="assets/js/jquery.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			
			<script type="text/javascript">
														$(function () {
														$('#DOB').datetimepicker();
														});
														</script>
		</body>
	</html>