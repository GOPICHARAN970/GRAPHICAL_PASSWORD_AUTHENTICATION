<?php 
include 'Config.php';
if (isset($_POST['verifyme'])) {
    // Concatenate the entered OTP digits
    $enteredOtp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'];

    // Retrieve the email and the stored OTP from the query string
    $email = $_SESSION['email'];
    $_SESSION['email2']=$email;
    // $storedOtp = $_SESSION['otp'];
    $query = "SELECT otp FROM login WHERE `email`='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $storedOtp = $row['otp'];
    }

    if ($enteredOtp === $storedOtp) {
        // Entered OTP matches the stored OTP
        // Redirect to ResetPswd.php with the email value
        echo  '<script>
                window.open("ResetPswd.php");
              </script>';
        exit();
    } else {
        // Entered OTP does not match the stored OTP
        echo '<script>alert("Invalid OTP. Please try again.");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OTP Verification Form</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="verify.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
      <header>
        <i class="bx bxs-check-shield"></i>
      </header>
      <h4>Enter OTP Code</h4>
      <form method="POST">
        <div class="input-field">
          <input type="number" name="otp1" id="otp1" min="0" max="9" required/>
          <input type="number" name="otp2" id="otp2" min="0" max="9" required/>
          <input type="number" name="otp3" id="otp3" min="0" max="9" required/>
          <input type="number" name="otp4" id="otp4" min="0" max="9" required/>
          <input type="number" name="otp5" id="otp5" min="0" max="9" required/>
        </div>
        <button type="submit" id="verifyBtn" name="verifyme">Verify OTP</button>
      </form>
    </div>
    <script>
      const inputs = document.querySelectorAll("input");
      const verifyBtn = document.getElementById("verifyBtn");

      inputs.forEach((input, index) => {
        input.addEventListener("keydown", (e) => {
          if (e.key === "Backspace" && input.value === "") {
            if (index > 0) {
              inputs[index - 1].focus();
            }
          }
        });

        input.addEventListener("input", (e) => {
          const currentInput = e.target;
          const nextInput = input.nextElementSibling;

          if (currentInput.value.length > 1) {
            currentInput.value = currentInput.value[0];
          }

          if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
            nextInput.removeAttribute("disabled");
            nextInput.focus();
          }

          const isLastInput = index === inputs.length - 1;
          if (!isLastInput && !inputs[index].disabled && inputs[index].value !== "") {
            nextInput.focus();
          }

          const isAllInputsFilled = Array.from(inputs).every((input) => input.value !== "");
          if (isAllInputsFilled) {
            verifyBtn.classList.add("active");
          } else {
            verifyBtn.classList.remove("active");
          }
        });
      });

      window.addEventListener("load", () => inputs[0].focus());
    </script>
  </body>
</html>