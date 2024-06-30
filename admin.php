<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
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
     <a href="index.php" class="nav-link"><i class="fas fa-home"></i> Home</a>
    </div>

    <div class="container">
        <?php
        // Connect to the database
        include('connection.php');

        // Fetch data from the database
        $sql = "SELECT * FROM user_data";
        $result = mysqli_query($conn, $sql);

        // Create the table
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>First</th><th>Middle Name</th><th>Last Name</th><th>Gender</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $id = $row['Number'];
                echo "<tr>";
                echo "<td>" . $row["Number"] . "</td>";
                echo "<td>" . $row["first_Name"] . "</td>";
                echo "<td>" . $row["middle_Name"] . "</td>";
                echo "<td>" . $row["last_Name"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["addresss"] . "</td>";
                echo "<td>" . $row["phone_number"] . "</td>";
                echo "<td>" . $row["passwords"] . "</td>";
                echo "<td><a href='update.php?id=$id&action=update'>Update</a></td>";
                echo "<td><a href='delet.php?id=$id&action=delete'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No data found.";
        }

        // Close the connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
