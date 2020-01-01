<?php

if (isset($_POST['submit'])) {
    include('dbconn.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $qry = "INSERT INTO users " . "(name, email, username, password)" . " VALUES "
        . "('$name','$email','$username','$password')";

    $run = mysqli_query($conn, $qry);

    if ($run == true) {
        ?>
        <script type="text/javascript">
            alert("You're Registered! Please login.");
            window.open('index.php', '_self');
        </script>
<?php
    } else echo ("error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form method="post" action="register.php">

        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="submit">Register</button>
        </div>
        <p>
            Already a member? <a href="index.php">Sign in</a>
        </p>
    </form>
</body>

</html>