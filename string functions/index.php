<?php
    $string = 'My name is Yesha';
    echo str_word_count($string)."<br>";
    echo str_shuffle($string)."<br>";
    echo strlen($string)."<br>";
    echo substr($string,0,5)."<br>";
    
    $string2 = "I am Yesha";
    similar_text($string,$string2,$result);
    echo "similarity is ".$result;

?>