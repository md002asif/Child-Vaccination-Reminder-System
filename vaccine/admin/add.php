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
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="text-center mt-3">Add Vaccination for Childerns</h3>
                <form action="" method="post" class="mt-4">
                    <div class="form-group">
                        <label for="">Vaccination Name:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Start Days:</label>
                        <input type="text" name="start" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Weeks:</label>
                        <input type="text" name="week" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">years:</label>
                        <input type="text" name="year" class="form-control">
                    </div>
                    <center>
                        <input type="submit" name="add" class="btn btn-primary" value="Add vaccine">
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include("db.php");
if(isset($_POST["add"]))
{
    extract($_POST);
    $sql = "insert into dose(name,start,week,year) values('$name','$start','$week','$year')";
    if(mysqli_query($conn, $sql))
    {
        echo '<script>alert("Vaccine Added Successfully");window.location.replace("add.php");</script>';
    }
    else

    {
        echo '<script>alert("Try Again Later");window.location.replace("add.php");</script>';
    }
}
?>