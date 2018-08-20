<?php
	include ("index_creation.php");
	include ("sftp.util.php");
	
	$file=file_get_contents('/var/www/html/server2/keywords.txt');
	//echo $file;

	$file=$file.' ';
	$n=strlen($file);
	$file_name;
	$a=0;
	$b=0;
	$k=0;
	for($i=0;$i<$n;$i++)
	{

		if($file[$i]=='!')
		{
			if($k==0)
			{
				$file_name=substr($file,$a,$i-$a);
				$k++;
				$a=$i+1;	
				break;
			}						
		}
	}
	
	//Connecting to database
	$con=mysqli_connect("localhost", "root", "password" );
	mysqli_select_db($con,"project_major");
	$result = mysqli_query($con,"select * from filters"); 
	$no_of_rows=($result->num_rows);
	$idNum=$no_of_rows+1;
	$queryy="insert into filenames values($idNum,'$file_name')";
	$result = mysqli_query($con,$queryy);
	echo "<b><center><font color='#08248E'>The paper id is ".$idNum."</font></center></b><br>";
	store_key(substr($file,$a,strlen($file)-$a-1));
	//unlink('keywords.txt');
?>
