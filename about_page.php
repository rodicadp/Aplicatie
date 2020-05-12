<?php
	session_start();
	if(!isset($_SESSION['id_user']))
 {
    header("Location:home.php");
 }
	require 'mysql.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <title>About</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" type="text/css" href="css/about_page.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://maxcdn.bootstracdn.com/font-awesome/4.7.0/css/font-awsome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
      </head>
   <body>
       <script>
                  function action_lg(value){
                      document.getElementById("form-login").action=value;
                      document.getElementById("form-login").submit();
                  }
              </script>
           <header>
               <nav class="nav" id="myTopnav"
                   <section class="link-uri">
                       <a href="home.php">Home</a>
                       <a href="page.php">Debate</a>
  		               <a href="about_page.php" class="actived">About</a>
                   </section>
                   <section class="login_sign">
                       <a name="login" id="login_button">Log In</a>
                       <a name="signin" id="sign_button">Sign Up</a>

                   </section>
  		       </nav>
 	       </header>
    <div id="simpleModal2" class="modal">
        <section class="modal-content">
           <span class="closeBtn2">&times;</span>
            <h2 class="header_login">Sign Up</h2>
            <form method="post" action="sign_up.php" id="SignUp">
                <section class="input-group">
                  <label>Username</label>
                  <input id="username" type="text" placeholder="username" name="username">
                </section>
                <section class="input-group">
                  <label>Email</label>
                  <input id="email" type="text" placeholder="email"name="email" >
                </section>
                <section class="input-group">
                  <label>Password</label>
                  <input id="password_1" type="password" placeholder="password" name="password_1">
                </section>
                <section class="input-group">
                  <label>Confirm password</label>
                  <input id="password_2" type="password" placeholder="confirm password" name="password_2">
                </section>
                <section class="button_modal_login">
                  <button type="button" class="button_modal_login_text" name="reg_user" onmouseup="add_account();">Sign Up</button>
                </section>
           </form>
       </section>
    </div>
    <div class="modal" id="simpleModal">
        <section class="modal-content">
            <span class="closeBtn">&times;</span>
            <h2 class="header_login">Log In</h2>
            <form method="post" action="login.php" id="form-login">
              	<section class="input-group">
              		<label>Username</label>
              		<input type="text" name="username" >
              	</section>
              	<section class="input-group">
              		<label>Password</label>
              		<input type="password" name="password">
              	</section>
              	<section class="button_modal_login">
              		<button type="submit" class="button_modal_login_text" name="login_user" onmouseup="action_lg('login.php');">Log In</button>
              	</section>
            </form>
        </section>
    </div>
<div class="tot">
    <section class="imagine2">
        <div class="frontt2">
            <img class=about-image src="img/i12.jpg" alt="imagine">
        </div>
        <div class="backk2">
            <img class="about-image" src="img/i22.jpg" alt="imagine">
        </div>
    </section>

<section class="imagine">
    <div class="ceva">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</section>

<section class="imagine22">
    <div class="frontt2">
        <img class=about-image src="img/ff3.jpg" alt="imagine">
    </div>
    <div class="backk2">
        <img class="about-image" src="img/2479742.jpg" alt="imagine">
    </div>
</section>



<section class="imagine2">
    <div class="ceva">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</section>

<section class="imagine">
<div class="frontt">
    <img class=about-image src="img/follow3.jpg" alt="imagine">
</div>
<div class="backk">
    <div class="backk-content middle">
        <h2>Follow us</h2>
        <span>on</span>
        <div class="smm">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>
</section>

<section class="imagine22">
    <div class="ceva">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</section>

<div class="ceva">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>




</div>

<script src="js/about_page.js"></script>
<script src="js/sign_up.js"></script>
</body>
</html>
