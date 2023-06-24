<?php

$server='localhost';
$username='root';
$password='';
$database='gpa';

$conn=mysqli_connect($server,$username,$password,$database);

if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
}
echo"";

if(isset($_POST['signUp'])){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cat=$_POST['cat'];
    $imgno=$_POST['imgno'];
    $grid1=$_POST['grid1'];
    $grid2=$_POST['grid2'];
    $otp = rand(100000, 999999);
    $sql="INSERT INTO `login`(`email`,`password`,`username`,`cat`,`imgno`,`grid1`,`grid2`,`otp`) VALUES ('$email','$password','$name','$cat','$imgno','$grid1','$grid2','$otp')";
    if(mysqli_query($conn,$sql))
    {
        header("location:index.php");
        echo "Records inserted succesfully.";
    }
    else
    {
        echo "ERROR:could not able to execute $sql." . mysqli_error($conn);
    }
    
}

if(isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cat=$_POST['cat'];
    $imgno=$_POST['imgnoA'];
    $grid1=$_POST['grid1A'];
    $grid2=$_POST['grid2A'];
    $query="SELECT * FROM  login WHERE `email`='$email' AND `password`='$password' AND `cat`='$cat' AND `imgno`='$imgno' AND `grid1`='$grid1' AND `grid2`='$grid2'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result)==1){
        header("location:https://matrusri.edu.in/");
    }
    else
    {
        
        echo "<p style='margin-left: 160px; color:green; font-size: 25px;'>"."Email ID or password is incorrect"."</p>";
        header("location:LoginUnsuccessful.html");
    }
}

if(isset($_POST['enterotp'])){
    $email=$_POST['email'];
    $sql="SELECT * FROM  login WHERE `email`='$email'";
    $result=mysqli_query($conn,$sql); // Execute the query

    if(mysqli_num_rows($result)==1){
        $to = $email;
        $subject = "OTP";
        $sql1="SELECT  `otp` FROM  login WHERE `email`='$email'";
        $result=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $message = $row['otp'];

        // Additional headers
        $headers = "From: punnaakhil33@gmail.com\r\n";
        $headers .= "Reply-To: punnaakhil33@gmail.com\r\n";
        // $headers .= "CC: cc@example.com\r\n";
        // $headers .= "BCC: bcc@example.com\r\n";

        // Send the email
        $mailSent = mail($to, $subject, $message, $headers);

        if ($mailSent) {
            echo "Email sent successfully.";
        } else {
            echo "Failed to send email.";
        }
    }
    else {
        echo "Entered email not found in the database.";
    }
}




// if(isset($_POST['enterotp'])){
//     $otp=$_POST['otp'];
//     $email=$_POST['email'];
//     $sql="SELECT * FROM  login WHERE `email`='$email'";
//     if(mysqli_num_rows($result)==1){
//         header("location:https://matrusri.edu.in/");
//     }
//     else
//     {
//         echo "Entered email not in db $sql." . mysqli_error($conn);
//     }
    
// }




?>