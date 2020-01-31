<?php

for ($i = 0; $i < 10; ++$i) {
    echo $i.'<br>';
}
$i = 0;
while ($i != 10) {
    echo $i.'<br>';
    ++$i;
}
do {
    echo $i.'<br>';
} while ($i != 10);

$colors = array('red', 'yellow', 'green');
foreach ($colors as $value) {
    echo $value.'<br>';
}
