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
        <title>Blog Category</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>

        <h2>Blog Category</h2>
<form method="POST">
    <input type="submit" name="add" id="addcategory" value="Add Category">
    <br><br>

    <div class="right">
        <input type="submit"  id="manage" name="manage" value="Manage Category">
        <input type="submit" id="profile" name="profile" value="My Profile">
        <input type="submit" id="logout" name="logout" value="Log Out">
    </div>

        <table border="1" cellpadding="10px">

            <tr>
            <th>Category ID</th>
                <th>Category Image</th>
                <th>Category Name</th>
                <th>Created Date</th>
                <th>Actions</th>
</tr>

                <?php
$result = fetchData('category', '*');
if (@mysqli_num_rows($result) == 0) {
    echo "No categories yet !";
} else {
    while ($row = mysqli_fetch_row($result)): ?>
    <tr>
    <td><?php echo $row[0]; ?></td>
    <td><img src="<?php echo $row[6]; ?>" height="40px" width="40px"></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[7]; ?></td>
    <td><input type="submit" name="<?php echo $row[0]; ?>" value="Edit Category">
<input type="submit" name="<?php echo $row[0]; ?>" value="Delete Category"></td>
    </tr>

    <?php endwhile;}?>
        </table>

<?php
$deletecategory_id = array_search('Delete Category', $_POST);
$_SESSION['deletecategory_id'] = $deletecategory_id;
if ($deletecategory_id != "") {
    if (deleteData('category', $deletecategory_id)) {

        header('Location: blog-category.php');
    }
}

$editcategory_id = array_search('Edit Category', $_POST);
$_SESSION['editcategory_id'] = $editcategory_id;
if ($editcategory_id != "") {
    header('Location:edit-category.php');

}
?>


</form>
</body>
</html>