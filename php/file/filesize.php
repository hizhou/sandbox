<?php
$file = 'a.txt';
$fp = fopen($file, "a+");
$str = str_repeat('a', 1024 * 1024);
for ($i=0; $i < 100; $i++) {
	fwrite($fp, $str);
	//clearstatcache();
	//pr(filesize($file));

	$s = fstat($fp);
	pr($s['size']);
}
fclose($fp);