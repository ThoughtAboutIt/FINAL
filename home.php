<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome<?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
    <?php 
    
        global $startdate;
        global $enddate;
        $startdate=microtime(true);
     
        session_start();
        include_once "includes/dbconnect.php";
        include_once "includes/perfloghome.php";
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
    <?php
    $enddate=microtime(true);
    $interval=round(($enddate-$startdate)*1000,2);
    logToPerformace("Home Page loaded in " . $interval . "ms ");
?>
</body>
</html>
