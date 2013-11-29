<?php

$money = 1231.1111;
$money = 0;
$money = 0.55555;
pr(sprintf("%.2f", $money));



echo sprintf("%1\$010d", 1); echo '<br>';
echo sprintf("%1\$010d", 1234567);echo '<br>';
echo sprintf("%1\$010d", '1234567891');