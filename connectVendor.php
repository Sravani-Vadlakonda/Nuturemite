<?php
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $sname=$_POST['sname'];
      $surl=$_POST['surl'];
      $phnum=$_POST['phnum'];

    //database connection
    $conn=new mysqli('localhost', 'root', '', 'testform');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : " .$conn->connect_error);

    }else{
        $stmt=$conn->prepare("insert into vendor(fname,lname,sname,surl,phnum) values(?,?,?,?,?)");
        $stmt->bind_param("ssssi",$fname, $lname, $sname, $surl, $phnum);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration Successfull.....";
        $stmt->close();
        $conn->close();
    }
  ?>