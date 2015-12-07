<!DOCTYPE html>
<?php
session_start();
include 'includes/dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysqli_query($conn,"SELECT Email FROM users WHERE user_id=".$_SESSION['user']);
while($row = mysqli_fetch_array($res))
{
    $_SESSION['username'] = $row['Email'];
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome<?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<div id="header">
	<div id="left">
    </div>
    <div id="right">
    	<div id="content">
        	Welcome <?php echo $_SESSION['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>
<div id="formcontainer">
<form action="upload.php" method="post" enctype="multipart/form-data">
    Please select image to upload:
    <br>
    <br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <br>
    Please enter name of badge you would like to upload.
    <br>
    <br>
    <input id="icon image" class="file-path validate" type="text" placeholder="Please enter name of badge." name="txtimagename">
    <br>
    <label for="icon_image" style="margin-left:100px"></label>
    <br>
    <input type="submit" value="Upload Image" name="submit">
</form>
</div>
</body>
</html>
