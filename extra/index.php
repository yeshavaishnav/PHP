<?php
function display()
{
    $i = 1;
    $array= array();
while($i<8)
{
    if($i<4)
    {
        $array[$i] = array();
    }
    else
    {
            for($k = 2; $k <= count($array); $k++)
            {
                if(count($array[$k])<2)
                {
                    array_push($array[$k],$i);
                break;
                }
            }
           
    }
$i++;
}
$newArray = array('1' => array('2'=>$array[2],'3'=>$array[3]));
return $newArray;
}
$arr = display();
echo "<pre>";
print_r($arr);
echo "</pre>";
