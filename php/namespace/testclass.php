<?php
use Space\ClassA;
include 'ClassNoSpace.php';
var_dump(new ClassNoSpace());

include 'Space/ClassA.php';
var_dump(new ClassA()); // MUST: use Space\ClassA;