<?php
session_start();

	$error = "";

	if(isset($_POST['login'])){
		if(empty($_POST['user']) || empty($_POST['password'])){
			$error = "Username or Password is empty";
		}else{
			$user = $_POST['user'];
			$pwd = $_POST['password'];

					include('conn.php');
					$login=("SELECT * FROM costumer WHERE (costumer_user='$user' OR costumer_email='$user') AND costumer_password='$pwd' ");
					$check = mysqli_query($conn,$login);
					$rows = mysqli_num_rows($check);
					
					if ($rows == 1){
						$_SESSION['login_user']=$user;
						header("location:Entry.php");
					}else{
						$error="Username and Password is invalid";
					}
										
			$conn->close();
		}
}

?>