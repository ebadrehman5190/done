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

<h3 style= "margin:auto ; width:30%;">Record Of Amount Paid By <?php echo $_SESSION['login_user'] ; ?></h3>
<br>
	<form action='#' method="post">
		
		<?php				
				include('conn.php');

				$sum1=0;                
                $sum_query = "SELECT other_amount FROM lunch_system
                              WHERE paid LIKE '%".$_SESSION['login_user']."%' ";
                $sum_result = mysqli_query($conn,$sum_query);

				while($row1 = mysqli_fetch_array($sum_result)){
					$exploded = array_sum(array_values(explode(',',$row1['other_amount'])));
					$sum1 = $sum1 + $exploded;} 

				$query2 = "SELECT SUM(amount) FROM lunch_system
						   WHERE paid LIKE '%".$_SESSION['login_user']."%' ";
				$sum_result2 = mysqli_query($conn,$query2);
				$row3 = mysqli_fetch_array($sum_result2);		   

                $query1 = "SELECT costumer_balance FROM costumer 
                          WHERE costumer_user LIKE '%".$_SESSION['login_user']."%' ";
                $check = mysqli_query($conn,$query1);
                $balance = mysqli_fetch_assoc($check);          

				$query = "SELECT * FROM lunch_system 
						  WHERE paid LIKE '%".$_SESSION['login_user']."%' ";					
				$result = mysqli_query($conn,$query);

				$total =  $row3['SUM(amount)'] + $sum1 ;
                $deducted_amount = $balance['costumer_balance'] - $total ;
				
		echo '<table border="2">';
			echo '<tr>';
				echo '<th class="left_col">Date</th>';
				echo '<th>Members</th>';
				echo '<th>Paid Amount</th>';
				echo '<th>Per_head</th>';
                echo '<th>Other members</th>';
				echo '<th>Other members amount</th>';
            echo '</tr>';
				while($row = mysqli_fetch_array($result)){ 
			echo '<tr>';
				echo '<td>' . $row['date'] . '</td>';
				echo '<td>' . $row['members'] . '</td>';
				echo '<td>' . $row['amount'] . '</td>';
				echo '<td>' . $row['per_head'] . '</td>';
                echo '<td>' . $row['other_member'] . '</td>';
				echo '<td>' . $row['other_amount'] . '</td>';
			echo '</tr>';
				}
		echo '</table>';
		echo '<table>';
            echo '<tr>';    
                echo '<td><h3>Total Amount Of Members:</h3></td><td></td><td><h3>'.$row3['SUM(amount)'].'</h3></td></tr>';
                echo '<tr><td><h3>Total Amount Of Other Members:</h3></td><td></td><td><h3>'.$sum1.'</h3></td></tr>';
                echo '<tr><td><h3>Total Amount Paid:</h3></td><td></td><td><h3>'.$total.'</h3></td></tr>';
                echo '<tr><td><h3>Balance Amount After Deducting Piad Amount:</h3></td><td></td><td><h3>'.$deducted_amount.'</h3></td>';
            echo '</tr>';
        echo '</table>';        
    ?>			
	</form>			
</body>
</html> 