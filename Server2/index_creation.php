<?php

function store_key($array)
{
	$secret_key="deepika212anupriya198toshi1510&&";
	include ("bloomObject.php");
	include 'filename.php';


	$var_str = var_export($iv, true);
	$var = "<?php\n\n\$iv = $var_str;\n\n?>";
	file_put_contents('filename.php', $var);

	$start=0;
	$end=0;
	$array=$array.' ';
	$ele=0;
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


	for($x=1; $x<= $ele;$x++)
	{
		$db->add($key[$x-1]);
	}
	$vall=$db->addToDB();
	
}
?>
