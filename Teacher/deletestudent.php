<?php
include_once '../assets/conn/dbconnect.php';
// Get the variables.
$icstudent = $_POST['ic'];
// echo $appid;

$delete = mysqli_query($con,"DELETE FROM Student WHERE icstudent=$icstudent");
// if(isset($delete)) {
//    echo "YES";
// } else {
//    echo "NO";
// }



?>

