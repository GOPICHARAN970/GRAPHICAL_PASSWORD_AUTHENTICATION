<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include 'Config.php';

// Check if the login form is submitted
if (isset($_POST['id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cat']) && isset($_POST['imgnoA']) && isset($_POST['grid1']) && isset($_POST['grid2'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cat = $_POST['cat'];
    $imgnoA = $_POST['imgnoA'];
    $grid1 = $_POST['grid1'];
    $grid2 = $_POST['grid2'];

    $stmt = $conn->prepare("SELECT * FROM admin1 WHERE id = ? AND email = ? AND cat = ? AND imageno = ? AND grid1 = ? AND grid2 = ?");
    $stmt->bind_param("ssssss", $id, $email, $cat, $imgnoA, $grid1, $grid2);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password) {
            // Set session data to indicate the user is logged in
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['cat'] = $data['cat'];
            $_SESSION['imageno'] = $data['imageno'];
            $_SESSION['grid1'] = $data['grid1'];
            $_SESSION['grid2'] = $data['grid2'];

            header('Location: database.php');
            exit();
        } else {
            echo '<script>alert("Invalid Email or Password");</script>';
        }
    } else {
        echo '<script>alert("Invalid ID, Email, Category, Image, or Grids");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>

<body>
    <div class="home-btn">
            <button onclick="window.location.href='Home.html'">Home</button>
    </div>
     <div class="wrapper">
      <div class="form-wrapper sign-in">
        <form method="POST" action="">
        <h2>Login</h2>
          <div class="input-group">
              <input type="text" required name="id">
               <label for="id">ID</label>
          </div> 
          <div class="input-group">
               <input type="email" required name="email">
               <label for="email">Email</label>
          </div> 
          <div class="input-group">
               <input type="password" required name="password">
               <label for="password">Password</label>
          </div> 
          <div class="input-group">
                    <select required name="cat">
                        <option value="" disabled selected></option>
                        <option value="category1">Cats</option>
                        <option value="category2">Dogs</option>
                        <option value="category3">Flowers</option>
                        <option value="category4">Birds</option>
                        <option value="category5">Fruits</option>
                        <option value="category6">Cars</option>
                        <option value="category7">Bikes</option>
                        <option value="category8">Buildings</option>
                        <option value="category9">Fishes</option>
                        <option value="category10">Snakes</option>
                    </select>
                    <label for="">Select Category</label>
            </div>
           <div style="display:none">
                 <label for="imgnoA">img</label>
                    <input id="imgnoA" type="text" name="imgnoA" value="" required><br><br>
                      
                    <label for="grid1A">grid1:</label>
                    <input id="grid1A" type="text" name="grid1" value="" required><br><br>

                    <label for="grid2A">grid2:</label>
                    <input id="grid2A" type="text" name="grid2" value="" required><br><br>
           </div>
           <button type="submit" id="loginBtn">LOGIN</button> 
      </form>  
     </div>
    <script src="loginScript.js"></script>
  </div>
</body>
</html>