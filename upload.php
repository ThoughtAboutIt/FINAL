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
<title>Upload Finalised<?php echo $userRow['email']; ?></title>
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
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileName = $_REQUEST["txtimagename"];
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$sql = "INSERT INTO CAInfo (CodeacademyBadges, CodeacademyUsername, Hours) VALUES ('". $fileName . "', '" . $_REQUEST["uName"] . "', '" . $_REQUEST["hours"] . "')";
        include_once "includes/dbconnect.php";
if
    ($conn->query ($sql)=== TRUE){
    
}
$conn->Close();
?>
    <br>
    <br>
  <a href="home.php">Go back to homepage.</a>  
</div>
</body>
</html>
