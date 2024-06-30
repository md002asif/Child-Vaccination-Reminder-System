<?php
session_start();
$id = $_SESSION["id"];
if(!isset($id))
{
    echo '<script>window.location.replace("login.php");</script>';
}
include("db.php");

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
        <h3 class="text-center text-success mt-3">Taken Vaccination</h3>
        <div class="row">
            <?php
                $sql = "select * from take where uid = $id";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        ?>
                        <div class="col-md-4 mt-4">
                            <div class="card" style="border: 2px solid #000000;">
                                <div class="card-body">
                                    <h6 style="color: rgb(255,0,0);text-transform:capitalize;">Child Name : <?= $row["name"]?></h6>
                                    <h6 style="color: rgb(255,0,0);">Vaccination Name : <?= $row["vaccine"]?></h6>
                                    <h6 style="color: rgb(255,0,0);">Date of Vaccination: <?= $row["vdate"]?></h6>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>