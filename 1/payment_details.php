<?php
include('session1.php');
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />

	<title>member data</title>
	<link rel="stylesheet" href="history.css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
</head>
<body>
	<div id="header">
		<div>
			<div class="logo">
				<a href="Entry.php"></a>
			</div>
			<ul id="navigation">
				<li class="active">
					<a href="Entry.php">Home</a>
				</li>
				<li>
					<a href="data.php">Record</a>
				</li>
				<li>
					<a href="member_data.php">Costumer record</a>
				</li>
				<li>
					<a href="search_by_date.php">Search by date</a>
				</li>
				<li>
					<a href="Payment.php">Payment</a>
				</li>
				<li>
					<a href="Payment_details.php">Payment detail</a>
				</li>
				<li>
					<a href="Paid_by_member.php">Amount paid details</a>
				</li>
                <li>
                    <input name="logout" type="button" id="logout" value="logout" onclick="window.location='logout1.php'" >
                </li>
			</ul>
		</div>
	</div>
<br>  

	<form class="left" action='#' method="post">
		
		<?php				
				include('conn.php');
				$query = "SELECT * FROM payment_table 
						  WHERE member_name LIKE '%".$_SESSION['login_user']."%' ";
					
				$result = mysqli_query($conn,$query);  
				
		echo '<table border="2">';
			echo '<tr>';
				echo '<th class="left_col">Date</th>';
				echo '<th>Member</th>';
				echo '<th>Payment</th>';
				echo '<th>Paid</th>';
				echo '<th>Balance</th>';
			echo '</tr>';
				while($row = mysqli_fetch_array($result)){
			echo '<tr>';
				echo '<td>' . $row['date'] . '</td>';
				echo '<td>' . $row['member_name'] . '</td>';
				echo '<td>' . $row['payment'] . '</td>';
				echo '<td>' . $row['paid'] . '</td>';
				echo '<td>' . $row['balance'] . '</td>';
			echo '</tr>';
				}
		echo '</table>';
				?>			
	</form>			
</body>
</html> 