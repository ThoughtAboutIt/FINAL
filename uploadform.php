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
/*if(isset($_POST['btn-upload']))
    {
	$uName = mysqli_real_escape_string($conn,$_POST['uName']);
    $hours = mysqli_real_escape_string($conn,$_POST['hours']);
    
    if(mysqli_query($conn,"INSERT INTO CAInfo (CodeacademyUsername,Hours) VALUES('$uName','$hours')"))
    {
		?>
        <script>alert('Successfully Uploaded ');</script>
        <?php
	}
	else
	{
		?>
        <script>alert('Error While Uploading...');</script>
        <?php
	}
}*/
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload<?php echo $userRow['email']; ?></title>
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
    <center><h1>Codeacademy Upload Form</h1></center>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Codeacademy Username:
    <br>
    <br>
<input type="text" name="uName" placeholder="Codeacademy Username" required />
    <br>
    <br>
    Hours Completed:
    <br>
    <br>
<input type="text" name="hours" placeholder="Hours Completed" required />
    <br>
    <br>
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
    <input type="submit" value="Upload Information" name="submit">
</form>
</div>
</body>
</html>
