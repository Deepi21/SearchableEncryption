<?php
	include ("bloom.php");
	$db=new BloomFilter(900,7);
	$x=$db->getK(100,10);
	$db->__construct(100,$x);
?>