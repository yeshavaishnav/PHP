<html>
    <head>
        <title>Add Post</title>
    </head>
    <body>
       
        <form method="POST" action="insert">
            <table>
                <tr>
                    <td><label for="title">Title</label></td>
                    <td><input type="text" name="title" id="title" value="<?php echo $posts['title'];?>"></td>
                </tr>
                <tr>
                    <td><label for="content">Content</label></td>
                    <td>
                        <textarea name="content" id="content" rows="3" cols="20">
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="edit" value="edit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>