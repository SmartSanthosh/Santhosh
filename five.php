<?php include('sever fiveth.php');

//fetch the record to the update

  if(isset($_GET['edit'])){
    $bill_item_id=$_GET['edit'];
    $edit_state=true;

    $rec=mysqli_query($db,"SELECT * FROM bill_item WHERE  bill_item_id=$bill_item_id");
    $record=mysqli_fetch_array($rec);
    $bill_item_product_name=$record['bill_item_product_name'];
    $bill_item_price=$record['bill_item_price'];
    $bill_item_quantity=$record['bill_item_quantity'];
    $bill_item_amount=$record['bill_item_amount'];
    $bill_item_id=$record['bill_item_id'];    
    $rec=mysqli_query($db,"SELECT * FROM bill_item WHERE  bill_item_id=$bill_item_id");
    $record=mysqli_fetch_array($rec);
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
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
      
    <form method="post" action="sever fiveth.php">
        
       <div class="input">

 <?php
          $db=mysqli_connect('localhost','root','','brahmastore');
          $sql = "SELECT store_name FROM  store";
          $query = mysqli_query($db,$sql);
          echo '<label for="StoreNameType"style="width: 400px"  store_id="preinput">StoreName : </label>';
          echo '<select name="store_name" value="<?php echo $store_name; ?>">';
          while ($row = mysqli_fetch_array($query)) {
          echo '<option value='.$row['store_name'].'>'.$row['store_name'].'</option>';
          }?>
</select>


 <?php
          $db=mysqli_connect('localhost','root','','brahmastore');
          $sql = "SELECT customer_name FROM customer";
          $query = mysqli_query($db,$sql);
          echo '<label for="CustomerNameType"style="width: 400px" customer_id="preinput">CustomerName : </label>';
          echo '<select name="customer_name" value="<?php echo $customer_name; ?>">';
          while ($row = mysqli_fetch_array($query)) {
          echo '<option value='.$row['customer_name'].'>'.$row['customer_name'].'</option>'; 
        }?>
      </select>
</div>
       <label>Bill Number</label>
       <input type="text"  name="bill_number"value="<?php echo $bill_number; ?>">
       <label>Bill Date</label>

       <input type="Date"  name="bill_datetime"value="<?php echo $bill_datetime; ?>">

</div>


  <input type="hidden" name="bill_item_id"value="<?php echo $bill_item_id; ?>"> 

       <div class="input-group">
        <label>Item</label>
        <input type="  text" name=" bill_item_product_name"value="<?php echo $bill_item_product_name; ?>"> <label >Price</label> <input type="text" name="bill_item_price"value="<?php echo $bill_item_price; ?>"><label >Quantity</label><input type="text" name="bill_item_quantity"value="<?php echo $bill_item_quantity; ?>"><label >Amount</label><input type="text" name=" bill_item_amount"value="<?php echo $bill_item_amount; ?>">
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
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Amount</th>
        <th colspan="2">   Actions</th>
      </tr>
    </thead>
    <tbody>

    <?php while ($row=mysqli_fetch_array($results)) { ?>
      <tr>
        <td><?php echo $row['bill_item_product_name'];?></td>
        <td><?php echo $row['bill_item_price'];?></td>
        <td><?php echo $row['bill_item_quantity'];?></td>
        <td><?php echo $row['bill_item_amount'];?></td>
        <td>
          <a class="edit_btn" href="five.php?edit=<?php echo $row['bill_item_id'];?>">Edit</a>
        </td>
        <td>
          <a class="del_btn" href="sever fiveth.php?del=<?php echo $row['bill_item_id'];?>">Delete</a>
        </td>
      </tr>
    <?php  } ?> 

    </tbody>
  </table>
  
</body>
</html>