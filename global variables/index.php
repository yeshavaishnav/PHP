<?php

    $name = "Yesha"."<br>";
    echo $name;
    function display()
    {
        global $name;
        echo "Your name is : ".$name;
    }
    display();

?>