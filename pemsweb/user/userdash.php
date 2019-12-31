<?php

session_start();
if (isset($_SESSION['uid'])) echo "";
else header('location: ../index.php');

if (isset($_POST['submit'])) {
    include('../dbconn.php');

    $usn = $_POST['usn'];
    $phone = $_POST['phone'];
    $sem = $_POST['sem'];

    $qry = "UPDATE `users` SET `usn`='$usn',`phone`='$phone',`sem`='$sem' WHERE `name`='{$_SESSION['uid']}'";

    $run = mysqli_query($conn, $qry);

    if ($run == true) {
        if ($sem == 5) {
            header("location: five.php");
        } else if ($sem == 6) {
            header("location: six.php");
        } else if ($sem == 7) {
            header("location: seven.php");
        } else {
            header("location: eight.php");
        }
    } else echo ("error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../style1.css">
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

        <form method="post" action="userdash.php">

            <br>
            <h4>Please Update Details: </h4><br>
            <div class="input-group">
                <label>USN</label>
                <input type="text" name="usn" required>
            </div>
            <div class="input-group">
                <label>Phone</label>
                <input type="text" name="phone" required>
            </div>
            <div class="input-group">
                <label>Sem</label>
                <input type="text" name="sem" required>
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="submit">Submit</button>
            </div>
        </form>

    </div>

</body>

</html>