<?php
  $Email=$_POST['Email'];
  $Password=$_POST['Password'];
 
  // database connection

   $con= new mysqli("localhost", "root", "", "testform");
    if($con->connect_error){
      die("Failed to connect  : " .$con->connect_error);
    }else{
      $stmt= $con->prepare("select * from customer where Email=?");
      $stmt->bind_param("s", $Email);
      $stmt->execute();
      $stmt_result=$stmt->get_result();
      if($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if($data['Password'] === $Password)
        {
          echo "<h2>Login Successfull</h2>";

        }
        else{
            echo "<h2>Invalid Email or Password</h2>";

        }
      }
      else{
        echo "<h2>Invalid Email or Password</h2>";

       }
    }
?>