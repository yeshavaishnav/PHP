<?php

$time = time();
$time_now = date('H:i:s',$time);

$time_modified = date('H:i:s',$time - (7*24*30*30));

echo "the time now is : ".$time_now." <br> time modified is : ".$time_modified;

?>
