<?php
require_once 'data-handler.php';
require_once 'database.php';
?>
<html>
    <head>
        <title>View Blogs</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div>
        <table border="1" cellpadding="10px">
            <tr>
            <?php
$conn = connection_open();
$query = 'SELECT * FROM blog_post WHERE id = ' . $_GET['view_id'];
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
?>
                <th>ID</th>
                <th>Blog title</th>
                <th>Category</th>
                <th>Url</th>
                <th>Content</th>
                <th>Image</th>
            </tr>
           <tr>
           <td><?php echo $row[0]; ?></td>
           <td><?php echo $row[2]; ?></td>
           <td><?php echo $row[3]; ?></td>
           <td><?php echo $row[4]; ?></td>
           <td><?php echo $row[5]; ?></td>
           <td><img src="<?php echo $row[6]; ?>" height="40px" width="40px"></td>
           </tr>

        </table>
        </div>
</body>
</html>