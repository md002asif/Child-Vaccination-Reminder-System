<?php
session_start();
$id = $_SESSION["id"];
if(!isset($id))
{
    echo '<script>window.location.replace("login.php");</script>';
}
include("db.php");

$sql = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Calculate age in days
$date = $row["dob"];
$birthDateTime = new DateTime($date);
$todayDateTime = new DateTime();
$interval = $birthDateTime->diff($todayDateTime);
$days = $interval->days;

// Fetch next vaccination info
$sql2 = "SELECT * FROM dose WHERE start >= $days limit 1";
$result1 = mysqli_query($conn, $sql2);
$row1 = mysqli_fetch_assoc($result1);
$did = $row1["id"];

// Check if row1 is not null before accessing its properties
if ($row1) {
    $nextVaccinationName = $row1["name"];
    $da = $row1["start"];
    $date1 = new DateTime($date);
    $date1->add(new DateInterval("P{$da}D"));
    $show = $date1->format('Y-m-d');
} else {
    $nextVaccinationName = "No vaccination information available";
    $show = "";
}
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
            <div class="col-md-6 offset-md-3 mt-3">
                <div class="card mt-5 p-3" style="background-color: rgba(0, 0, 0, 0.7);">
                <h4 class="text-center text-white" style="border-bottom: 1px solid #ffffff;padding-bottom:10px;text-shadow: 2px 2px #FF0000;">Your Child Information</h4>
                    <center>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;text-transform:capitalize;">
                            <p>Name : <?= $row["name"]?></p>
                        </div>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;text-transform:capitalize;">
                            <p>Date of Birth : <?= $row["dob"]?></p>
                        </div>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;">
                            <p>Number of Days : <?= $days?> days</p>
                        </div>
                    </center>
                    <h4 class="text-center text-white" style="border-bottom: 1px solid #ffffff;padding-bottom:10px;text-shadow: 2px 2px #FF0000;border-top: 1px solid #ffffff;padding-top:10px;">Next Vaccination Info</h4>
                    <center>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;text-transform:capitalize;">
                            <p>Next Vaccination Name : <?= $nextVaccinationName ?></p>
                        </div>
                        <div class="text-white mt-3" style="font-size: 18px;font-weight:500;text-transform:capitalize;">
                            <p>Date of Vaccination : <?= $show ?></p>
                        </div>  
                        <?php
                            $today = date("Y-m-d");
                            if($show == $today)
                            {  
                                $sql4 = "select * from take where uid = '$id' and did = '$did'";
                                $result4 = mysqli_query($conn, $sql4);
                                if(mysqli_num_rows($result4) > 0)
                                {
                                    echo "<h4 class='text-warning' style='font-size:18px;'>Vaccination Taken</h4>";
                                }
                                else
                                {
                                    ?>
                                        <a href="dose.php?uid=<?=$id?>&&did=<?=$did?>" class="btn btn-danger">Get Vaccine</a>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <p class="text-white text-warning">Get Vaccination on Exact Date.!</p>
                                <?php
                            }
                        ?>
                    </center>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>
