<?php
session_start();
$id = $_SESSION["id"];
if(!isset($id))
{
    echo '<script>window.location.replace("login.php");</script>';
}
include("db.php");
$uid  = $_GET["uid"];
$did = $_GET["did"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Vaccination System</title>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <?php
        $sql = "select * from user where id = $uid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $sql1 = "select * from dose where id = $did";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
    ?>
    <div class="container">
        <h2 class="text-center mt-3">Take Vaccination</h2>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="col-md-6">
                        <img src="../image/take.avif" width="100%" height="87%">
                    </div>
                    <div class="col-md-6">
                        <form action="" method="post">
                            <input type="hidden" name="uid" value="<?= $uid?>">
                            <input type="hidden" name="did" value="<?= $did?>">
                            <div class="form-group">
                                <label for=""style="color: #000000;font-weight:500;font-size:17px;">Name:</label>
                                <input type="text" name="name" readonly class="form-control" value="<?= $row["name"]?>">
                            </div>
                            <div class="form-group">
                                <label for="" style="color: #000000;font-weight:500;font-size:17px;">Email:</label>
                                <input type="text" name="email" readonly class="form-control" value="<?= $row["email"]?>">
                            </div>
                            <div class="form-group">
                                <label for="" style="color: #000000;font-weight:500;font-size:17px;">Mobile Number:</label>
                                <input type="text" name="phone" readonly class="form-control" value="<?= $row["phone"]?>">
                            </div>
                            <div class="form-group">
                                <label for="" style="color: #000000;font-weight:500;font-size:17px;">Vaccine Name:</label>
                                <input type="text" name="vaccine" readonly class="form-control" value="<?= $row1["name"]?>">
                            </div>
                            <div class="form-group">
                                <label for="" style="color: #000000;font-weight:500;font-size:17px;">Vaccine Date:</label>
                                <input type="text" name="vdate" readonly class="form-control" value="<?= date("Y-m-d")?>">
                            </div>
                            <center>
                                <input type="submit" name="take" class="btn btn-danger">
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php

if(isset($_POST["take"]))
{
    $uid = $_POST["uid"];
    $did = $_POST["did"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $vaccine = $_POST["vaccine"];
    $vdate = $_POST["vdate"];
    $sql2 = "insert into take(uid,did,name,email,phone,vaccine,vdate) values('$uid','$did','$name','$email','$phone','$vaccine','$vdate')";
    if(mysqli_query($conn, $sql2))
    {
        include("mailer.php");
    }
    else
    {
        echo '<script>alert("Try Again Later");window.location.replace("next.php");</script>';
    }
}
?>