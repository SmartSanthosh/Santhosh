<?php

     //initialize variables

     $customer_name="";
     $customer_mobile="";
     $customer_email="";
     $customer_dob="";
     $customer_id =0;
     
     $edit_state=false;
    //connect to database
   
     $db=mysqli_connect('localhost','root','','brahmastore');

     //if save button is click
     if  (isset($_POST['save'])){

          $customer_name=$_POST['customer_name'];
          $customer_mobile=$_POST['customer_mobile'];
          $customer_email=$_POST['customer_email'];
          $customer_dob=$_POST['customer_dob'];
          echo "$customer_name";
          echo "$customer_mobile";
          echo"$customer_email";
          echo"$customer_dob";
          $query="INSERT INTO   customer (customer_name,customer_mobile,customer_email,customer_dob) VALUES('$customer_name','$customer_mobile','$customer_email','$customer_dob')";
          mysqli_query($db,$query);
     
          header('location:fourth.php');  //redirect to index page after inserting

     }

      //update record
     if (isset($_POST['update'])){

               $customer_name=mysqli_real_escape_string($db,$_POST['customer_name']);
               $customer_mobile=mysqli_real_escape_string($db,$_POST['customer_mobile']);
               $customer_email=mysqli_real_escape_string($db,$_POST['customer_email']);
               $customer_dob=mysqli_real_escape_string($db,$_POST['customer_dob']);          
               $customer_id=mysqli_real_escape_string($db,$_POST['customer_id']);


               /*mysqli_query($db,"UPDATE y1 SET Customer_Name='$Customer_Name',Customer_Mobile='$Customer_Mobile',Customer_Email='$Customer_Email',Customer_DOB='$Customer_DOB' WHERE y1.id=$id");*/
               mysqli_query($db,"UPDATE `customer ` SET `customer_name` = '$customer_name', `customer_mobile` = '$customer_mobile', `customer_email` = '$customer_email', `customer_dob` = '$customer_dob' WHERE `y1`.`customer_id ` = $customer_id ");
               
               header('location:fourth.php');


               }
     //delete records
               if(isset($_GET['del'])){
                    $customer_id=$_GET['del'];
                    mysqli_query($db,"DELETE FROM   customer  WHERE customer_id =$customer_id ");                
                    header('location:fourth.php');

               }

     //retrive result
     $results=mysqli_query($db,"SELECT * FROM   customer ");
?>
