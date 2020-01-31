<?php

$redirect = true;
$redirect_page = 'http://google.com';
if($redirect == true)
{
    header('Location: '.$redirect_page);
}

?>