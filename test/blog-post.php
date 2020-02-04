<?php

require_once 'data-handler.php';
require_once 'database.php';

?>
<html>
    <head>
        <title>Blog Post</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>




        <h2>Blog Posts</h2>
<form method="POST" action="blog-post.php">
    <input type="submit" name="addblog" value="Add Blog Post">
    <div class="right">
        <input type="submit" name="manage" value="Manage Category">
        <input type="submit" name="profile" value="My Profile">
        <input type="submit" name="logout" value="Log Out">
</div>
        <table>
            <tr>
                <th>Post ID</th>
                <th>Category Name</th>
                <th>Title</th>
                <th>Published Date</th>
                <th>Actions</th>

            </tr>

            <tr>
            <?php

$result = fetchData('blog_post', '*');
if (@mysqli_num_rows($result) == 0) {
    echo "No blogs yet !";
} else {
    while ($row = mysqli_fetch_row($result)): ?>

                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[3];?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td>
                    <input type="submit" name="<?php echo $row['id'];?>" value="Edit Post">
                    <input type="submit" name="<?php echo $row['id'];?>" value="Delete Post">
                </td>
</tr>
<?php endwhile;}?>
        </table>
</form>
</body>
</html>