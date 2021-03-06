<?php

session_start();
if (isset($_SESSION['uid'])) echo "";
else header('location: ../index.php');

if (isset($_POST['submit'])) {
    include('../dbconn.php');

    $sub = $_POST['sub'];

    $qry = "UPDATE `users` SET `sub`='$sub' WHERE `name`='{$_SESSION['uid']}'";

    $run = mysqli_query($conn, $qry);

    if ($run == true) {
        ?>
        <script type="text/javascript">
            alert("Information Updated!");
            window.open('../logout.php', '_self');
        </script>
<?php
    } else echo ("error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        .btn{
            background-color: #5F9EA0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Home Page</h2>
    </div>
    <div class="content">

        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php if (isset($_SESSION['uid'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['uid']; ?></strong></p>
            <p> <a href="../logout.php" style="color: red;">logout</a> </p>
        <?php endif ?>
        <br>
        <h4>Please Update Details: </h4><br>
        <ul class="list-group" style="padding-left: 10%;">
            <li class="list-group-item">High Performance Computing <a href="../syllabus/hpc.php">Syllabus</a></li>
            <li class="list-group-item">Network Management <a href="../syllabus/nm.php">Syllabus</a></li>
        </ul>
        <br>
        <form method="post" action="eight.php">

            <div class="input-group">
                <label>Choice: </label>
                <input type="text" name="sub">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="submit">Submit</button>
            </div>
        </form>

    </div>

</body>

</html>