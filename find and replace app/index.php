<?php
if(isset($_POST['text']) && isset($_POST['searchfor']) && isset($_POST['replacewith']))
{
    $text = $_POST['text'];
    $search = $_POST['searchfor'];
    $replace = $_POST['replacewith'];
    $offset = 0;
    $search_length = strlen($search);
    if(!empty($text) && !empty($search) && !empty($replace))
    {
            while($strpos = strpos($text,$search,$offset))
            {
                $text = substr_replace($text,$replace,$strpos,$search_length);
            }
            
    }
    else
    {
        echo "Please fill all the fields";
    }
}

?>

<form action="index.php" method="POST">

<textarea name="text" rows="5" cols="20">
<?php echo $text; ?>
</textarea><br><br>
Search for : <br>
<input type="text" name="searchfor"><br><br>
Replace with : <br>
<input type="text" name="replacewith"><br><br>
<input type="submit" value="Find and Replace">
</form>