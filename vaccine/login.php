<?php

session_start();
include("db.php");

?>

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
            background-size: 100vw 100vh;
        }
    </style>



</head>
<body>
<?php
include("header1.php");
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.7);border-radius:18px;">
                <h4 class="text-center" style="border-bottom: 1px solid #000000;padding-bottom:10px;">User Login</h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="" style="color: #000000;font-weight:500;font-size:17px;">Parents Email:</label>
                            <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" style="color: #000000;font-weight:500;font-size:17px;">Password:</label>
                            <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
                        </div>
                        <p>Don't have an account <a href="register.php" style="font-weight:500;font-size:17px;">Register</a></p>
                        <center>
                            <input type="submit" name="log" class="btn btn-primary" value="Login">
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
<?php
if(isset($_POST["log"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "select * from user where email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["id"] = $row["id"];
        echo '<script>alert("Login Successfull");window.location.replace("user/home.php");</script>';
    }
    else
    {
        echo '<script>alert("Email or Password Incorrect");window.location.replcae("login.php");</script>';
    }
}