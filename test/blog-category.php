<?php
require_once('data-handler.php');
require_once('database.php');
?>
<html>
    <head>
        <title>Blog Category</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <h2>Blog Category</h2>
<form method="POST">
    <input type="submit" name="add" value="Add Category">
    

    <div class="right">
        <input type="submit" name="manage" value="Manage Category">
        <input type="submit" name="profile" value="My Profile">
        <input type="submit" name="logout" value="Log Out">
    </div>
    
        <table border="1">

            <tr>
            <th>Category ID</th>
                <th>Category Image</th>
                <th>Category Name</th>                
                <th>Created Date</th>
                <th>Actions</th>
</tr>

                <?php
            $result = fetchData('category', '*', "where user_id = '" . $_SESSION['user_id'] . "'");
if (mysqli_num_rows($result) == 0) {
    echo "No categories yet !";
} else {
    while ($row = mysqli_fetch_row($result)): ?>
    <tr>
    <td><?php echo $row[0]; ?></td>
    <td><?php echo $row[6]; ?></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[7]; ?></td>
    <td><input type="submit" name="<?php echo $row['id'];?>" value="cEdit">
<input type="submit" name="<?php echo $row['id'];?>" value="cDelete"></td>
    </tr>   
                                  
    <?php endwhile; }?>
        </table>
    
</form>
</body>
</html>