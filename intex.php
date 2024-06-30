<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    echo $latitude;
    echo $longitude;
    //$sql = "INSERT INTO location (Lang, Long) VALUES ($latitude, $longitude)";
    $sql = "INSERT INTO location (Langitude, Longitude) VALUES ('$latitude', '$longitude')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Location added successfully";
    }else{
        echo "Failed to add location";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="myForm" action="" method="POST" enctype="multipart/form-data">
        <label for="">latituded</label>
        <input type="text" name="latitude" value="">
        <label for="">Latitude</label>
        <input type="text" name="longitude" value="">
        <button type="submit" name="submit">Upload</button>
    </form>
    <script type="text/javascript">
        function getLocation(){
        if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        else{
                alert("Geolocation is not supported by this browser.");
            }
        }
        function showPosition(position){
        document.querySelector('.myFrom input[name="latitude"]').value = position.coords.latitude;
        document.querySelector('.myFrom input[name="longitude"]').value = position.coords.longitude;          
        }    
    </script>
    <br>
    <a href="map.php">map</a>
    <a href="testinsert.php">map</a>

</body>
</html>