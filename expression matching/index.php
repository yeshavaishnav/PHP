<?php

$string = "My name is Yesha Vaishnav";

if(preg_match('/Yesha/',$string))
{
    echo "match found";
}
else
{
    echo "match not found";
}

?>