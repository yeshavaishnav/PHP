<?php

$find = array("yesha","misha","ushma");
$replace = array('y***a','m***a','u***a');



if(isset($_POST['userinput']) && !empty($_POST['userinput']))
{
    $user_input = $_POST['userinput'];
    $user_input_new = str_replace($find,$replace,$user_input);
    echo $user_input_new;
}

?>


<hr>
<form method="post" action="index.php">
<textarea name="userinput" rows="3" cols="15">


</textarea>
<br><br>
<input type="submit" value="SUBMIT">
</form>