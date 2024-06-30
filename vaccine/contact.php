<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Vaccination System</title>
</head>
<body>
    <?php
        include("header1.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <img src="image/contact.png" alt="" width="100%">
            </div>
            <div class="col-md-6 mt-5">
                <h4 class="text-center text-success">Contact Us</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="" style="color: #000000;font-weight:500;font-size:17px;">Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="" style="color: #000000;font-weight:500;font-size:17px;">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="" style="color: #000000;font-weight:500;font-size:17px;">Mobile No:</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Your Number" required>
                    </div>
                    <div class="form-group">
                        <label for="" style="color: #000000;font-weight:500;font-size:17px;">Message:</label>
                        <input type="text" name="msg" class="form-control" placeholder="Enter Your Message" required>
                    </div>
                    <center>
                        <input type="submit" name="send" class="btn btn-warning text-white" value="Send Message">
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include("db.php");
if(isset($_POST["send"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $msg = $_POST["msg"];
    $sql = "insert into contact(name,email,phone,msg) values('$name','$email','$phone','$msg')";
    if(mysqli_query($conn, $sql))
    {
        echo '<script>alert("Message Sent Successfully");window.location.replace("contact.php");</script>';
    }
    else
    {
        echo '<script>alert("Try Again Later");window.location.replace("contact.php");</script>';
    }
}

