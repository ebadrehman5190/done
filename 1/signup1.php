<?php
		
		if(empty($_POST['user'] && $_POST['name'] && $_POST['email'] && $_POST['password'] && $_POST['gender'])){
			$error = "please enter the form";
		} elseif ($_POST['password'] != $_POST['cpassword']) {
			$cpasswordErr = "confirm password must be same";
		} else {	
		
                include('conn.php'); //php validation 


				$check_user = "SELECT costumer_user FROM costumer WHERE costumer_user LIKE '".$_POST['user']."' ";
				$check_email = "SELECT costumer_email FROM costumer WHERE costumer_email LIKE '".$_POST['email']."' ";
				$check_user1 = mysqli_query($conn,$check_user);
				$check_email1 = mysqli_query($conn,$check_email);

				if(mysqli_num_rows($check_user1)){
					echo "Error: This user is already being used" . $sql . "<br>" . $conn->error;
				} elseif(mysqli_num_rows($check_email1)) {
					echo "Error: This email is already being used" . $sql . "<br>" . $conn->error;
				} else {	
					mysqli_select_db($conn,"mysql");
					$new = "INSERT INTO costumer (costumer_user, costumer_name, costumer_email, costumer_password, costumer_gender)
					VALUES ('".$_POST['user']."','".$_POST['name']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['gender']."')";

						if ($conn->query($new) === TRUE) {
							header("location: index.php");
							echo "New record created successfully";
						} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}	
				}
	
		$conn->close();
	}				
	?>