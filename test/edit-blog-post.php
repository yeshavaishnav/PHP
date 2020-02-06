<?php
require_once 'database.php';
require_once 'data-handler.php';

if (@$_SESSION['user_id'] == "") {
    header('Location:login.php');

}
?>

<html>
    <head>
        <title>Edit blog post</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <?php

$conn = connection_open();
$_SESSION['editblog_id'] = $_GET['editblog_id'];
$query = "SELECT * FROM blog_post where id = " . $_SESSION['editblog_id'];

if ($result = mysqli_query($conn, $query)) {
    if ($row = mysqli_fetch_row($result)) {

        ?>
        <form method="POST" action="edit-blog-post.php">
            <h2 align="center">Edit blog post</h2>
            <table align="center" cellpadding="10px">
                <tr>
                    <td><label for="btitle">Title</label></td>
                    <td>
                        <input type="text" name="btitle" id="btitle" value="<?php echo $row[2] ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="bcontent">Content</label></td>
                    <td><textarea name="bcontent" rows="4" cols="20">
                    <?php echo $row[5]; ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="burl">Url</label></td>
                    <td><input type="text" name="burl" id="url" value="<?php echo $row[4] ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="publishedAt">Published At</label>
                    </td>
                    <td><input type="date" name="publishedAt" id="publishedAt" value="<?php echo $row[7] ?>"></td>
                </tr>
                <tr>
                    <td><label for="bcategory">Category</label></td>
                    <td><select name="bcategory" multiple>
                        <?php
$conn = connection_open();
        $sql = "SELECT ctitle from category";
        $result = mysqli_query($conn, $sql);

        while ($rows = mysqli_fetch_assoc($result)):

        ?>
                        <option value="<?php echo $rows['ctitle']; ?>" <?php $title = $row[3];
        if (strpos($title, ',')) {
            $title = explode(',', $title);
            if (in_array($rows['ctitle'], $title)) {echo 'selected';} else {
                echo "";
            }
        } else {
            if ($rows['ctitle'] == $row[3]) {echo 'selected';} else {
                echo "";
            }

        }
        ?>><?php echo $rows['ctitle']; ?></option>
                        <?php endwhile?>
                    </select></td>
                </tr>
                <tr>
                    <td>
                        <label for="bimage">Image</label>
                    </td>
                    <td><input type="file" accept="images/*" name="bimage" value="<?php echo $row[6]; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="editblogpost" value="edit">
                    </td>
                </tr>
            </table>
        </form>
                       <?php }}?>
    </body>
</html>