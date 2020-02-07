<?php

require_once 'data-handler.php';
require_once 'database.php';
if (!isset($_SESSION['user_id'])) {
    header('Location:login.php');

}
?>
<html>
    <head>
        <title>Blog Post</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>

        <h2>Blog Posts</h2>
<form method="POST" action="blog-post.php">
<div class="right">
        <input type="submit" id="manage" name="manage" value="Manage Category">
        <input type="submit" id="profile" name="profile" value="My Profile">
        <input type="submit" id="logout" name="logout" value="Log Out">
</div>
<input type="submit" name="addblog" id="addblogpost" value="Add Blog Post">
<div class="container">
            <?php

$result = fetchData('blog_post', '*', 'where user_id = ' . $_SESSION['user_id']);
if (@mysqli_num_rows($result) == 0) {
    echo "No blogs yet !";
} else {?>
    <table border="1" cellpadding="10px" class="data">
            <tr>
                <th>Post ID</th>
                <th>Category Name</th>
                <th>Post Title</th>
                <th>Published Date</th>
                <th>Actions</th>
            </tr>


    <?php while ($row = mysqli_fetch_row($result)): ?>
        <tr>
                <td><a href="view.php?view_id=<?php echo $row[0]; ?>"><?php echo $row[0]; ?></a></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td>
                <a href="edit-blog-post.php?editblog_id='<?php echo $row[0]; ?>'">Edit</a>
                <a href="blog-post.php?deleteblog_id=<?php echo $row[0]; ?>">Delete</a>
                </td>
</tr>
<?php endwhile;}?>
        </table>
        </div>
<?php
if (isset($_GET['deleteblog_id'])) {
    deleteData('blog_post', $_GET['deleteblog_id']);
    deleteData('post_category', $_GET['deleteblog_id']);
    header('Location: blog-post.php');
}
?>
</form>
</body>
</html>