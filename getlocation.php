
<?php
include('connection.php');
if(isset($_GET['s_id'])&&(isset($_GET['s_id2']))) 
{
    $Location1=$_GET['s_id2'];
    $location2=$_GET['s_id'];
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
    
}
?>