<!doctype html>
<html>
<head>
<title>Sign up form</title>
<link rel="stylesheet" href="signup.css">
</head>
<body>
    <script src="http://localhost/1/signup_validation.js"></script>
<?php 
$user=$name=$email=$password=$cpassword=$gender="";   
?>
<?php include('signup2.php'); //php validation ?>
<!------------------------ sign up form ------------------------>
    <form name="Registration" class="form_title" action="" method="POST" onSubmit="return validation()">
	<fieldset class="field_set">
	<h1>Sign up form</h1>
		<table>
			<tr>
                <td>Username:</td>
                <td><input type="text" name="user" id="user" value="<?php echo $_POST['user']; ?>"></td>
				<td><span id="var_user" style="color:red;"><?php echo $userErr;?></span></td>
            </tr>
            <tr>
                <td>FullName:</td>
                <td><input type="text" name="name" id="name" value="<?php echo $_POST['name']; ?>"></td>
				<td><span id="var_name" style="color:red;"><?php echo $nameErr;?></span></td>
            </tr>
             <tr>
                <td>Email:</td>
                <td><input type="email" name="email" id="email" value="<?php echo $_POST['email']; ?>"></td>
				<td><span id="var_email" style="color:red;"><?php echo $emailErr;?></span></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" id="password" minlength="6" maxlength="12" value="<?php echo $_POST['password']; ?>"></td>
				<td><span id="var_password" style="color:red;"><?php echo $passwordErr;?></span></td>
            </tr>
            <tr>
                <td>ConfirmPassword:</td>
                <td><input type="password" name="cpassword" id="cpassword" value="<?php echo $_POST['cpassword']; ?>"></td>
				<td><span id="var_cpassword" style="color:red;"><?php echo $cpasswordErr;?></span></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><input type="radio" name="gender" id="gender" value="Male" <?php if ($_POST['gender'] == 'Male'){ echo $_POST['gender']='checked'; } ?>>Male
                    <input type="radio" name="gender" id="gender1" value="Female" <?php if ($_POST['gender'] == 'Female'){ echo $_POST['gender']='checked'; } ?>>Female</td>
				<td><span id="var_gender" style="color:red;"><?php echo $genderErr;?></span></td>	
            </tr>
            <tr style="height:15px;"></tr>
            <tr>
                <td></td>
				<td><input class="submit" type="submit" value="submit" onsubmit="return validation()"></td>
			</tr>
        </table>         	        
    </fieldset>
</form>                       
<?php include('signup1.php'); //php query to insert data ?>	
</body> 
</html>   