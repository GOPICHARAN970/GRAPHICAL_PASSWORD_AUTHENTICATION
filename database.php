<?php
include 'Config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="styling3.css">
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
</head>

<body>
    <div class="contatiner">
    <h1>Display of Applications</h1>
        <!-- &nbsp <button class="btn btn-primary my-5"><a href="user.php" class="text-light">add user</a></button> -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>
                    <th scope="col">cat</th>
                    <th scope="col">imgno</th>
                    <th scope="col">grid1</th>
                    <th scope="col">grid2</th>
                    <th scope="col">otp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `login`";
                $result = mysqli_query($conn, $query);
                if ($result) 
                {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $Username = $row['username'];
                        $Email = $row['email'];
                        $Password = $row['password'];
                        $Cat = $row['cat'];
                        $Imgno = $row['imgno'];
                        $Grid1 = $row['grid1'];
                        $Grid2 = $row['grid2'];
                        $Otp = $row['otp'];
                        echo '<tr>
                                <td>' . $Username . '</td>
                                <td>' . $Email . '</td>
                                <td>' . $Password . '</td>
                                <td>' . $Cat . '</td>
                                <td>' . $Imgno . '</td>
                                <td>' . $Grid1 . '</td>
                                <td>' . $Grid2 . '</td>
                                <td>' . $Otp . '</td>
                                <td>
                                    
                                    <button class="btn btn-danger">
                                        <a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a>
                                    </button>
                                </td>
                            </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </script>
</body>

</html>
