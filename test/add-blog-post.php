<?php
 require_once('database.php');
 require_once('data-handler.php');

?>

<html>
    <head>
        <title>Add new blog post</title>
    </head>
    <body>
        <form method="POST" action="add-blog-post.php">
            <h2 align="center">Add new blog post</h2>
            <table align="center" cellpadding="10px">
                <tr>
                    <td><label for="btitle">Title</label></td>
                    <td>
                        <input type="text" name="btitle" id="btitle">
                    </td>
                </tr>
                <tr>
                    <td><label for="bcontent">Content</label></td>
                    <td><textarea name="bcontent" rows="4" cols="20"></textarea></td>
                </tr>
                <tr>
                    <td><label for="burl">Url</label></td>
                    <td><input type="btext" name="burl" id="url"></td>
                </tr>
                <tr>
                    <td>
                        <label for="publishedAt">Published At</label>
                    </td>
                    <td><input type="date" name="publishedAt" id="publishedAt"></td>
                </tr>
                <tr>
                    <td><label for="bcategory">Category</label></td>
                    <td><select name="bcategory" multiple>
                        <?php 
                        $conn = connection_open();
                        $sql = "SELECT ctitle from category";
                        $result = mysqli_query($conn,$sql);
                       
                       while($row = mysqli_fetch_assoc($result)):
                       ?>
                        <option value="<?php echo $row['ctitle']; ?>"><?php echo $row['ctitle']; ?></option>
                        <?php endwhile?>
                    </select></td>
                </tr>
                <tr>
                    <td>
                        <label for="bimage">Image</label>
                    </td>
                    <td><input type="file" accept="image/*" name="bimage"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="addblogpost" value="submit">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>