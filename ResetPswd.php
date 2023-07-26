<?php include 'Config.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login and Registration Form....</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">

    </head>
	<body>
        <div class="wrapper">
            <div class="form-wrapper reset-pswd">
                <form method="POST">

                    <h2>Reset Password</h2>
                    <div class="input-group">
                        <input type="password" required name="new_password">
                        <label for="new_password">New Password</label>
                    </div> 
                    <div class="input-group">
                        <input type="password" required name="conf_password">
                        <label for="conf_password">Conform Password</label>
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
                      <input id="grid1" type="text" name="grid1" value="" required><br><br>

                      <label for="grid2A">grid2:</label>
                      <input id="grid2" type="text" name="grid2" value="" required><br><br>
                    </div>
                    <button type="submit" id="resetButton" name="resetButton">RESET</button>        
                </form>
            </div>
        <script src="Resetscript.js"></script>
	</body>
</html>