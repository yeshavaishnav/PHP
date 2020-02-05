<?php

$handle = fopen('file.txt','w');
 fwrite($handle,"Yesha");


// $handle =fopen('file.txt','a');
// fwrite($handle,"Misha");    


$handle = fopen('file.txt','r');
$data = fread($handle,filesize('file.txt'));

$names = explode(",",$data);

foreach($names as $value)
{
    echo $value."<br>";
}
$directory = "files";
if($handle = opendir($directory.'/'))
{
    while($file = readdir($handle))
    {
        if($file!='.' && $file!='..')
        {
            echo '<a href="'.$directory.'/'.$file.'">'.$file."</a><br>";
        }
    }
}
$filename = 'file.txt';
// if(unlink($filename))
// {
//     echo "File has been deleted";
// }
// else
// {
//     echo "File cannot be deleted";
// }

$random = rand(1,9);
if(rename($filename,$random.".txt"))
{
    echo "File ".$filename." has been renamed to ".$random."<br>";
}


$name = $_FILES['file']['name'];
// $size = $_FILES['file']['size'];
// $type = $_FILES['file']['type'];
$tmp_name = $_FILES['file']['tmp_name'];

if(isset($name))
{
    if(!empty($name))
    {

        $location = 'uploads/';

        if(move_uploaded_file($tmp_name,$location.$name)){
            echo "uploaded";
        }
    }
    else
    {
        echo "Please choose a file";
    }
}

?>
<form action="file.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file"><br><br>
<input type="submit" name="submit" value="UPLOAD">
</form>