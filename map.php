<?php
session_start();
if(isset($_SESSION['user_name']))
{
    // echo "<h1>Welcome ".$_SESSION['user_name']."</h1>";	
}
else
{
    header('location:home1.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hoem.css">
    <title>Document</title>
</head>
<body>


<div class="navbar">
    <a href="#" class="logo">
  <img src="logo.png" alt="Logo"style="width: 250px; height: 120px;">
</a>

    <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Login</a>
        <a href="map.php" class="location-link">
     <i class="fas fa-map-marker-alt"></i> Location
     <a href="index" class="nav-link"><i class="fas fa-home"></i> Home</a>
    </div>

    <table cellspacing="5" cellpadding="10" border="1px solid">
        <tr style="width: 550px; height: 0px;">
            <th>Map</th>
            
        </tr>

        <?php
        include('connection.php');
        $sql = "SELECT * FROM location";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $latitude = floatval($row['Langitude']);
                $longitude = floatval($row['Longitude']);
                echo '<tr><td style="text-align: center;">speed: </td></tr>';
                
                    echo '<tr><td style="width: 4500px; height: 450px;"><iframe src="https://maps.google.com/maps?q='  . $latitude . ',' . $longitude . '&hl=es;z=15&amp;output=embed" style="width: 100%; height: 100%;"></iframe></td></tr>';

                    echo "<tr><td>Coordinate:</td></tr>
                    <tr><td>Longitude: " . $row['Longitude'] . "</td></tr>
                    <tr><td>Latitude: " . $row['Langitude'] . "</td></tr>";
                ?>
                <!-- // <td style="width: 450px; height: 450px;"><iframe src='https://maps.google.com/maps?q=<?php echo $row['Langitude']; ?>,<?php echo $row['Longitude']; ?>&hl=es;z=14&amp;output=embed' style="width: 100%; height: 100%;"></iframe></td> -->
         
            <?php 
            }
        }
        ?>
    </table>
</body>
</html>
