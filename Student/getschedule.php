<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$q = $_GET['q'];
$res = mysqli_query($con,"SELECT * FROM schedule WHERE scheduleDate='$q'");
if (!$res) {
die("Error running $sql: " . mysqli_error());
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
    
<div class='container'>
       <div class='row'>
       <div class="col-md-6">
        <?php
       
        if (mysqli_num_rows($res)==0)
         {
        echo "<div class='alert alert-danger' role='alert'>Teacher is not available at the moment. Please try again later.</div>";
        
        }
         else
         {
            
        echo " <table  class='table table-hover table-responsive'>";
            echo " <thead>";
                echo " <tr>";
                    echo " <th>App Id</th>";
                    echo " <th>Day</th>";
                    echo " <th>Date</th>";
                    echo "  <th>Start Time</th>";
                    echo "  <th>End Time</th>";
                    echo " <th>Availability</th>";
                    echo "  <th>Book Now!</th>";
                echo " </tr>";
            echo "  </thead>";
            echo "  <tbody>";
    
            while($row = mysqli_fetch_array($res))
            {
                echo " <tr>";
               
                
              if ($row['bookAvail']!='available')
                    {
                   $avail="danger";
                   $btnstate="disabled";
                   $btnclick="danger";
                   } 
                   else 
                   {
                   $avail="primary";
                   $btnstate="";
                   $btnclick="primary";
                   }
             

                   echo "<td>" . $row['scheduleId'] . "</td>";
                   echo "<td>" . $row['scheduleDay'] . "</td>";
                   echo "<td>" . $row['scheduleDate'] . "</td>";
                   echo "<td>" . $row['startTime'] . "</td>";
                   echo "<td>" . $row['endTime'] . "</td>";
                   echo "<td> <span class='label label-".$avail."'>". $row['bookAvail'] ."</span></td>";
                   echo "<td><a href='appointment.php?&appid=" . $row['scheduleId'] . "&scheduleDate=".$q."' class='btn btn-".$btnclick." btn-xs' role='button' ".$btnstate.">Book Now</a></td>";
                   echo "</tr>";
                  
              
                }
                echo "</tbody>";
                echo "</table>";
            }
              
                ?>
           
     
                 
                    
                   
                     
                  
            <!-- modal start -->
            
            
            
            </div>
            </div>   
            </div>
            
        </body>
    </html>