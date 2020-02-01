
<?php

require_once 'form-post.php';
require_once 'database.php';
$cust_id = $_SESSION['last_id'];
$conn = connection_open();
$account = fetchRow($cust_id, 'customers');
$address = fetchRow($cust_id, 'customer_address');
$other = fetchData('customer_additional_info', '*', 'where cust_id = ' .$cust_id);
$otherArray = array();
while ($row = mysqli_fetch_assoc($other)) {
    array_push($otherArray, $row);
}

$valueArray = array();
foreach ($otherArray as $key => $value) {
    foreach ($value as $element => $item) {
        if ($element == 'value') {
            array_push($valueArray, $item);
        }
    }
}

function convertData($valueArray)
{
    $values = array();
    foreach ($valueArray as $key => $value) {
        if (strpos($value, ',')) {
            $valueArray[$key] = explode(",", $value);

        }
    }
    return $valueArray;
}
$otherdata = convertData($valueArray);
?>

<html>
    <head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function display()
        {
            var check = document.getElementById('check');
            if(check.checked == true)
            {
                document.getElementById('other').style.display = "block";
            }
            else
            {
                document.getElementById('other').style.display = "none";
            }
        }
    </script>
    </head>
    <body>

        <div class="container">
            <form method="POST" action="">

            <div class="box">
            <h2>Your account details</h2>
                <table cellpadding="5px" cellspacing="5px">
                    <tr>

                        <td>Prefix: </td>
                        <td>
                            <select name="prefix">
                            <?php
$prefixarr = ['Mr', 'Miss', 'Mrs'];
?>
                            <?php
foreach ($prefixarr as $value):
?>
                            <option value="<?php echo $value; ?>" <?php if ($value == $account[1]) {echo 'selected';} else {
    echo "";
}
?>><?php echo $value; ?></option>
                            <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>First name: </td>
                        <td><input type="text" name="fname" value = "<?php echo $account[2]; ?>">

                        </td>
                            </tr>
                            <tr>
                        <td>Last name: </td>
                        <td><input type="text" name="lname" value = "<?php echo $account[3]; ?>">
                        </td>
                            </tr>
                            <tr>
                        <td>Date of Birth: </td>
                        <td><input type="date" name="dob" value = "<?php echo $account[4]; ?>">
                        </td>
                            </tr>
                            <tr>
                        <td>Phone Number: </td>
                        <td><input type="text" name="phone" value = "<?php echo $account[5]; ?>">
                        </td>
                            </tr>
                            <tr>
                        <td>Email: </td>
                        <td><input type="text" name="email" value = "<?php echo $account[6]; ?>">
                        </td>
                            </tr>
                            <tr>
                        <td>Pasword: </td>
                        <td><input type="password" name="password" value = "<?php echo $account[7]; ?>">
                        </td>
                            </tr>
                            <tr>
                        <td>Confirm Password: </td>
                        <td><input type="password" name="cpassword" value = "<?php echo $account[7]; ?>">
                        </td>
                            </tr>
                </table>
            </div>




            <div class="box">
            <h2>Address Information</h2>
                <table  cellpadding="5px" cellspacing="5px">
                    <tr>
                    <td>Address Line 1:</td>
                    <td><input type="text" name="addr1" value = "<?php echo $address[1]; ?>">
            </td>
                    </tr>
                    <tr>
                    <td>Address Line 2:</td>
                    <td><input type="text" name="addr2" value = "<?php echo $address[2]; ?>">
                    </td>
                    </tr>
                    <tr>
                    <td>Company: </td>
                    <td><input type="text" name="company" value = "<?php echo $address[3]; ?>">
                    </td>
                    </tr>
                    <tr>
                    <td>City: </td>
                    <td><input type="text" name="city" value = "<?php echo $address[4]; ?>"></td>
                    </tr>
                    <tr>
                    <td>State: </td>
                    <td><input type="text" name="state" value = "<?php echo $address[5]; ?>"></td>
                    </tr>
                    <tr>
                    <td>Country: </td>
                    <td>
                    <select name="country">
                            <?php
$country = ['India', 'Pakistan', 'Bangladesh'];
?>
                            <?php
foreach ($country as $value):
?>

                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php endforeach;?>
                            </select>

                    </td>
                    </tr>
                    <tr>
                    <td>Postal Code: </td>
                    <td><input type="text" name="postalCode" value = "<?php echo $address[7]; ?>">
                  </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="check" id="check" value="show" onclick="display()">Show Other Information</td>
                            </tr>
                </table>
        </div>

        <div id="other" class="box">
        <h2>Other Information</h2>
                <table  cellpadding="5px" cellspacing="5px">
                    <tr>
                    <td>Describe yourself: </td>
                    <td>
                    <textarea rows="4" cols="20" name="description">
                    <?php echo $otherdata[0]; ?>
                    </textarea>

                    </tr>
                    <tr>
                    <td>Profile Image: </td>
                    <td><input type="file" accept="image/*" name="profile"></td>
                    </tr>
                    <tr>
                    <td>Certificate: </td>
                    <td><input type="file" accept=".pdf" name="certificate"></td>
                    </tr>
                    <tr>
                        <td>How long have you been in business? </td>
                        <td>
                        <input type="radio" name="business[]" value="Under 1 year" id="r1" <?php if ($otherdata[3] == "Under 1 year") echo 'checked'; ?>><label for="r1">Under 1 year</label>
                        <input type="radio" name="business[]" value="1-2 years" id="r2" <?php if ($otherdata[3] == "1-2 years") echo 'checked'; ?>><label for="r2">1-2 years</label>
                        <input type="radio" name="business[]" value="2-5 years" id="r3" <?php if ($otherdata[3] == "2-5 years") echo 'checked'; ?>><label for="r3">2-5 years</label>
                        <input type="radio" name="business[]" value="Over 10 years" id="r4" <?php if ($otherdata[3] == "Over 10 years") echo 'checked'; ?>><label for="r4">Over 10 years</label>

                        </td>
                    </tr>
                    <tr>
                    <td>Number of unique clients you see each week</td>
                    <td>
                    <select name="client">
                    <?php
$clients = ['1-5', '6-10', '11-15', '15+'];?>
                    <?php foreach ($clients as $value): ?>

                            <option value="<?php echo $value; ?>" <?php if($value == $otherdata[4]){ echo 'selected';}else echo "";?>><?php echo $value;?></option>
                            <?php endforeach;?>
                            </select>

                    </td>
                    </tr>
                    <tr>
                    <td>How do you like us to get in touch with you?</td>
                    <td>
                    <input type="checkbox" name="contact[]" id="post" value="post" <?php if(is_array($otherdata[5])){ if(in_array("post", $otherdata[5])) echo "checked='checked'";}else{if($otherdata[5] == "post") echo "checked";} ?>><label for="post">Post</label>
                    <input type="checkbox" name="contact[]" id="email" value="email"  <?php if(is_array($otherdata[5])){ if(in_array("email", $otherdata[5])) echo "checked='checked'";}else{if($otherdata[5] == "email") echo "checked";} ?>><label for="email">email</label>
                    <input type="checkbox" name="contact[]" id="sms" value="sms"<?php if(is_array($otherdata[5])){ if(in_array("sms", $otherdata[5])) echo "checked='checked'";}else{if($otherdata[5] == "sms") echo "checked";} ?> ><label for="sms">sms</label>
                    <input type="checkbox" name="contact[]" id="phone" value="phone" <?php if(is_array($otherdata[5])){ if(in_array("phone", $otherdata[5])) echo "checked='checked'";}else{if($otherdata[5] == "phone") echo "checked";} ?>><label for="phone">phone</label>

                </td>
                    </tr>
                    <tr>
                    <td>Hobbies: </td>
                    <td>
                    <select name="hobbies[]" multiple>
                    <?php $hobbies = ['Listening to music', 'travelling', 'blogging', 'sports', 'art'];?>
                    <?php foreach ($hobbies as $value): ?>
                    <option value="<?php echo $value; ?>" <?php if($value == $otherdata[6]){ echo 'selected';}else echo "";?> ><?php echo $value; ?></option>
                    <?php endforeach;?>
                    </select>
                    </td>
                    </tr>
                    <tr>
                    <td colspan="2">  <input type="submit" name="update" value="update" id="update">
                </td>

                    </tr>
            </table>
        </div>
        

         </form>
         </div>
    </body>
</html>