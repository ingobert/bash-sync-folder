#!/usr/bin/php
<?php
unset($argv[0]);


if (empty($argv)){
	echo "usage  basedir  file to copy \n";
	exit;
}
$baseDir=$argv[1];
$file = $argv[2];

#echo "baseDir $baseDir, file $file\n";
$configFile = "$baseDir/config.ini";
#echo "===Trigger===\n";
#echo "search config.ini in $baseDir...";
if(is_file($configFile)){
#	echo "found!\n";
	$data = parse_ini_file($configFile);
	$servers = explode(',',$data['server']);
	$ignore = explode(',',$data['ignore']);
	
	
	foreach ($ignore  as $pattern ){
		$pattern=trim($pattern);
		if(preg_match("/$pattern/", $file)){
			echo "$file is on ignorelist\n";
		
			return;
		} else {
		#	echo "NO MATCH /$pattern/, $file\n";
		}
	}

	foreach($servers as $server){
		$server  = trim($server);
		$cmd="scp -r $file $server:{$data['targetPath']}";
	#	echo "$cmd\n";
		exec($cmd);
	}


/*
	print_r($ignore);
	print_r($data);

*/

}else {
	echo "not found!\n";
	exit;
}



#print_r($argv);
#exec($cmd);


