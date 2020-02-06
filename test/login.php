<?php
require_once 'data-handler.php';
?>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form method="POST">
      <div class="login">
      <table cellpadding="10px" align="center" class="loginform">
      <tr>
      <td><h2 align="center">LOGIN</h2></td>
      </tr>
        <tr>
          <td>
            <label for="email">Email</label><br />
            <input type="text" name="email" id="email"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="password">Password</label><br />
            <input type="password" name="password" id="password" />
          </td>
        </tr>
        <tr>
          <td align="center">
            <input type="submit" name="login" value="LOGIN" id="login"/>
            <input type="submit" name="reg" value="REGISTER" id="register" />
          </td>
        </tr>
      </table>
      </div>
    </form>
  </body>
</html>
