<?php
//database connection here
$conn = new mysqli("localhost", "root", "", "gpa");
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}

if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password) {
            //echo "<h2>Login successfully</h2>";
            header('location:database.php'); 
        } else {
            echo "<h2>Invalid Email or password or User-type</h2>";
        }
    } else {
        echo "<h2>Invalid email or password</h2>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style type="text/css">
        body {
            background-color: #f2f2f2;
        }
        form {
            margin: 50px auto;
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        label, input, select {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Login</h2>
        <div class="card-body">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" placeholder="Enter your ID" name="id" required>
                    <label for="username">username</label>
                    <input type="text" placeholder="Enter your username" name="username" required>
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter your password" name="password" required>
                    <input type="submit" class="btn btn-primary w-100" value="Login" name="">
                </div>
            </form>
        </div>
    </form>
</body>
</html>
