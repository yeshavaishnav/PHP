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
      <h2 align="center">LOGIN</h2>
      <table cellpadding="10px" align="center">
        <tr>
          <td>
            <label for="email">Email</label><br />
            <input type="text" name="email" id="email" />
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
            <input type="submit" name="login" value="LOGIN" />
            <input type="submit" name="reg" value="REGISTER" />
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
