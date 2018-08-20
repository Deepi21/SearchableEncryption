<?php
	
	
	function search_process($keywords)
	{
		$start = microtime(true);
		echo "<script>console.log($start)</script>";
		include ("bloomObject.php");
		//Step1: Create	an array equal to the number of papers and initialize it to 0.

		$con=mysqli_connect("localhost", "root", "password");
		mysqli_select_db($con,"project_major");
        //Step2: Get the scores of all the files for the searched keyword. 
		$values=$db->extractFromDB($keywords);
		$coo=count($values);
		
	class mystruct
		{
			public $ind;
			public $score;
		}
		$obj[]=new mystruct();
		for($x=0;$x<$coo;$x++)
		{
			$obj[$x]=new mystruct();
			$obj[$x]->ind=$x;
			$obj[$x]->score=$values[$x];
		}
		echo "<ul>";
		$count=0;
		$result="";$ct=1;
		$curr_year=date("Y");
		echo "<center>";
		for($x=0;$x<5;$x=$x+1){
					$retrieve[$x]="";
				}
		//Step 3: Get the files with matching area of past 5 years 
		for($x=0;$x<$coo;$x++)
		{
			$scr=$obj[$x]->score;
			if($scr==0)
			{
				$count=$count+1;
			}			
			else{
				//If score value is not zero, then check if its year is in 5 year range.
				$myin=($obj[$x]->ind+1);
				$query= mysqli_query($con,"SELECT DISTINCT name FROM filenames WHERE Id = $myin");
				$rows=mysqli_fetch_array($query);
				$file=$rows['name'];
				
				$filename = basename($file);
				$file_year=substr($filename,strrpos($filename,"_")+1,4);
				$diff=$curr_year-$file_year;
                
				if($diff<5){
					$retrieve[$diff]=$retrieve[$diff].$filename."!";					
				}
				
			} 
		}
		
		for($x=0;$x<5;$x=$x+1){
			if($retrieve[$x]!=""){
				$s=0;$flag=0;
				for($i=0;$i<strlen($retrieve[$x]);$i++){
					if(($retrieve[$x])[$i]=='!'){
						$f=substr($retrieve[$x],$s,$i-$s);
						$result=$result.$ct."@".$f."!";
						$ct=$ct+1;
						$s=$i+1;
						$flag=1;
					}
				}
				if($flag==0){
				$result=$result.$ct."@".$retrieve[$x]."!";
				$ct=$ct+1;}
			}
		}
	
		//Step 4. Forward the request to the display.php
	echo "<form method='post' action='http://139.59.15.153:81/display.php'> 
		<input type='submit' id='s' name='result' value= \"$result\"></form> 
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script>$(document).ready(function(){
			$(\"#s\").hide();
			$(\"#s\").trigger(\"click\");
		})</script>"; 
		
		
	}
	
?>
