<?php
	
	echo "<html><body bgcolor='azure'><center><h1 style='color:cadetblue;font-family:fantasy;font-size:50px'>Searchable Encryption over Cloud</h1></center><br><br>";

	$stringg=$_POST["result"];

	$n=strlen($stringg);
	$x=0;$y=0;
	$a=0;
	if($n<=1){
		
		echo "<center><font color='#160172'><b>Sorry, no matching results:</b><br><br></font></center>";
		$end = microtime(true);
		echo "<script>console.log($end)</script>";
	}
	else
	{
		for($i=0;$i<$n;$i++)
		{
			if($stringg[$i]=='@')
			{
				$sub=substr($stringg, $a, $i-$a);
				$arr1[$x++]=$sub;
				$a=$i+1;
			}
			if($stringg[$i]=='!') 
			{
				$sub=substr($stringg,$a,$i-$a);
				$arr2[$y++]=$sub;
				$a=$i+1;
			}
		}
		$end = microtime(true);
		echo "<script>console.log($end)</script>";
		echo "<center> <font color='#160172'><b>Search results :</b><br><br>";
		for($i=0;$i<$x;$i++) 
		{
		echo "<br><b>File Number: ".$arr1[$i]."   ".$arr2[$i]."</b><br>";
		}
		echo "</font>";
		echo "<br><font size='4' color='#160172'>Please give the file number corresponding to year's data you want!</font>";

		echo '<br><form action="call.php" method="post"><input type="hidden"  name="hidd" value="'.$stringg.'"><input type="text" name="filename" required><br><input type="submit" name="submit"></form>';
		echo "</center>";
	}
	echo "</body>";
?>
