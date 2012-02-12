<?php

function iterate_dir($directory)
{
	$dir = opendir($directory);
	$dir = readdir();
	$array = array();
	while(!($dir === FALSE))
	{
		$array[] = $dir;
		// echo $dir."<br />";
		$dir = readdir();
	}
	for($i = 0; $i <= count($array); $i++ )
	{
		if($array[$i] == "." || $array[$i] == "..")
			unset($array[$i]);
	}

	sort($array);
	closedir($dir);
	return $array;
}

$array = iterate_dir("examples");
for($i = 0; $i < count($array); $i++ )
{
	$array2 = iterate_dir("examples/".$array[$i]);
	$array[$i] = array($array[$i], $array2);
}

for($i = 0; $i < count($array); $i++ )
{
	echo $array[$i][0]."<br />";
	for($j = 0; $j < count($array[$i][1]); $j++)
	{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$array[$i][1][$j]."<br />";
	}
}

?>