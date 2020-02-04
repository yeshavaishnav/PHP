<?php
require_once 'database.php';
require_once 'data-handler.php';
if(@$_SESSION['user_id']=="")
{
    header('Location:login.php');
    
}
?>

<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <?php
$conn = connection_open();
$query = "SELECT * FROM user where user_id = " . $_SESSION['user_id'];

if ($result = mysqli_query($conn, $query)) {
    $row = mysqli_fetch_row($result);
}

?>
    <form method="POST" action="profile.php">
      <h2 align="center">EDIT PROFILE</h2>
      <table align="center" cellpadding="10px">
        <tr>
          <td>
            <label for="prefix">Prefix</label>
          </td>
          <td>
            <select name="prefix">
              <?php
$prefixArray = ['Mr', 'Miss', 'Mrs'];
foreach ($prefixArray as $value):
?>
              <option value="<?php echo $value; ?>" <?php if ($value == $row[1]) {echo 'selected';} else {
    echo "";
}
?>><?php echo $value; ?></option>
                  <?php endforeach;?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <label for="firstname">First Name</label>
          </td>
          <td>
            <input type="text" name="firstname" id="firstname" value="<?php echo $row[2]; ?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="last">Last Name</label>
          </td>
          <td>
            <input type="text" name="lastname" id="lastname" value="<?php echo $row[3]; ?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="email">Email</label>
          </td>
          <td>
            <input type="text" name="email" id="email" value="<?php echo $row[5]; ?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="mobile">Mobile Number</label>
          </td>
          <td>
            <input type="text" name="mobile" id="mobile" value="<?php echo $row[4]; ?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="password">Password</label>
          </td>
          <td>
            <input type="password" name="password" id="password" value="<?php echo $row[6]; ?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="cpassword">Confirm Password</label>
          </td>
          <td>
            <input type="password" name="cpassword" id="cpassword" value="<?php echo $row[6]; ?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="information">Information</label>
          </td>
          <td>
            <textarea rows="4" cols="20" name="information"><?php echo $row[8]; ?></textarea>
          </td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" name="update" id="update" value="UPDATE"></td>
        </tr>
      </table>
    </form>
  </body>
</html>
