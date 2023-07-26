<?php
include 'Config.php';
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'gpa';

$conn = mysqli_connect($server, $username, $password, $database);
$id=$_GET['updateid'];
$sql="SELECT * FROM `login` WHERE `id`='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$Username = $row['username'];
$Email = $row['email'];
$Password = $row['password'];
$Cat = $row['cat'];
$Imgno = $row['imgno'];
$Grid1 = $row['grid1'];
$Grid2 = $row['grid2'];
$Otp = $row['otp'];

if(isset($_POST['update'])){
    $Username = $row['username'];
    $Email = $row['email'];
    $Password = $row['password'];
    $Cat = $row['cat'];
    $Imgno = $row['imgno'];
    $Grid1 = $row['grid1'];
    $Grid2 = $row['grid2'];
    $Otp = $row['otp'];

    $sql="UPDATE `login` SET `username`='$Username',`email`='$Email', `password`='$Password',`cat`='$Cat',`imgno`='$Imgno',`grid1`='$Grid1',
    `grid2`='$Grid2',`otp`='$Otp'";  
    $result=mysqli_query($conn,$sql);
    if($result)
    {
       //echo "data updated succesfully";
       header('location:database.php'); 
    }
    else
    {
        die(mysqli_error($conn));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <title>Details Updation</title>
</head>

<body>
    <div class="container my-5">
    <h1>Details Updation</h1>
        <form method="post">
            <div class="form-group">
                <label>username</label>
                <input type="text" class="form-control" name="username" value=<?php echo $Username;?> >
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" class="form-control" name="email" value=<?php echo $Email;?> >
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="text" class="form-control" name="password" value=<?php echo $Password;?> >
            </div>
            <div class="form-group">
                <label>cat</label>
                <input type="text0" class="form-control" name="cat" value=<?php echo $Cat;?> >
            </div>
            <div class="form-group">
                <label>grid1</label>
                <input type="number" class="form-control" name="grid1" value=<?php echo $Grid1;?> >
            </div>
            <div class="form-group">
                <label>grid2</label>
                <input type="number" class="form-control" name="grid2" value=<?php echo $Grid2;?> >
            </div>
            <button type="submit" class="btn btn-primary" name="update" >Update</button>
        </form>
    </div>
</body>

</html>