<?php
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$year=$_POST['year'];
$branch=$_POST['branch'];
$dob=$_POST['dob'];
$confirm_password=$_POST['confirm_password'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$registration_no=$_POST['registration_no'];
$college_name=$_POST['college_name'];
$mobile_no=$_Post['mobile_number'];
if(!empty($first_name)||!empty($last_name)||!empty($year)||!empty($confirm_password)||!empty($gender)||!empty($email)||!empty($registration_no)||
!empty($college_name)||!empty($branch)||!empty($mobile_number)||!empty($dob))
{
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="student";
    //create connection
    $conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
    if(mysqli_connect_error())
    {
     die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT="SELECT email from register Where email=? Limit 1";
        $INSERT="INSERT into student(first_name,last_name,branch,year,dob,confirm_password,gender,email,registration_no,college_name,mobile_number) values(?,?,?,?,?,?,?,?)";
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
            $stmt->bind_param("ssssii",$username,$password,$gender,$email,$registration_number,$college_name,$mobile_no);
            $stmt->execute();
#$title=$_POST["title"];
 #           $pname=rand(1000,10000)."-".$_FILES["file"]["name"];
  #          $tname=$_FILES["files"["tmp_name"];
      #      $uploads_dir='/images';
         #   move_uploaded_file($tname,$uploads_dir.'/'.$pname);
          #  $INSERT="INSERT into fileup(title,image) VALUES('$title',$pname)"

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
