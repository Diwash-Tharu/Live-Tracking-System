<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('connection.php');

// if(isset($_GET['']))
// {
    
// }
if(isset($_POST['sub']))
        {
            $usernumber = trim($_POST['number']);
            $pw = $_POST['pass'];

             // Prepare the SQL query with placeholders
                $select = "SELECT * FROM user_data WHERE phone_number = '$usernumber' && passwords = '$pw'";

                // Initialize a statement and prepare the SQL query
                $result = mysqli_query($conn, $select);

                if(mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_array($result);
                    $_SESSION['user_name'] = $row['first_Name'];

                    $num =$row['phone_number'];
                    if($num== '9819409046')
                    {
                        header('location:admin.php');
                    }
                    else
                    {
                        header('location:home1.php');
                    }
                    $error[] = '';

                }
                else
                {
                    $error[] = 'incorrect email or password!';
                }
             

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="logins.css">
</head>

<body class="login">
    <div class="image">
        <img src="Logo.png" alt="logo" width="385" height="185">
    </div>
    <form action="" class="form" action="" method="POST">

        <h2>Sign In</h2>

        <?php
        if(isset($error)){
            foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
            }
        }
        ?>

        <div>
            <label>Phone Number</label>
            <input type="text" name="number" placeholder="Phone Number" require>
        </div>
        <div>
            <label>password</label>
            <input type="text" name="pass" placeholder="password" require>
        </div>
        <div class="checkbox">
            <input type="checkbox" name="box"><label>Remember Me </label>
        </div>
        <div class="submit1">
            <input type="submit" name="sub" value="Log In" class="sub">
        </div>
        <div class="d">
            <a href="registerCustomer.php" class="number">Register</a>
            <hr>
        </div>
    
    </form>

</body>

</html>