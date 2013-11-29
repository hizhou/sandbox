<?php

$num = rand(1,3);

$img = "v$num.jpg";

include ('Valite.php');
echo "<img src='$img' /><br>";

$valid = new Valite();
$valid->setImage($img);
$valid->getHec();
$validCode = $valid->run();
echo $validCode;

?>