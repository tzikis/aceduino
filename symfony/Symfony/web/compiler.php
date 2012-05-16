<?php

# Assertions:
#     - Source file exists and is a valid *.pde file
#     - Source file uses only core libraries
#     - Source file does NOT have an *.pde extension
#     - Core libraries are already compiled in build/core

# Where is this included?

function dothis($cmd, &$ret) { echo "\$ $cmd\n"; passthru($cmd, $ret); }
function dothat($cmd, &$out, &$ret) { exec($cmd, $out, $ret); }

function config_output($output, $filename, &$lines, &$output_string)
{
	$output_string = "";
	$lines = array();
	foreach($output as $i)
	{
		$fat1 = "build/".$filename.":";
		$fat2 = "build/core/";
		$i = str_replace($fat1, " ", $i);
		$i = str_replace($fat2, " ", $i);
		
		$i = str_replace($filename.":", " ", $i)."<br />\n";
		// $i = $i."\n<br />";
		$output_string .= $i;
		$colon = strpos($i, ":");
		$number = intval(substr($i, 0, $colon));
		$j = 0;
		for($j = 0; $j < $colon ; $j++)
		{
			if(!(strpos("1234567890", $i{$j}) === FALSE))
				break;
		}
		if(!($colon === FALSE) && $j < $colon)
		{
			$lines[] = $number;
		}
		
	}
}
function do_compile($path, $filename, &$output, &$success, &$error)
{
	$oldcwd = getcwd(); // Use absolute pathnames in the future
	chdir($path); // This can fail too.

	// Temporary: some error checking?
	// This is ugly...
	$error = 0;

	// General flags. Theese are common for all projects. Should be moved to a higher-level configuration.
	// Got these from original SConstruct. Get a monkey to check them?
	$CPPFLAGS = "-ffunction-sections -fdata-sections -fno-exceptions -funsigned-char -funsigned-bitfields -fpack-struct -fshort-enums -Os";
	$LDFLAGS = "-Os -Wl,--gc-sections -lm";

	// This is temporary too :(
	$CPPFLAGS .= " -Ibuild/variants/standard";

	// Append project-specific stuff.
	$CPPFLAGS .= " -mmcu=atmega328p -DARDUINO=100 -DF_CPU=16000000L";
	$LDFLAGS .= " -mmcu=atmega328p";

	// Where to places these? How to compile them?
	$SOURCES = "build/core/wiring_shift.o build/core/wiring_pulse.o build/core/wiring_digital.o build/core/wiring_analog.o build/core/WInterrupts.o build/core/wiring.o build/core/Tone.o build/core/WMath.o build/core/HardwareSerial.o build/core/Print.o build/core/WString.o";

	// Handle object files from libraries. Different CFLAGS? HELP!
	// Different error code, depending where it failed?

	dothat("./preprocess.py $filename 2>&1", $out, $ret); $error |= $ret; // *.pde -> *.cpp
	if($ret) die("preprocess -  output: ".var_dump($output)." success: $success ret: $ret error: $error");
	$out = "";
	dothat("avr-g++ $CPPFLAGS -c -o $filename.o $filename.cpp -Ibuild/core 2>&1", $out, $ret); // *.cpp -> *.o
	$output = $out;
	$success = !$ret;
	if($success)
	{
		dothat("avr-gcc $LDFLAGS -o $filename.elf $filename.o $SOURCES 2>&1", $out, $ret); $error |= $ret; // *.o -> *.elf
		if($ret) die("avr-gcc -  output: ".var_dump($output)." success: $success ret: $ret error: $error");
		dothat("objcopy -O ihex -R .eeprom $filename.elf $filename.hex 2>&1", $out, $ret); $error |= $ret; // *.elf -> *.hex
		if($ret) die("objcopy -  output: ".var_dump($output)." success: $success ret: $ret error: $error");
		dothat("avr-size --target=ihex $filename.hex 2>&1", $out, $ret); $error |= $ret; // We should be checking this.
		if($ret) die("avr-size -  output: ".var_dump($output)." success: $success ret: $ret error: $error");		
	}
	if ($filename != "foo") // VERY TERMPORARY
	{
		if(file_exists($filename)) unlink($filename);	
	}
	else
	{
		if(file_exists($filename.".hex")) unlink($filename.".hex");	
	}
	if(file_exists($filename.".o")) unlink($filename.".o");	
	if(file_exists($filename.".cpp")) unlink($filename.".cpp");	
	if(file_exists($filename.".elf")) unlink($filename.".elf");	
	// Remeber to suggest a cronjob, in case something goes wrong...
	// find $path -name $filename.{o,cpp,elf,hex} -mtime +1 -delete

	chdir($oldcwd);
}
?>
