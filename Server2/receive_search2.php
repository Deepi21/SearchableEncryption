<?php
   
	include('searching.php');
	include('filename.php');
	
	
	$array=file_get_contents('keywordSearch.txt');
	$start=0;
	$end=0;
	$array=$array.' ';
	$ele=0;
	//To be changed here 
	$secret_key="deepika212anupriya198toshi1510&&";

	for($x=0;$x<strlen($array);$x++)
	{
		
		if($array[$end]==' ')
		{
			$str=substr($array,$start,$end-$start);

			$str1=strtolower($str);
			$encrypted_string = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secret_key, $str1, MCRYPT_MODE_CBC, $iv);
			$key[$ele++]=$encrypted_string;
			$start=$end+1;	
		}
		$end++;
	}
	sort($key);	
	search_process($key);
	//unlink('keywordSearch.txt');
	
?>
