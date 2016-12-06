<?php
include('conn.php');
$action=$_POST["action"];
if($action=="showroom"){
    $query = "SELECT costumer_user FROM costumer ";
    $show=mysqli_query($conn,$query) or die ("Error");
    while($row=mysqli_fetch_array($show)){
        echo '<li>'.$row['costumer_user'].'</li>';
    }
}
?>