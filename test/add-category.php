<?php
require_once 'database.php';
require_once 'data-handler.php';
if(@$_SESSION['user_id']=="")
{
    header('Location:login.php');
    
}
?>

<html>
    <head>
        <title>Add new category</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form method="POST" action="add-category.php">
            <h2 align="center">Add new category</h2>
            <table align="center" cellpadding="10px">
                <tr>
                    <td><label for="ctitle">Title</label></td>
                    <td>
                        <input type="text" name="ctitle" id="ctitle">
                    </td>
                </tr>
                <tr>
                    <td><label for="ccontent">Content</label></td>
                    <td><textarea name="ccontent" rows="4" cols="20"></textarea></td>
                </tr>
                <tr>
                    <td><label for="curl">Url</label></td>
                    <td><input type="text" name="curl" id="curl"></td>
                </tr>
                <tr>
                    <td><label for="metatitle">Meta title</label></td>
                    <td><input type="text" name="metatitle" id="metatitle"></td>
                </tr>
                <tr>
                    <td><label for="parent">Parent Category</label></td>
                    <td><select name="parent">
                    <option></option>
                        <?php
$i = 1;
$category = ['electronics', 'entertainment', 'politics', 'education', 'healthcare'];
foreach ($category as $key => $value): ?>
                        <option value="<?php echo $i;
$i++; ?>"><?php echo $value; ?></option>
                        <?php endforeach;?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="cimage">Image</label></td>
                    <td><input type="file" name="cimage" accept="cimage/*"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="addcategory" value="submit" id="add">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>