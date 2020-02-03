<?php
  require_once('database.php');
  require_once('data-handler.php');
?>

<html>
  <head>
    <title>Register</title>
  </head>
  <body>
    <form method="POST" action="">
      <h2 align="center">REGISTER</h2>
      <table align="center" cellpadding="10px">
        <tr>
          <td>
            <label for="prefix">Prefix</label>
          </td>
          <td>
            <select name="prefix">
              <?php
                  $prefixArray =['Mr','Miss','Mrs'];
                  foreach($prefixArray as $value):
              ?>
              <option value="<?php echo $value;?>"><?php echo $value;?></option>
                  <?php endforeach;  ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <label for="firstname">First Name</label>
          </td>
          <td>
            <input type="text" name="firstname" id="firstname" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="last">Last Name</label>
          </td>
          <td>
            <input type="text" name="lastname" id="lastname" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="email">Email</label>
          </td>
          <td>
            <input type="text" name="email" id="email" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="mobile">Mobile Number</label>
          </td>
          <td>
            <input type="text" name="mobile" id="mobile" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="password">Password</label>
          </td>
          <td>
            <input type="password" name="password" id="password" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="cpassword">Confirm Password</label>
          </td>
          <td>
            <input type="password" name="cpassword" id="cpassword" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="information">Information</label>
          </td>
          <td>
            <textarea rows="4" cols="20" name="information"> </textarea>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="checkbox" name="tandc" id="tandc" value="tandc" />
            <label for="tandc">Hereby, I Accept Terms and Conditions.</label>
          </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="register" id="register" value="REGISTER"></td>
        </tr>
      </table>
    </form>
  </body>
</html>
