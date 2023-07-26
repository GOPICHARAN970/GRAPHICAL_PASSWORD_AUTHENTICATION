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
            <div class="form-wrapper sign-in">
                <form method="POST">

                    <h2>Sign In</h2>
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
		      <div class="forgot">
                        <a href = "#" id ="forgotLink">Forgot Password ?</a>
                    </div> 
                   <div style="display:none">
                    <label for="imgnoA">img</label>
                      <input id="imgnoA" type="text" name="imgnoA" value="" required><br><br>
                      
                      <label for="grid1A">grid1:</label>
                      <input id="grid1A" type="text" name="grid1A" value="" required><br><br>

                      <label for="grid2A">grid2:</label>
                      <input id="grid2A" type="text" name="grid2A" value="" required><br><br>
                    </div>
                    <button type="submit" name="signIn">Sign In</button>
                    <div class="signUp-link">
                        <p>Don't have an account? <a href="#" class="signUpBtn-link">Sign Up</a></p>
                    </div>         
                </form>
            </div>
            <div class="form-wrapper sign-up">
                <form method="POST">
                    <h2>Sign Up</h2>
                    <div class="input-group">
                        <input type="text" required name="username">
                        <label for="">Username</label>
                    </div>
                    <div class="input-group">
                        <input type="email" required name="email">
                        <label for="">Email</label>
                    </div>  
                    <div class="input-group">
                        <input type="password" required name="password">
                        <label for="">Password</label>
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
                    <label for="imgno">img</label>
                    <input id="imgno" type="text" name="imgno" value="" required><br><br>
                    
                    <label for="grid1">grid1:</label>
                    <input id="grid1" type="text" name="grid1" value="" required><br><br>

                    <label for="grid2">grid2:</label>
                    <input id="grid2" type="text" name="grid2" value="" required><br><br>
                    </div>
                    <button type="submit" name="signUp">Sign Up</button>
                    <div class="signUp-link">
                        <p>Already have an account? <a href="#" class="signInBtn-link">Sign In</a></p>
                    </div>
                                    
                </form>
            </div>                  
        </div>
        
        <script src="script.js"></script>
	</body>
</html>