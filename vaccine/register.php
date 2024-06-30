<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Vaccine System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        body{
            background-image: url(image/injec.jpg);
            background-repeat: no-repeat;
            background-size: 100vw 100%;
        }
    </style>


</head>
<body>
<?php
include("header1.php");
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-2 mb-3">
                <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.7);border-radius:18px;">
                    <h4 class="text-center" style="border-bottom: 1px solid #000000;padding-bottom:10px;">User Register</h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="" style="color: #000000;font-weight:500;font-size:17px;">Name:</label>
                            <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" style="color: #000000;font-weight:500;font-size:17px;">Date of Birth:</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" style="color: #000000;font-weight:500;font-size:17px;">Parents Email:</label>
                            <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" style="color: #000000;font-weight:500;font-size:17px;">Parents Mobile No:</label>
                            <input type="text" name="phone" maxlength="10" placeholder="Enter Mobile No" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" style="color: #000000;font-weight:500;font-size:17px;">Password:</label>
                            <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
                        </div>
                        <p>Already have an account <a href="index.php"  style="font-weight:500;font-size:17px;">Login</a></p>
                        <center>    
                            <input type="submit" name="reg" class="btn btn-primary" value="Register">
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
<?php
include("db.php");
if(isset($_POST["reg"]))
{
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $sql = "insert into user(name,dob,email,password,phone) values('$name','$dob','$email','$password','$phone')";
    if(mysqli_query($conn, $sql))
    {
        echo '<script>alert("Register Successfull");window.location.replace("login.php");</script>';
    }
    else
    {
        echo '<script>alert("Try Again Later");window.location.replcae("register.php");</script>';
    }
}