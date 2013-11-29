<?php
$zip = new ZipArchive();
$zip->open('a.zip', ZipArchive::CREATE);

$file1 = 'D:\My\_DATA\a.txt';
$file2 = 'D:\My\_DATA\a.ppt';

$zip->addFile($file1, basename($file1));
$zip->addFile($file2, basename($file2));
$zip->close();

