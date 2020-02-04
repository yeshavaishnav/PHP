<?php

require_once 'data-handler.php';
require_once 'database.php';
if(@$_SESSION['user_id']=="")
{
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
    <br><br>
    
        <table border="1" cellpadding="10px">
            <tr>
                <th>Post ID</th>
                <th>Category Name</th>
                <th>Title</th>
                <th>Published Date</th>
                <th>Actions</th>

            </tr>

            <tr>
            <?php

$result = fetchData('blog_post', '*','where user_id = '.$_SESSION['user_id']);
if (@mysqli_num_rows($result) == 0) {
    echo "No blogs yet !";
} else {
    while ($row = mysqli_fetch_row($result)): ?>

                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td>
                    <input type="submit" name="<?php echo $row[0]; ?>" value="Edit Post">
                    <input type="submit" name="<?php echo $row[0]; ?>" value="Delete Post">
                </td>
</tr>
<?php endwhile;}?>
        </table>
</form>

<?php
$deletepost_id = array_search('Delete Post', $_POST);
$_SESSION['deletepost_id'] = $deletepost_id;
if ($deletepost_id != "") {
    if (deleteData('blog_post', $deletepost_id) && deleteData('post_category', $deletepost_id)) {

        header('Location: blog-post.php');
    }
}

$editpost_id = array_search('Edit Post', $_POST);
$_SESSION['editpost_id'] = $editpost_id;
if ($editpost_id != "") {
    header('Location:edit-blog-post.php');

}
?>
</body>
</html>