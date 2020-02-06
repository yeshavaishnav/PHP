<?php
require_once 'database.php';
require_once 'data-handler.php';

if (@$_SESSION['user_id'] == "") {
    header('Location:login.php');

}

$_SESSION['editcategory_id'] = $_GET['editcategory_id'];
?>

<html>
    <head>
        <title>Edit category</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <?php
$conn = connection_open();
$query = "SELECT * FROM category where id = " . $_GET['editcategory_id'];

if ($result = mysqli_query($conn, $query)) {
    if ($row = mysqli_fetch_row($result)) {

        ?>


        <form method="POST" action="edit-category.php">
            <h2 align="center">Edit category</h2>
            <table align="center" cellpadding="10px">
                <tr>
                    <td><label for="ctitle">Title</label></td>
                    <td>
                        <input type="text" name="ctitle" id="ctitle" value="<?php echo $row[2]; ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="ccontent">Content</label></td>
                    <td><textarea name="ccontent" rows="4" cols="20"><?php echo $row[5]; ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="curl">Url</label></td>
                    <td><input type="text" name="curl" id="curl" value="<?php echo $row[4]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="metatitle">Meta title</label></td>
                    <td><input type="text" name="metatitle" id="metatitle" value="<?php echo $row[3]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="parent">Parent Category</label></td>
                    <td><select name="parent">
                        <?php
$category = ['electronics', 'entertainment', 'politics', 'education', 'healthcare'];
        $i = 1;
        foreach ($category as $key => $value): ?>
                        <option value="<?php echo $i;
        $_SESSION['parent'] = $i;
        $i++; ?>"><?php echo $value; ?></option>
                        <?php endforeach;?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="cimage">Image</label></td>
                    <td><input type="file" name="cimage" accept="images/*"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="editcategory" value="EDIT" id="edit">
                    </td>
                </tr>
            </table>
        </form>
                        <?php }}?>
    </body>
</html>