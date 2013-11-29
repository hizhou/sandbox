<?php 
var_dump(ini_get("disable_functions"));
ini_set("disable_functions", "var_dump,print_r");
var_dump(ini_get("disable_functions"));