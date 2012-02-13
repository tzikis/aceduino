<?php
$extension = ".pde";
$filename = "CXqLVyCvVQ";
system("cp /var/www/aceduino/symfony/files/".$filename." /var/www/aceduino/symfony/compiler/".$filename.$extension, $success);
if(!$success)
{
	$output = array();
	 exec("cd /var/www/aceduino/symfony/compiler/ && scons FILENAME=".$filename." 2>&1 1>/dev/null", $output, $success);
	if(!$success)
		echo "Compiled succesfully!";
	else
	{
		for($i = 0; $i < count($output)-1; $i++)
		{
			$fat = "build/".$filename.$extension.":";
			// echo $fat;
			$output[$i] = str_replace($fat, " ", $output[$i]);
			echo $output[$i]."\n<br />";
		}
	}
	system("cp /var/www/aceduino/symfony/compiler/".$filename.".hex /var/www/aceduino/symfony/files/", $success);
	if(!$success)
		system("rm /var/www/aceduino/symfony/compiler/build/".$filename."* && rm /var/www/aceduino/symfony/compiler/".$filename."*", $success);
	
}
?>