<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Vaccination System</title>
</head>
<body>
    <?php
        include("header2.php");
        include("db.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-5 p-4" style="background-color: rgb(105,105,105);">
                    <?php
                        $sql = "select count(name) from dose";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                    ?>
                    <center>
                        <p class="text-white">Total Count: <?= $row["count(name)"]?>
                        <br>
                        <p class="text-white" style="font-size: 20px;"><b>Vaccine</b></p>
                        </p>
                        
                    </center>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-5 p-4" style="background-color: rgb(105,105,105);">
                    <?php
                        $sql = "select count(name) from contact";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                    ?>
                    <center>
                        <p class="text-white">Total Count: <?= $row["count(name)"]?>
                            <br>
                            <p class="text-white" style="font-size: 20px;"><b>Contact</b></p>
                        </p>
                        
                    </center>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-5 p-4" style="background-color: rgb(105,105,105);">
                    <?php
                        $sql = "select count(name) from user";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                    ?>
                    <center>
                        <p class="text-white">Total Count: <?= $row["count(name)"]?>
                            <br>
                            <p class="text-white" style="font-size: 20px;"><b>Users</b></p>
                        </p>
                        
                    </center>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-5 p-4" style="background-color: rgb(105,105,105);height:137px;">
                    <center>
                        <a href="logout.php" class="btn btn-primary" style="margin-top:18px">Logout</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>