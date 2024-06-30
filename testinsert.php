<?php
include('connection.php');  




    $Location1=10;
    $location2=20;
    //header("location:customer/add_to_card.php?num=$num&id=$id");
    // echo $num;
    // echo $id;
    
    $sql = "INSERT INTO location (Langitude, Longitude) VALUES ('$Location1', '$location2')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Location added successfully";
    }else{
        echo "Failed to add location";
    }

?>