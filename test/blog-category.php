<?php
require_once 'data-handler.php';
require_once 'database.php';

if (@$_SESSION['user_id'] == "") {
    header('Location:login.php');

}
?>
<html>
    <head>
        <title>Blog Category</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
        <h2>Blog Category</h2>
<form method="POST">



    <div class="right">
        <input type="submit"  id="manage" name="manage" value="Manage Category">
        <input type="submit" id="profile" name="profile" value="My Profile">
        <input type="submit" id="logout" name="logout" value="Log Out">
    </div>
    <input type="submit" name="add" id="addcategory" value="Add Category">
    <div class="container">
    
        

                <?php
$result = fetchData('category', '*');
if (@mysqli_num_rows($result) == 0) {
    echo "No categories yet !";
} else {?>

    <table border="1" cellpadding="10px" class="data">

    <tr>
    <th>Category ID</th>
        <th>Category Image</th>
        <th>Category Name</th>
        <th>Created Date</th>
        <th>Actions</th>
</tr>

    <?php while ($row = mysqli_fetch_row($result)): ?>
    <tr>
    <td><?php echo $row[0]; ?></td>
    <td><img src="<?php echo $row[6]; ?>" height="40px" width="40px"></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[7]; ?></td>
    <td><a href="edit-category.php?editcategory_id='<?php echo $row[0]; ?>'">Edit</a>
    <a href="blog-category.php?deletecategory_id=<?php echo $row[0]; ?>">Delete</a>
    </tr>
    <?php endwhile;} ?>
 </table>
</div>
<?php
if(isset($_GET['deletecategory_id']))
{
   deleteData('category',$_GET['deletecategory_id']);
   header('Location: blog-category.php');
}
?>
</form>
</body>
</html>