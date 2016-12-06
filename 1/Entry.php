<?php include('session1.php'); include('conn.php');?>

<!doctype html>
<html>
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />

    <title>Entry</title>    
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="css/style.css" type="text/css">    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://localhost/1/addbutton_jquery.js"></script>
    <script src="http://localhost/1/add_amount.js"></script>
    <script src="http://localhost/1/per_head.js"></script>
    <script src="http://localhost/1/entry_validation.js"></script>
</head>        
<body>         

<!---------------------------------- Header bar -------------------------------->                
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

<div class="menu">
<?php include('entry2.php'); //php validation ?>
           
<form  class="entry" action="" method="POST" onSubmit="return revalidate()" >
    <fieldset>
    <div>
    <table>
        <tr>    
            <th>Date:</th>
            <td><div class="align">
                <input type="date" name="date" id="date" style="width:169px;">
                </div>
            </td>
            <td><span id="var_date" style="color:red;"><?php echo $dateErr;?></span></td>
        </tr>    
        <tr>    
            <th>Members:</th>
            <td><div class="align">
                        <select multiple="multiple" name="member[]" id="mSelect" size="2" style="width:173px;">
                                <?php
                                    $edit = "SELECT costumer_user FROM costumer ";				
                                    $result = mysqli_query($conn,$edit);
                                                                    
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                            <option value="<?php echo $row["costumer_user"] ;  ?>">
                                <?php echo $row["costumer_user"] ; } ?>
                            </option>
                        </select>
                    </div>
            </td>
            <td><span id="var_mSelect" style="color:red;"><?php echo $memberErr;?></span></td>
        </tr>
        <tr>
            <th>Items:</th>  
            <td><div class="align">
                    <div class="input_fields_wrap">   
                        <div>
                            <div>
                                <input type="text" name="mytext[]" id="mytext">
                                <button class="add_field_button">Add More</button>
                            </div>  
                        </div> 
                    </div>
                </div>
            </td>    
            <td><span id="var_mytext" style="color:red;"><?php echo $mytextErr;?></span></td>
        </tr>    
        <tr>
            <th>Paid money:</th>
            <td><div class="align">
                <select name="paid" id="paid" style="width:173px;">
                    <option></option>
                    <?php
                            $edit = "SELECT costumer_user FROM costumer ";				
                                    
                            $result = mysqli_query($conn,$edit);
                            while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option><?php echo $row["costumer_user"] ; } ?></option>  
                    </select>
                </div>
            </td>    
            <td><span id="var_paid" style="color:red;"><?php echo $paidErr;?></span></td>
        </tr>
        <tr>
            <th>Total amount:</th>
            <td><div class="align">
                <input type="number" name="amount" id="amount" class="countOne" onkeyup="myFunction(this.value)">
                </div>
            </td>
            <td><span id="var_amount" style="color:red;"><?php echo $amountErr;?></span></td>
        </tr>    
        <tr>
            <th>Per head:</th> 
            <td><div class="align">
                    <input type="text" name="per_head" id="resultHere" readonly>
                </div>
            </td>
        </tr>
        <tr>
            <th>Amount of other members:</th>
            <td><div name="other_members[]" style="width:95px;display:inline;"><?php include('select.php'); ?></div><input type="text" placeholder="amount" name="other_amount[]" style="width:60px;"/><input type="text" placeholder="Items" name="other_item[]" style="width:60px;"/><input type="button" class="add_amount" id="showphpfile" value="Other costumers"></td>
        </tr>    
        <tr>
            <td></td>
            <td><div class="align">
                    <div>
                        <div class="remove_value">
                        </div>
                    </div>
                </div>
            </td>                                
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="submit"></td>    
        </tr>
    </table>        
    </div>
                      
<?php include('entry1.php'); // sql query to insert data ?>
<br>
</fieldset>
</form>
</div>
</body>
</html>                               