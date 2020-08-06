<?php

     //initialize variables

     $bill_item_product_name="";
     $bill_item_price="";
     $bill_item_quantity="";
     $bill_item_amount="";
     $bill_item_id=0;
     $store_name="";
     $customer_name="";
     $bill_number="";
     $bill_datetime="";
     $edit_state=false;
    //connect to database
   
     $db=mysqli_connect('localhost','root','','brahmastore');



     //if save button is click
     if  (isset($_POST['save'])){
     	$bill_item_product_name=$_POST['bill_item_product_name'];
     	$bill_item_price=$_POST['bill_item_price'];
          $bill_item_quantity=$_POST['bill_item_quantity'];
          $bill_item_amount=$_POST['bill_item_amount'];
          $store_name=$_POST['store_name'];
          $customer_name=$_POST['customer_name'];
          $bill_number=$_POST['bill_number'];
          $bill_datetime=$_POST['bill_datetime'];
     	echo "$bill_item_product_name";
     	echo "$bill_item_price";
          echo"$bill_item_quantity";
          echo"$bill_item_amount";
          echo"$store_name";
          echo"$customer_name";
          echo"$bill_number";
          echo"$bill_datetime";
               // Create connection
/*$conn = new mysqli('localhost','root','','brahmastore');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT bill_id from bill where bill_number = 'b26'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["bill_id"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();*/
          $customer_query = "SELECT customer_id from customer where customer_name = 'santhosh";
          $store_query = "SELECT store_id from store where store_name = 'prasanth";
          $customer_id = mysqli_query($db,$customer_query);
          $customer=mysqli_fetch_row($customer_id);
          $cus=$customer[0];
          $store_id = mysqli_query($db,$store_query); 
          $store=mysqli_fetch_row($db,$store_id);
          $sto=$store[0];         
          $bill_query = "INSERT INTO bill(bill_number,bill_datetime,customer_id,store_id) VALUES('b29','2000-12-17','$cus','$sto')";
          mysqli_query($db,$bill_query);           
          $bill_select_query = "SELECT bill_id from bill where bill_number = 'b26'";
          $id = mysqli_query($db,$bill_select_query);
          $bill =mysqli_fetch_row($id);
          $bill_id = $bill[0];
         


          $query="INSERT INTO bill_item(bill_item_product_name,bill_item_price,bill_item_quantity,bill_item_amount) VALUES('$bill_item_product_name','$bill_item_price','$bill_item_quantity','$bill_item_amount')";
          mysqli_query($db,$query);

     	header('location:five.php');  //redirect to index page after inserting

     }

      //update record
     if (isset($_POST['update'])){

     		$bill_item_product_name=mysqli_real_escape_string($db,$_POST['bill_item_product_name']);
     		$bill_item_price=mysqli_real_escape_string($db,$_POST['bill_item_price']);

               $bill_item_quantity=mysqli_real_escape_string($db,$_POST['bill_item_quantity']);

               $bill_item_amount=mysqli_real_escape_string($db,$_POST['bill_item_amount']);
     		$bill_item_id=mysqli_real_escape_string($db,$_POST['bill_item_id']);
               $store_name=mysqli_real_escape_string($db,$_POST['store_name']);
               $customer_name=mysqli_real_escape_string($db,$_POST['customer_name']);
               $bill_number=mysqli_real_escape_string($db,$_POST['bill_number']);
               $bill_datetime=mysqli_real_escape_string($db,$_POST['bill_datetime']);
     		mysqli_query($db,"UPDATE bill_item SET bill_item_product_name='$bill_item_product_name',bill_item_price='$bill_item_price',bill_item_quantity='$bill_item_quantity',bill_item_amount='$bill_item_amount' WHERE bill_item_id=$bill_item_id");
               header('location:five.php');


     		}
     //delete records
               if(isset($_GET['del'])){
                    $bill_item_id=$_GET['del'];
                    mysqli_query($db,"DELETE FROM bill_item WHERE bill_item_id=$bill_item_id");
                    header('location:five.php');

               }

     //retrive result
     $results=mysqli_query($db,"SELECT * FROM bill_item");
?>
