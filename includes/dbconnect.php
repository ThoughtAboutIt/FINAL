<?php
$conn = mysqli_connect("sql307.byethost11.com","b11_16922317","g1zzm0123","b11_16922317_cms");
    if (!$conn)
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysqli_select_db($conn,"b11_16922317_cms"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>
