<?php
      $Email=$_POST['Email'];
      $Password=$_POST['Password'];

    //database connection
    $conn=new mysqli('localhost', 'root', '', 'testform');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : " .$conn->connect_error);

    }else{
        $stmt=$conn->prepare("insert into customer(Email, Password) values(?,?)");
        $stmt->bind_param("ss",$Email, $Password);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration Successfull.....";
        $stmt->close();
        $conn->close();
    }
  ?>