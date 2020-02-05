<?php
require_once('data-handler.php');
require_once('database.php');
?>
<html>
    <head>
        <title>View Blogs</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <table>
            <tr>
                <th>ID</th>
                <th>Blog title</th>
                <th>Category</th>
                <th>Url</th>
                <th>Content</th>
                <th>Image</th>
            </tr>
            <tr>
               
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[2];?></td>
                <td><?php echo $row[3];?></td>
                <td><?php echo $row[4];?></td>
                <td><?php echo $row[5];?></td>
</tr>
                  
        </table>
</body>
</html>