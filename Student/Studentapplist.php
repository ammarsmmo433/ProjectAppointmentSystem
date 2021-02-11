<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$session=$_SESSION[ 'studentSession'];
$res=mysqli_query($con, "SELECT a.*, b.*,c.* FROM Student a
	JOIN appointment b
		On a.icstudent = b.studentIc
	JOIN schedule c
		On b.scheduleId=c.scheduleId
	WHERE b.studentIc ='$session'");
	if (!$res) {
		die( "Error running $sql: " . mysqli_error());
	}
	$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
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
		</nav>
		<!-- navigation -->
<!-- display appoinment start -->
<?php


echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='page-header'>";
echo "<h1>Your appointment</h1>";
echo "</div>";
echo "<div class='panel panel-primary'>";
echo "<div class='panel-heading table-responsive'>List of Appointment</div>";
echo "<div class='panel-body table-responsive'>";
echo "<table class='table table-hover table-responsive'>";
echo "<thead>";
echo "<tr>";
echo "<th>App Id</th>";
echo "<th>StudentIc </th>";
echo "<th>LastName </th>";
echo "<th>scheduleDay </th>";
echo "<th>scheduleDate </th>";
echo "<th>startTime </th>";
echo "<th>endTime </th>";
echo "<th>Print </th>";
echo "</tr>";
echo "</thead>";
$res = mysqli_query($con, "SELECT a.*, b.*,c.*
		FROM Student a
		JOIN appointment b
		On a.icStudent = b.studentIc
		JOIN schedule c
		On b.scheduleId=c.scheduleId
		WHERE b.StudentIc ='$session'");

if (!$res) {
die("Error running $sql: " . mysqli_error());
}


while ($userRow = mysqli_fetch_array($res)) {
echo "<tbody>";
echo "<tr>";
echo "<td>" . $userRow['appId'] . "</td>";
echo "<td>" . $userRow['studentIc'] . "</td>";
echo "<td>" . $userRow['FirstName'] . "</td>";
echo "<td>" . $userRow['LastName'] . "</td>";
echo "<td>" . $userRow['scheduleDay'] . "</td>";
echo "<td>" . $userRow['scheduleDate'] . "</td>";
echo "<td>" . $userRow['startTime'] . "</td>";
echo "<td>" . $userRow['endTime'] . "</td>";
echo "<td><a href='invoice.php?appid=".$userRow['appId']."' target='_blank'><span class='fa fa-print fa-2x' aria-hidden='true'></span></a> </td>";
}

echo "</tr>";
echo "</tbody>";
echo "</table>";

?>
	</div>
</div>
</div>
</div>
<!-- display appoinment end -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>