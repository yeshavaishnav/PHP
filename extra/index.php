<?php
$arr =array('1'=>array());
$i = 1;


   
foreach($arr as $key=>$value)
{
    if($key == 1)
    {
        for($j =0; $j < 2; $j++)
        {
            $arr[$key][++$i] = array(); 
        }
    }
    else
    {
        foreach($value as $element=>$item){            
        for($j =0; $j < 2; $j++)
        {
            $item[$j] = ++$i;  
        }
    }     
        
    }
}
echo "<pre>";
print_r($arr);
echo "</pre>";
?>