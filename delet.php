<?php
// Establish a database connection
include("connection.php");	
if(isset($_GET['id'])){
    $did = $_GET['id'];
    $sql = "SELECT Number FROM user_data WHERE Number = '$did'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $phoneNumber = $row['Number'];

    $sql = "DELETE FROM user_data WHERE Number= '$did'";
    $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    // $sqls = "DELETE FROM location WHERE phone='$phoneNumber'";
    // $qryr = mysqli_query($conn,$sqls) or die(mysqli_error($conn));
    header("location:admin.php");
}
?>