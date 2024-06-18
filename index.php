<?php
   session_start();

   // Jika session "email" ada (sudah login), maka redirect ke welcome.php
   if (!empty($_SESSION["email"])) {
      header("location: welcome.php");
   }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML</title>
      <link rel="stylesheet" href="styles.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>

            <!-- Jika variable session alert ada, maka munculkan! -->
            <?php if (!empty($_SESSION['alert'])): ?>
               <div class="form-alert">
                  <p class="<?= !empty($_SESSION['failed']) ? 'form-failed' : ''; ?>">
                     <?= $_SESSION['alert']; ?>
                  </p>
               </div>
            <?php endif; ?>

            <div class="form-inner">
               <!-- Form Login: action arahkan ke file "login.php" -->
               <form action="login.php" method="POST" class="login">
                  <div class="field">
                     <input type="text" name="email" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>

               <!-- Form Register: action arahkan ke file "register.php" -->
               <form action="register.php" method="POST" class="signup">
                  <div class="field">
                     <input type="text" name="email" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input type="password" name="confirm_password" placeholder="Confirm password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>


<?php
   // Clear session "alert" dan "failed" yang telah muncul sebelumnya
   unset($_SESSION["alert"]);
   unset($_SESSION["failed"]);
?>
