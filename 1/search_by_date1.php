<?php
    if($_POST){
                    
    include('conn.php'); //php validation 
				
    $fetch="SELECT date, members, items, paid, amount, per_head, other_member, other_amount FROM lunch_system WHERE date ='". $_POST['date'] ."' AND (members LIKE '%". $_POST['member'] ."%' OR other_member LIKE '%". $_POST['member']."%')";
                
    $amount = mysqli_query($conn, $fetch);
    $data = mysqli_fetch_array($amount);
    }
?>
