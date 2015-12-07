<?php
session_start();
include 'includes/dbconnect.php';
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$upass = mysqli_real_escape_string($conn,$_POST['pass']);
    
	$sql = "SELECT * FROM users WHERE Email='".$email."'";
    $logon = $conn->query($sql);
    if (!$logon)
    {
            exit("DBMS error");
    }
    if ($logon->num_rows > 0)
    {
        while($row = $logon->fetch_assoc())
        {
            if($row["Password"] == md5($upass))
	       {
                $_SESSION["user"] = $row["user_id"];
		      header("Location: home.php");
	       }
	       else
	       {
		      ?>
                <script>alert($_POST["email"]);</script>
                <?php
	       }  
        }
    }	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
