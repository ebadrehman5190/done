<!doctype html>
<html>
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />

    <title>Entry</title>   

</head>        
<body>                
<?php		
		include('conn.php');
			$edit = "SELECT costumer_user FROM costumer "; 
			$result = mysqli_query($conn,$edit); 

		echo '<select name="other_members[]" id="paid">';
		echo '<option></option>';
			while($row = mysqli_fetch_array($result)) {
				echo '<option>' . $row["costumer_user"] . '</option>';  
				}
		echo '</select>';
?> 
</body>
</html> 