<?php

session_start();
if (isset($_SESSION['uid'])) header('location: user/userdash.php');

include('dbconn.php');
if (isset($_POST['login'])) {

    if($_POST['uname'] == 'admin' && $_POST['pass'] == 'admin'){
        header('location: admindash.php');
    }
else{
        $username = $_POST['uname'];
        $password = $_POST['pass'];

        $qry = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $run = mysqli_query($conn, $qry);
        $row = mysqli_num_rows($run);

        if ($row < 1) {
            ?>
            <script type="text/javascript">
                alert("Invalid Credentials!");
                window.open('index.php', '_self');
            </script>
    <?php
        } else {
            $data = mysqli_fetch_assoc($run);
            $id = $data['name'];
            $_SESSION['uid'] = $id;
            header('location: user/userdash.php');
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Professional Elective</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div class="header">
        <h2>Login</h2>
    </div>

    <form method="post" action="index.php">

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="uname" required>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="pass" required>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>


</body>

</html>