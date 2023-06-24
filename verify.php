<?php include 'Config.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equi="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify</title>
        <link rel = "stylesheet" href="style.css">
        <link rel = "stylesheet" href="verify.css">
    </head>
    <body>
        <div class="form" style="text-align: center;">
            <h2>Verify Your Account</h2>
            <p>We Emailed you the 4 digit OTP code. Please Enter the OTP.....</p>
            <form action="POST" autocomplete="off">
                <div class="error-text" style="display: none;">Error</div>
                   <div class="fields-input">
                      <input type="number" name="otp" class="otp-field" placeholder="Enter 4 digit OTP" onpaste="false">
                   </div>
                   <div class="submit">
                       <input type="submit" name="reset" value="Verify Now" class="button">
                   </div>
            </form>
        </div>    
        <!-- <script src="js/verify.js"></script> -->
    </body>
</html>
