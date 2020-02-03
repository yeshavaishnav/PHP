<?php

$agent = $_SERVER['HTTP_USER_AGENT'];
$browser = get_browser(null,true);
echo $browser['browser'];
?>