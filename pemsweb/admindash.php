<?php

session_start();
if (isset($_SESSION['uid1'])) echo "";
else header('location: ../index.php');

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
        <h1 style="text-align: center;">Welcome Admin!</h1>
    </div>
    <table>
    	<tr>
    		<td>USN</td>
    		<td>Name</td>
    		<td>Sem</td>
    		<td>Subject</td>
    	</tr>
    	<tr>
    		<td><?php 
    				
    		?></td>
    	</tr>
    </table>
</body>

</html>