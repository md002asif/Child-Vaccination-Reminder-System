<?php
session_start();
$id = $_SESSION["id"];
if(!isset($id))
{
    echo '<script>window.location.replace("login.php");</script>';
}
include("db.php");

$sql = "select * from user where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$date = $row["dob"];
$birthDateTime = new DateTime($date);
$todayDateTime = new DateTime();
$interval = $birthDateTime->diff($todayDateTime);
$days = $interval->days;
$weeks  = floor($interval->days / 7);
$years = $interval->y ;
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

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5 p-3" style="background-color: rgba(0, 0, 0, 0.7);border-radius:15px;">
                <h4 class="text-center text-white" style="border-bottom: 1px solid #ffffff;padding-bottom:10px;">Your Child Information</h4>
                    <center>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;text-transform:capitalize;">
                            <p>Name : <?= $row["name"]?></p>
                        </div>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;text-transform:capitalize;">
                            <p>Date of Birth: <?= $row["dob"]?></p>
                        </div>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;">
                            <p>Number of Days : <?= $days?> days</p>
                        </div>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;text-transform:capitalize;">
                            <p>Number of Weeks : <?= $weeks?> weeks</p>
                        </div>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;text-transform:capitalize;">
                            <p>Number of Years : <?= $years?> years</p>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>

<?php

$update = date('Y-m-d H:i:s');

?>
    <center class="mt-5">
        Details Updated on <?= $update?>
    </center>
</body>
</html>