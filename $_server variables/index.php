<?php

include('header.php');

if(isset($_POST['submit']))
{
    echo "Process 1";
}
echo $_SERVER['HTTP_HOST'];


?>