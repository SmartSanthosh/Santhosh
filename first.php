<?php include('server.php');

//fetch the record to the update

  if(isset($_GET['edit'])){
  	$store_id=$_GET['edit'];
  	$edit_state=true;

  	$rec=mysqli_query($db,"SELECT * FROM `store` WHERE `store_id` = $store_id");
  	$record=mysqli_fetch_array($rec);
  	$store_name=$record['store_name'];
  	$store_address=$record['store_address'];
  	$store_id=$record['store_id'];
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>store</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="san1">
	<h1 ><b>BRAHMA STORE<b></h1>
	<ul>
	<li class="active"><a href="second.php"></i>Home</a></li>
	<li class="active"><a href="first.php"></i>Store</a></li>
	<li><a href="fourth.php"></i>Customer</a></li>
	<li><a href="five.php"></i>Bill Detail</a></li>
   </ul>
	</div>

    <form method="post" action="server.php">
	<input type="hidden" name="store_id"value="<?php echo $store_id; ?>">	

		   <div class="input-group">
		   	<label>Store Name </label>
		   	<input type="  text" name="store_name"value="<?php echo $store_name; ?>">
		   </div>


		   <div class="input-group">
		   	<label>Store Address</label>
		   	<input type="text" name="store_address"value="<?php echo $store_address; ?>">
		   </div>


		   <div class="input-group">

		   	<?php if($edit_state==false): ?>
		   		 	<button type="submit" name="save"class="btn">Save</button>
		   	<?php else: ?>
		   		 	<button type="submit" name="update"class="btn">Update</button>
		   	<?php endif ?>	
		   </div>
	</form>


	<table>
		<thead>
			<tr class="s">
				
				<th>Store Name</th>
				<th>Store Address</th>
				<th colspan="2">   Actions</th>
			</tr>
		</thead>
		<tbody>

		<?php while ($row=mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['store_name'];?></td>
				<td><?php echo $row['store_address'];?></td>
				<td>
					<a class="edit_btn" href="first.php?edit=<?php echo $row['store_id'];?>">Edit</a>
				</td>
				<td>
					<a class="del_btn" href="server.php?del=<?php echo $row['store_id'];?>">Delete</a>
				</td>
			</tr>
		<?php  } ?> 

		</tbody>
	</table>
	
</body>
</html>