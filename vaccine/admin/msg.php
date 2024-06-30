
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
    ?>
    <div class="container">
        <h3 class="text-center text-success mt-3">We are Listed the Vaccination list based on Days, Month, Year From Birth Date</h3>
        <div class="row">
            <?php
                include("db.php");
                $sql = "select * from contact";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        ?>
                        <div class="col-md-4 mt-4">
                            <div class="card" style="border: 2px solid #000000;">
                                <div class="card-body">
                                    <h6 style="color: rgb(255,0,0);">Name : <?= $row["name"]?></h6>
                                    <h6 style="color: rgb(255,0,0);">Email : <?= $row["email"]?></h6>
                                    <h6 style="color: rgb(255,0,0);">Mobile No : <?= $row["phone"]?></h6>
                                    <h6 style="color: rgb(255,0,0);">Message : <?= $row["msg"]?></h6>
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