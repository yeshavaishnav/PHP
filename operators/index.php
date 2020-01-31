<?php
    // assignment operators
    $a = 10;
    $b = $a + 5;
    echo $b.'<br>';
    $b += 5;
    echo $b.'<br>';
    ++$b;
    echo $b.'<br>';

    //comparision operators
    $x = 70;
    $y = 50;
    if ($x > $y) {
        echo 'x is greater than y'.'<br>';
    } else {
        echo 'y is greater than x'.'<br>';
    }

    //logical operators

    if ($x and $y) {
        echo 'true'.'<br>';
    } else {
        echo 'false'.'<br>';
    }
    if ($x or $y) {
        echo 'true'.'<br>';
    } else {
        echo 'false'.'<br>';
    }
    if ($x xor $y) {
        echo 'true'.'<br>';
    } else {
        echo 'false'.'<br>';
    }

    $name = 'yesha';
    $fullname = 'vaishnav';
    $fullname .= $name;
    echo $fullname.'<br>';

    $num1 = '1';
    $num2 = 1;
    if ($num1 == $num2) {
        echo 'equal'.'<br>';
    } else {
        echo 'not equal'.'<br>';
    }
    if ($num1 === $num2) {
        echo 'equal'.'<br>';
    } else {
        echo 'not equal'.'<br>';
    }
