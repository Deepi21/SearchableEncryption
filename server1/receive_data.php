<?php

include("sftp.util.php");
try {
	echo "<html><body bgcolor='azure'><center><h1 style='color:cadetblue;font-family:fantasy;font-size:50px'>Searchable Encryption over Cloud</h1></center><br><br>";
	$target_dir = "/var/www/html/server1/uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	//echo $_FILES["fileToUpload"]["tmp_name"]
    $dir_list=scandir($target_dir);
	if(array_search(basename($target_file),$dir_list)==false){
	if ($_FILES["fileToUpload"]["size"] > 3000000) 
	{
		echo "<br><center><b><font color='#08248E'>Sorry, your file is too large.</font></center></b>";
		$uploadOk = 0; 
	}

	if ($uploadOk == 0)
	{
		echo "<br><center><b><font color='#08248E'>Sorry, your file was not uploaded.</font></center></b>";

	} else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			echo "<b><center><font color='#08248E'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been moved</font></center></b>"; echo nl2br("\n");
			
		}
		else 
		{
			echo "<center>Sorry, there was an error uploading your file.</center>";
		}
	}
	echo "</body>";

	$array=$_POST["keyword"];
	$array=basename($target_file)."!".$array;
	file_put_contents('keywords.txt', $array);
	$data = file_get_contents('keywords.txt');
	$key_source ='/var/www/html/server1/keywords.txt';
	$key_dest = '/var/www/html/server2/keywords.txt';
	
	upload_ssh2file($key_source , $key_dest);
	
	
	$url = "http://139.59.15.153:82/keywordExtract.php";
	$ch = curl_init($url);
	curl_exec($ch);
	//unlink($target_file);
	unlink('keywords.txt');
}
else{
	echo "<center>File already exists. Please, try with another file or name.</center>";
}
} catch(Exception $e) { echo "Error"; }

?>
