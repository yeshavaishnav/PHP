<?php require_once 'database.php';?>

<html>
<head></head>
<body>

<form method='POST'>
<table border='1' cellpadding='10px'>
    <tr><th>Customer ID</th><th>FullName</th><th>City</th><th>Get in touch via </th><th>Hobbies</th><th>Edit</th><th>Delete</th></tr>
    <?php $result = joinData();
while ($row = mysqli_fetch_assoc($result)):
?>

    <td><?php $id = $row['cust_id'];echo $row['cust_id']; ?></td>
    <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
    <td><?php echo $row['city']; ?></td>
    <td><?php echo $row['GET_IN']; ?></td>
    <td><?php echo $row['HOBBY']; ?></td>
    <td><input type="submit" name="<?php echo $id;?>" value="edit"></td>
    <td><input type="submit" name="<?php echo $id;?>" value="delete"></td>
   </tr>
<?php endwhile;?>
<?php 
session_start();
$last_id = array_search('edit',$_POST);
$_SESSION['last_id'] = $last_id;
if($last_id!="")
{
header('Location:update.php');

}

?>
</table>
</form>
</body>
</html>

