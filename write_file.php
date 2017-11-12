<!DOCTYPE html>
<html>

<body>
	
<?php
/**
 * Purpose of this script is to write a file when data is received from a 'is this helpful' button. 
 * The javascript of this button will share which page is useful, and which page is not.
*/

function getGUID(){
	// From http://guid.us/GUID/PHP
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

// TODO: You will need to set the directory to full access in order for it to be written to.

// Create the file with a date-stamped and guid-stamped filename.
$guid = getGUID();  												// This can be changed if in windows.
//echo $guid;
$timestamp = date("Y-m-d-h-i-sa");

$my_file = 'feedback_forms/'.$timestamp.'-'.$guid;
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

$data = "<helpful>".$_POST["response"].'</helpful><timestamp>'.$timestamp.'</timestamp><source_url>'.$_POST["send_url"].'</source_url>';
fwrite($handle, $data);
//echo ('That file saved');
?>

</body>

</html>
