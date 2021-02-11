<?php
session_start();

if(!isset($_SESSION['teacherSession']))
{
 header("Location: Teacherdashboard.php");
}
else if(isset($_SESSION['teacherSession'])!="")
{
 header("Location: ../index.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['teacherSession']);
 header("Location: ../index.php");
}
?>