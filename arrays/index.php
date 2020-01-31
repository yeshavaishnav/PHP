<?php
    $color = array("red" => 1,"yellow" => 2,"green" => 3);
    print_r($color);
    
    print_r($color);

    foreach($color as $key=>$value)
    {
        echo $key."=>".$value."<br>";
    }
    echo "<br><br><br>";
    $food = array ('healthy'=> array('salad','vegetables'), 'unhealthy'=>array('pizza','pasta'));
    //echo $food['healthy'][0]."<br>";
    //echo $food['healthy'][1]."<br>";
    //echo $food['unhealthy'][0]."<br>";
    //echo $food['unhealthy'][1]."<br>";
    foreach($food as $element=>$inner_array)
    {
        echo "<strong>".$element."</strong><br>";
        foreach($inner_array as $item)
        {
            echo $item."<br>";
        }
    }
?>