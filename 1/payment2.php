<?php
    include('conn.php');        
    if(!empty($_POST['select_member'])){
            
            $query1 = "SELECT costumer_balance FROM costumer WHERE costumer_user LIKE '%".$_POST['select_member']."%'";
            
            $result1 = mysqli_query($conn,$query1);
            $balance1 = mysqli_fetch_array($result1);


			$sum1=0;                
                $sum_query = "SELECT other_amount FROM lunch_system
                              WHERE paid LIKE '%".$_POST['select_member']."%' ";
                $sum_result = mysqli_query($conn,$sum_query);

				while($row1 = mysqli_fetch_array($sum_result)){
					$exploded = array_sum(array_values(explode(',',$row1['other_amount'])));
					$sum1 = $sum1 + $exploded;} 

				$query2 = "SELECT SUM(amount) FROM lunch_system
						   WHERE paid LIKE '%".$_POST['select_member']."%' ";
				$sum_result2 = mysqli_query($conn,$query2);
				$row3 = mysqli_fetch_array($sum_result2);		   

/*                $query3 = "SELECT costumer_balance FROM costumer 
                          WHERE costumer_user LIKE '%".$_POST['select_member']."%' ";
                $check = mysqli_query($conn,$query3);
                $balance = mysqli_fetch_assoc($check);          
*/
            	$total =  $row3['SUM(amount)'] + $sum1 ;
                $deducted_amount = $balance1['costumer_balance'] - $total ;




              
        } else {
            $balance1['costumer_balance'] = "";
        }
?>    
