<?php
/*
$random = rand();
echo $random."<br>";
$random_max = getrandmax();
echo $random_max;
*/
if(isset($_POST['roll']))
{
    $random = rand(1,6);
    echo $random;
}



?>
<form method="POST" action="index.php">

<input type="submit" name="roll" value="Roll dice">

</form>