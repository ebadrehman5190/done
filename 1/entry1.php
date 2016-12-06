<?php
                if($_POST){
                    
                include('conn.php'); //php validation 
                
                $items=implode(',',$_POST['mytext']);
                $select=implode(',',$_POST['member']);
                $other_members=implode(',',$_POST['other_members']);
                $other_amount=implode(',',$_POST['other_amount']);
                $other_item=implode(',',$_POST['other_item']);

                foreach ($_POST['other_members'] as $key => $value1) {
                    $query1 = "SELECT costumer_balance FROM costumer WHERE costumer_user LIKE '%".$value1."%' ";
                    
                    $result1 = mysqli_query($conn,$query1);    
                    $balance1 = mysqli_fetch_array($result1);
                    
                    if(empty($balance1['costumer_balance'])){
                        $m_insert = "UPDATE costumer SET costumer_balance = '".$_POST['other_amount'][$key]."'
                                     WHERE costumer_user = '".$value1."' ";

                        if ($conn->query($m_insert) === TRUE) {
                            echo ",";
                        } else {
                        echo "Error: " . $m_insert . "<br>" . $conn->error;
                        }             
                    } else {

                        $add1 = $balance1['costumer_balance'] + $_POST['other_amount'][$key];
                        $m_insert = "UPDATE costumer SET costumer_balance = '".$add1."' 
                                     WHERE costumer_user = '".$value1."' ";

                        if ($conn->query($m_insert) === TRUE) {
                            echo ".";
                        } else {
                        echo "Error: " . $m_insert . "<br>" . $conn->error;
                        }
                    }
                }                                    

                    foreach ($_POST['member'] as $key => $value) {
                    $query = "SELECT costumer_balance FROM costumer WHERE costumer_user LIKE '%".$value."%' ";
                    
                    $result = mysqli_query($conn,$query);    
                    $balance = mysqli_fetch_array($result);
                                 
                    if(!empty($balance['costumer_balance'])){
                        
                            $add = $balance['costumer_balance'] + $_POST['per_head'] ;
                            $update = "UPDATE costumer SET costumer_balance = '".$add."'
                                    WHERE costumer_user = '".$value."' ";                               
                    
                        if ($conn->query($update) === TRUE) {
                            echo "";
                        } else {
                        echo "Error: " . $update . "<br>" . $conn->error;
                        }
                    } else {
                            $update = "UPDATE costumer SET costumer_balance = '".$_POST['per_head']."' 
                                    WHERE costumer_user = '".$value."' "; 

                        if ($conn->query($update) === TRUE) {
                            echo "";
                        } else {
                        echo "Error: " . $update . "<br>" . $conn->error;
                        }                
                    }
                }
                    $new = "INSERT INTO Lunch_system ( date, members, items, paid, amount, per_head, other_member, other_amount, other_items)
                            VALUES ('".$_POST['date']."', '".$select."', '".$items."', '".$_POST['paid']."', '".$_POST['amount']."', '".$_POST['per_head']."', '".$other_members."', '".$other_amount."', '".$other_item."' )";
                    
                    if ($conn->query($new) === TRUE) {
                        echo "New record created in system";
                    } else {
					echo "Error: " . $new . "<br>" . $conn->error;
				    }
                                    
            $conn->close();
            }
    ?>