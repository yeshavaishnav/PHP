<?php
 require_once('form-post.php');
 $url = $_SERVER['QUERY_STRING'];
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
                            $prefixarr = ['Mr','Miss','Mrs'];
                            ?>
                            <?php 
                            foreach($prefixarr as $value):
                            ?> 
                            <option value="<?php echo $value;?>" <?php if(isset($_POST['prefix'])){if($value == $_POST['prefix']){ echo 'selected';}}else echo "";?>><?php echo $value;?></option>
                            <?php endforeach; ?>
                            </select>                            
                        </td>
                    </tr>
                    <tr>
                        <td>First name: </td>
                        <td><input type="text" name="fname" value="<?php echo getValue('fname');?>">
                        <span  class="error"><?php echo validate('fname');?></span>
                        </td>
                            </tr>
                            <tr>
                        <td>Last name: </td>
                        <td><input type="text" name="lname" value="<?php echo getValue('lname');?>">
                        <span class="error"><?php echo validate('lname');?></span></td>
                            </tr>
                            <tr>
                        <td>Date of Birth: </td>
                        <td><input type="date" name="dob">
                        <span class="error"><?php echo validate('dob');?></span></td>
                            </tr>
                            <tr>
                        <td>Phone Number: </td>
                        <td><input type="text" name="phone" value="<?php echo getValue('phone');?>">
                        <span class="error"><?php echo validate('phone');?></span></td>
                            </tr>
                            <tr>
                        <td>Email: </td>
                        <td><input type="text" name="email" value="<?php echo getValue('email');?>">
                        <span class="error"><?php echo validate('email');?></span></td>
                            </tr>
                            <tr>
                        <td>Pasword: </td>
                        <td><input type="password" name="password" value="<?php echo getValue('password');?>">
                        <span class="error"><?php echo validate('password');?></span></td>
                            </tr>
                            <tr>
                        <td>Confirm Password: </td>
                        <td><input type="password" name="cpassword" value="<?php echo getValue('cpassword');?>">
                        </td>
                            </tr>
                </table>
            </div>
            
                           
       
               
            <div class="box">
            <h2>Address Information</h2>
                <table  cellpadding="5px" cellspacing="5px">
                    <tr>
                    <td>Address Line 1:</td>
                    <td><input type="text" name="addr1" value="<?php echo getValue('addr1');?>">
                    <span class="error"><?php echo validate('addr1');?></span></td>
                    </tr>
                    <tr>
                    <td>Address Line 2:</td>
                    <td><input type="text" name="addr2"  value="<?php echo getValue('addr2');?>">
                    <span class="error"><?php echo validate('addr2');?></span></td>
                    </tr>
                    <tr>
                    <td>Company: </td>
                    <td><input type="text" name="company"  value="<?php echo getValue('company');?>">
                    <span class="error"><?php echo validate('company');?></span></td>
                    </tr>
                    <tr>
                    <td>City: </td>
                    <td><input type="text" name="city"  value="<?php echo getValue('city');?>"></td>
                    </tr>
                    <tr>
                    <td>State: </td>
                    <td><input type="text" name="state"  value="<?php echo getValue('state');?>"></td>
                    </tr>
                    <tr>
                    <td>Country: </td>
                    <td>
                    <select name="country">
                            <?php 
                            $country = ['India','Pakistan','Bangladesh'];
                            ?>
                            <?php 
                            foreach($country as $value):
                            ?>
                           
                            <option value="<?php echo $value;?>"><?php echo $value;?></option>
                            <?php endforeach; ?>
                            </select> 
                            <span><?php echo validate('country');?></span>
                    </td>
                    </tr>
                    <tr>
                    <td>Postal Code: </td>
                    <td><input type="text" name="postalCode" value="<?php echo getValue('postalCode');?>">
                    <span  class="error"><?php echo validate('postalCode');?></span></td>
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
                    <?php echo getValue('description'); ?>
                    </textarea>
                    <span  class="error"><?php echo validate('description');?></span></td>
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
                        <input type="radio" name="business[]" value="Under 1 year" id="r1"  <?php if (in_array("Under 1 year", getValue('business',[]))) echo 'checked'; ?>><label for="r1">Under 1 year</label>
                        <input type="radio" name="business[]" value="1-2 years" id="r2" <?php if (in_array("1-2 years",getValue('business',[]))) echo 'checked'; ?> ><label for="r2">1-2 years</label> 
                        <input type="radio" name="business[]" value="2-5 years" id="r3" <?php if (in_array("2-5 years",getValue('business',[]))) echo 'checked'; ?>><label for="r3">2-5 years</label> 
                        <input type="radio" name="business[]" value="Over 10 years" id="r4" <?php if (in_array("Over 10 years",getValue('business',[]))) echo 'checked'; ?>><label for="r4">Over 10 years</label> 

                        </td>
                    </tr>
                    <tr>
                    <td>Number of unique clients you see each week</td>
                    <td>
                    <select name="client">
                    <?php 
                    $clients = ['1-5','6-10','11-15','15+'];?>
                    <?php foreach($clients as $value):?>
                           
                            <option value="<?php echo $value;?>" <?php if(isset($_POST['client'])){ if($value == $_POST['client']){ echo 'selected';}}else echo "";?>><?php echo $value;?></option>
                            <?php endforeach; ?>
                            </select> 
                   
                    </td>
                    </tr>
                    <tr>
                    <td>How do you like us to get in touch with you?</td>
                    <td>
                    <input type="checkbox" name="contact[]" id="post" value="post" <?php if (in_array("post", getValue('contact',[]))) echo "checked='checked'"; ?>><label for="post">Post</label>
                    <input type="checkbox" name="contact[]" id="email" value="email" <?php if (in_array("email", getValue('contact',[]))) echo "checked='checked'"; ?>><label for="email">email</label>
                    <input type="checkbox" name="contact[]" id="sms" value="sms" <?php if (in_array("sms", getValue('contact',[]))) echo "checked='checked'"; ?>><label for="sms">sms</label>
                    <input type="checkbox" name="contact[]" id="phone" value="phone" <?php if (in_array("post", getValue('contact',[]))) echo "checked='checked'"; ?>><label for="phone">phone</label>
                    <span class="error"><?php echo validate('contact');?></span>   
                </td>
                    </tr>
                    <tr>
                    <td>Hobbies: </td>
                    <td>
                    <select name="hobbies[]" multiple>
                    <?php $hobbies = ['Listening to music', 'travelling','blogging','sports','art'];?>
                    <?php foreach($hobbies as $value): ?>
                    <option value="<?php echo $value;?>" <?php if(@in_array($value,$_POST['hobbies'])){ echo 'selected';}else echo "";?>><?php echo $value;?></option>
                    <?php endforeach; ?>
                    </select>
                    </td>
                    </tr>
                    <tr>
                    <td colspan="2">  <input type="submit" name="submit" value="submit" id="submit">
                </td>
                   
                    </tr>
            </table>
        </div>
        
                    
         </form>
         </div>
    </body>
</html>