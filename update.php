<?php
session_start();

  include('connection.php');
//   Update Product code
  if(isset($_POST['sub']))
  {

            $fname=trim($_POST['fname']); 
            $mname=trim($_POST['mname']);
            $lname= trim($_POST['lname']);
            $address= trim($_POST['address']);
            $num= trim($_POST['num']);
            $gender=trim($_POST['gender']);
            $pid=trim($_POST['id']);


                $sqls = "UPDATE user_data SET first_Name='$fname',middle_Name=' $mname',last_Name='$lname' ,gender='$gender',addresss='$address' ,phone_number='$num'WHERE Number='$pid'";
                $qrys = mysqli_query($conn,$sqls) or die(mysqli_error($conn));
                if($qrys)
                {
                    header('location:admin.php');
                }


            }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
    <title>Document</title>
</head>

<?php


        if(isset($_GET['id'])){

            $id=$_GET['id'];
            $sql = "SELECT * FROM user_data WHERE Number = '$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
        }

?>

<body >
    
<div class="all">

            <form method ="POST" action=""  enctype="multipart/form-data">
 

            <label> First Name</label>
            <input type="text" name ="fname" value="<?php echo $row['first_Name'] ;?>">
            <p class="error password-error">
            </p>

            <label>Middle Name</label>
            <input type="text" name ="mname" value="<?php echo $row['middle_Name'] ;?>">
            <p class="error password-error">

            </p>

            <label>Last Name</label>
            <input type="text" name ="lname"  value="<?php echo $row['last_Name'];  ?>">
            <p class="error password-error">

            </p>

            <label>Address</label>
            <input type="text"name="address"  min="1" max="100" value="<?php echo $row['addresss']; ?>"> 
            <p class="error password-error">

            </p>

            <label>Phone Number</label>
            <input type="text" name ="num"    value="<?php echo $row['phone_number']; ?>">
            <p class="error password-error">
            </p>

            <label>Gender</label>
            <input type="text" name ="gender" value="<?php echo $row['gender'];  ?>">
            <p class="error password-error">
            </p>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <input type="submit" name="sub" value="UPDATE" class="sub" >
            <form>
    
</div>    
</body>

</html>
