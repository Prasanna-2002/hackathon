<?php
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$id=$_POST['id'];
$institute=$_POST['institute'];
$phone_number=$_Post['phone_number'];
if(!empty($username)||!empty($password)||!empty($email)||!empty($id)||!empty($phone_number)||!empty($institute))
{
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="administrator";
    //create connection
    $conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
    if(mysqli_connect_error())
    {
     die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT="SELECT email from register Where email=? Limit 1";
        $INSERT="INSERT into register(username,password,email,id,phone_number) values(?,?,?,?,?,?,?)";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt=$store_result();
        $num=$stmt->num_rows;
        if ($num==0)
        {
            $stmt->close();
            $stmt=$conn->prepare($INSERT);
            $stmt->bind_param("sssssi",$username,$password,$email,$id,$institute,$phone_number);
            $stmt->execute();
            echo "New record inserted successfully";
        }else{
            echo "Someone already register using this email";
        }
    }
    }
    else{
        echo "All Fields are required";
        die();
    }
?>