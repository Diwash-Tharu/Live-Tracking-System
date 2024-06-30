<?php

use function PHPSTORM_META\type;

session_start();
include('connection.php'); 
            $password_error = ""; 
        
            $fname_error="";
            $mname_error="";
            $lname_error="";
            $gender_error="";
            $date_err="";
            $number_err="";
            $password_error="";
            $password_nodata="";
            $address_error="";
            $shop_error=null;
           
            $count=0;

            
if(isset($_POST['sub']))
{
    // echo trim($_POST['number']);
            $fname=trim($_POST['fname']);
            $mname=trim($_POST['mname']);
            $lname=trim($_POST['lname']);
            $gender=$_POST['gender'];
            $adddress=trim($_POST['address']);
            $phone = trim($_POST['number']);
            $password= trim($_POST['password']);
            $confpass=trim($_POST['cpassword']);


            $date=$_POST['bod'];
            $prevous = date('Y', strtotime($date));
            $year = date("Y");
            $valid_Date=$year-$prevous;


            if(!preg_match ("/^[a-zA-z]*$/", $fname))
            {
                $fname_error="please enter correct firt  name";
                $count=$count+1;
            }

            else
            {   $cname="";
                $Cname=$fname;
            }

            if(empty(trim($mname))){
                $Cmname = '';
            }

            elseif(!preg_match ("/^[a-zA-z]*$/", $mname))
            {
                $mname_error='please enter vlaid middle name'; 
                $count=$count+1;
            }
            else
            {
                $Cmname=$mname;
            } 

            if(!preg_match ("/^[a-zA-z]*$/", $lname))
                {
                    $lname_error="please enter correct name";
                    $count=$count+1;
                }
            else
            {
                $Clnamme=$lname;
            }

            if(empty($gender))
            {
                $gender_error= "please select your gender";
                $count=$count+1;
            }

            else
            {
                $Cgender = $gender;
            }
            $select = " SELECT * FROM user_data WHERE phone_number = $phone";

            $result = mysqli_query($conn, $select);
            if(mysqli_num_rows($result) == 1)
            {
                $number_err="phone number already exit";
                $count=$count+1;
            }
            if(!preg_match('/^[0-9]{10}+$/', $phone))
            {
                $number_err="please enter valid number";
                $count=$count+1;
            }

            if(strlen($phone) != 10)
            {
                $number_err="Phone number length should be 10";
                $count=$count+1;
            }
            else
            {
                $Cphone=$phone;
            
            }

                //oci_num_rows($stid) ;
            if(preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]/', $adddress))
                    {
                        $address_error="please enter valid addreess";
                        $count=$count+1;
                    }
                else
                {
                    $Caddress=$adddress;
                }

                if($valid_Date >=18)
                {
                    $Cage=(int)$valid_Date;
                }        
                else
                {
                    $date_err=  "you can not enter due to age restiction"; 
                    $count=$count+1;
                }
            
            
            if($password!=$confpass)
            {
                $password_nodata="please enter your same  password";
                $count=$count+1;
            }
            else
            {
                    $uppercase = preg_match('@[A-Z]@', $password);
                    $lowercase = preg_match('@[a-z]@', $password);
                    $number    = preg_match('@[0-9]@', $password);
                    $specialChars = preg_match('@[^\w]@', $password);
                    
                    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                        $password_error= 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                        $count=$count+1;
                    }
                    else{ 

                    //     echo  $Cphone;
                    //    echo  gettype($Cphone);
                            $passwords = md5(trim($password));
                            if($count==0)
                            {
                                $insert = "INSERT INTO user_data(first_Name,middle_Name,last_Name,gender,addresss,phone_number,passwords) VALUES('$Cname','$Cmname','$Clnamme','$Cgender','$Caddress','$Cphone','$password')";
                                mysqli_query($conn, $insert);
                                header('location:home1.php');
                        }
        
                        }
            }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>customer Register</title>
    <link rel="stylesheet" href="registerCustomera.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body class="login">
    <div class="image">
        <img src="Logo.png" alt="logo" width="400" height="170">
    </div>
    <form action="" class="form" method="POST" enctype="multipart/form-data">
        <h2> Customer Register</h2>
        
        <br>

        <label> First Name</label>
        <input type="text" name="fname"  required placeholder="firs name">
        <p class="error password-error">
        <?php echo $fname_error; ?>
        </p>
        <label> Middle Name</label>
        <input type="text" name="mname"  placeholder="middle name">
        <p class="error password-error">
        <?php echo $mname_error;?>
        </p>

        <label> Last Name</label>
        <input type="text" name="lname"  required  placeholder="last name">
        <p class="error password-error">
        <?php echo $lname_error ;?>
        </p>
        <br>
        <label>Gender:</label>
        Male:
        <input type="radio" name="gender"  value='male' >
        Female:
        <input type="radio" name="gender" value='female' >
        Other:
        <input type="radio" name="gender" value='other' checked ><br><br>
        <p class="error password-error">
        <?php echo $gender_error;?>
        </p>

        <label for="birthday">Date Of Birth : </label>
        <input type="date" id="birthday" name="bod" class="date" ><br>
        <br>
        <p class="error password-error">
        <?php echo $date_err;?>
        </p>

        <label> Address</label>
        <input type="text" name="address" placeholder="address" >
        <p class="error password-error">
        <?php echo $address_error; ?>
        </p>

        <label> Phone number</label>
        <input type="text" name="number" placeholder="phone number" >
        <p class="error password-error">
        <?php echo $number_err;?>
        </p>
        <label> Password</label>
        <input type="password" name="password"  placeholder="password">
        <p class="error password-error">

        <?php echo  $password_nodata;?>
        </p>
        <label> Conform Password</label>
        <input type="password" name="cpassword"  placeholder="conform password" >
        <p class="error password-error">
        <?php echo $password_nodata; ?>
        </p>
        
        <div class="submit1">
            <!-- <input type="button" name="sub" value="Register" class="sub" data-bs-toggle="modal" data-bs-target="#exampleModal"> -->
            <input type="submit" name="sub" value="Register" class="sub">
                </div>

        <hr>
        <a href="login.php">Already have account</a>
    </form>

    

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
    
</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>

    </div>
    </div>
</div>

</body>

</html>

