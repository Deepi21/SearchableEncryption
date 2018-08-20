<?php
	include("sftp.util.php");
	$sr=$_POST["hidd"];
	$no=$_POST["filename"];
	$n=strlen($sr);
	$x=0;$y=0;
	$a=0;
	for($i=0;$i<$n;$i++)
	{
		if($sr[$i]=='@')
		{
			$sub=substr($sr, $a, $i-$a);
			$arr1[$x++]=$sub;
			$a=$i+1;
		}
		if($sr[$i]=='!')
		{
			$sub=substr($sr,$a,$i-$a);
			$arr2[$y++]=$sub;
			$a=$i+1;
		}
	}
	$fname=$arr2[$no-1];
	echo '<body onload="document.getElementById('."'clickk'".').click();">';
	echo '<a id="clickk" href=" http://139.59.15.153:82/download.php?file='.$fname.'"></a>';
	
	echo '</body>';
?>

