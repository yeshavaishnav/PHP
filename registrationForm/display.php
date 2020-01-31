<?php require_once 'database.php';
?>
<html>
<head></head>
<body>


<table border='1' cellpadding='10px'>
    <tr><th>Customer ID</th><th>FullName</th><th>City</th><th>Get in touch via </th><th>Hobbies</th><th>Edit</th><th>Delete</th></tr>
    <?php $result = joinData();
while ($row = mysqli_fetch_assoc($result)):
?>
    <td><?php echo $row['cust_id']; ?></td>
    <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
    <td><?php echo $row['city']; ?></td>
    <td><?php echo $row['GET_IN']; ?></td>
    <td><?php echo $row['HOBBY']; ?></td>
    <td><button>Edit</button></td>
    <td><button>Delete</button></td>
   </tr>
<?php endwhile;?>
</table>

</body>
</html>
