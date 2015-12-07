<?php
    function logToFile($msg)
    {
        //open the txt file with append privileges
        $myfile = fopen("logs/log.txt", "a") or die ("Unable to open file!");
        // prepare the log message in a string with timestamp and clients IP address
        $txt = date ('Y-m-d H:i:s') . ":" . $msg . "(" . $_SERVER["REMOTE_ADDR"] . ")\n";
        fwrite ($myfile, $txt);
        //close the txt file
        fclose ($myfile);    
    }
?>
