<?php
ob_start();

echo "<h1>Hello from Yesha</h1>";

echo "<h2>Welcome to Cybercom Creation<h2>";

$data = ob_get_contents();
echo $data;








?>