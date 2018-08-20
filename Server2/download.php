<?php

include("download1.php");
include("sftp.util.php");
if(isset($_GET["file"])){
    $file = $_GET["file"];
      // define some variables
	$src_file = '/var/www/html/server1/uploads/' . $file; // this $file variable is relative path or absolute ? relative
	$dest_file = '/var/www/html/server2/' . $file;
	download_ssh2file($src_file,$dest_file);
	$path_parts = pathinfo($file);
	$extn= $path_parts['extension'];
	header('Content-Disposition: attachment; filename="'.$file.'"');
	call_func($file,$extn);
	unlink($file);  
}
?>
