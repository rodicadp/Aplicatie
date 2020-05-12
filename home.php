<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <title>Home</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" type="text/css" href="css/home.css">
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
                      <a href="home.php"  class="active">Home</a>
                      <a href="page.php">Debate</a>
  		             <a href="about_page.php">About</a>
                     </section>
                     <section class="login_sign">
                        <a name="login" id="login_button">Log In</a>
                   </section>
  		 </nav>
 	</header>

    <div class="modal" id="simpleModal2">
        <section class="modal-content">
            <span class="closeBtn">&times;</span>
            <h2 class="header_login">Log In</h2>
            <form method="post" action="login.php" id="form-login">
              	<section class="input-group">
              		<label>Username</label>
              		<input type="text" name="username" value="" >
              	</section>
              	<section class="input-group">
              		<label>Password</label>
              		<input type="password" name="password_1" value="">
              	</section>
              	<section class="button_modal_login">
              		<button type="button" class="button_modal_login_text" name="button" onmouseup="action_lg('login.php');">Log In</button>
              	</section>
            </form>
        </section>
    </div>
    <?php
    //$message = "Username deja existent !";

        if (isset($_GET['info']) && ($_GET['info'] == 'exista'))
        {
            echo '<p style="text-align: center;  font-size: 18px;" color: red;>Username existent!</p>';
            //echo alert("");
        }
    ?>
    <?php
        if(isset($_GET['info']) && ($_GET['info'] == 'gresit'))
            {
                echo '<p style="text-align: center;  font-size: 18px;" color: red;>Datele introduse sunt eronate!</p>';
            }
    ?>

        <section class="about_form">
            <div class="about">

                <div class="w3-content w3-display-container" style="width:100%">
                      <img class="mySlides" src="img/266551.jpg" alt="imagine">
                      <img class="mySlides" src="img/924077.jpg" alt="imagine">
                      <img class="mySlides" src="img/924103.jpg" alt="imagine">
                      <img class="mySlides" src="img/817670.jpg" alt="imagine">
                      <img class="mySlides" src="img/img2.jpg" alt="imagine">
                </div>

            </div>
            <div class="form">
                <h2 class="header_sign">Sign Up</h2>
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
                      	<section class="input-group">
                      	  <button type="button" class="buton" name="reg_user" onmouseup="add_account();">Sign Up</button>
                        </section>
                   </form>
             </div>
         </section>


    <section class="articles">
        <div class="cub">
            <div class="titleandmorelink">
                <div class="tit">
                    <h3>All debates</h3></div>
                    <!-- maxim 3 debate-uri din categoria din sectiunea descrisa...
                    pentru mai multe, accesam butonul MORE care ne duce fix la sectiunea potrivita !-->
                <div class="More">
                    <a href="page.php#alldebates">MORE</a></div>
            </div>
            <div class="article-list">
                <article class="column">
                    <section class="imag">

                    </section>
                    <section class="sub">
                        <div class="text">
                            <!-- la fiecare debate trebuie setat, ca subiectul, sa nu depaseasca un anumit numar de caractere !-->
                            <p>jidiehdoi ehrfiuhefuh eufhierufh ieufh iuefiuehifu iuefiuseifnefnkdfbh</p>
                        </div>
                        <div class="inform">
                            <div class="icons">
                                <!-- functii care sa calculeze automat nr view and likes !-->
                              <i class="fas fa-eye iconita">215</i>
                              <i class="fas fa-thumbs-up iconita">23</i> </div>
                              <span class="author">by username</span>
                        </div>
                    </section>
                </article>
            </div>
        </div>
        <div class="cub">
            <div class="titleandmorelink">
                <div class="tit">
                    <h3>Recent</h3></div>
                <div class="More">
                    <a href="page.php#recent">MORE</a></div>
            </div>
            <div class="article-list">
                <article class="column">
                    <section class="imag">

                    </section>
                    <section class="sub">
                        <div class="text">
                            <!-- la fiecare debate trebuie setat, ca subiectul, sa nu depaseasca un anumit numar de caractere !-->
                            <p>jidiehdoi ehrfiuhefuh eufhierufh ieufh iuefiuehifu iuefiuseifnefnkdfbh</p>
                        </div>
                        <div class="inform">
                            <div class="icons">
                                <!-- functii care sa calculeze automat nr view and likes !-->
                              <i class="fas fa-eye iconita">215</i>
                              <i class="fas fa-thumbs-up iconita">23</i> </div>
                              <span class="author">by username</span>
                        </div>
                    </section>
                </article>
                <article class="column">
                    <section class="imag">

                    </section>
                    <section class="sub">
                        <div class="text">
                            <!-- la fiecare debate trebuie setat, ca subiectul, sa nu depaseasca un anumit numar de caractere !-->
                            <p>jidiehdoi ehrfiuhefuh eufhierufh ieufh iuefiuehifu iuefiuseifnefnkdfbh</p>
                        </div>
                        <div class="inform">
                            <div class="icons">
                                <!-- functii care sa calculeze automat nr view and likes !-->
                              <i class="fas fa-eye iconita">215</i>
                              <i class="fas fa-thumbs-up iconita">23</i> </div>
                              <span class="author">by username</span>
                        </div>
                    </section>
                </article>
                <article class="column">
                    <section class="imag">

                    </section>
                    <section class="sub">
                        <div class="text">
                            <!-- la fiecare debate trebuie setat, ca subiectul, sa nu depaseasca un anumit numar de caractere !-->
                            <p>jidiehdoi ehrfiuhefuh eufhierufh ieufh iuefiuehifu iuefiuseifnefnkdfbh</p>
                        </div>
                        <div class="inform">
                            <div class="icons">
                                <!-- functii care sa calculeze automat nr view and likes !-->
                              <i class="fas fa-eye iconita">215</i>
                              <i class="fas fa-thumbs-up iconita">23</i> </div>
                              <span class="author">by username</span>



                        </div>

                    </section>
                </article>

            </div>
        </div>
        <div class="cub">
            <div class="titleandmorelink">
                <div class="tit">
                    <h3>Popular</h3></div>
                <div class="More">
                    <a href="page.php#popular">MORE</a></div>
            </div>
            <div class="article-list">
                <article class="column">
                    <section class="imag">

                    </section>
                    <section class="sub">
                        <div class="text">
                            <!-- la fiecare debate trebuie setat, ca subiectul, sa nu depaseasca un anumit numar de caractere !-->
                            <p>jidiehdoi ehrfiuhefuh eufhierufh ieufh iuefiuehifu iuefiuseifnefnkdfbh</p>
                        </div>
                        <div class="inform">
                            <div class="icons">
                                <!-- functii care sa calculeze automat nr view and likes !-->
                              <i class="fas fa-eye iconita">215</i>
                              <i class="fas fa-thumbs-up iconita">23</i> </div>
                              <span class="author">by username</span>
                        </div>
                    </section>
                </article>
                <article class="column">
                    <section class="imag">

                    </section>
                    <section class="sub">
                        <div class="text">
                            <!-- la fiecare debate trebuie setat, ca subiectul, sa nu depaseasca un anumit numar de caractere !-->
                            <p>jidiehdoi ehrfiuhefuh eufhierufh ieufh iuefiuehifu iuefiuseifnefnkdfbh</p>
                        </div>
                        <div class="inform">
                            <div class="icons">
                                <!-- functii care sa calculeze automat nr view and likes !-->
                              <i class="fas fa-eye iconita">215</i>
                              <i class="fas fa-thumbs-up iconita">23</i> </div>
                              <span class="author">by username</span>
                        </div>
                    </section>
                </article>
                <article class="column">
                    <section class="imag">

                    </section>
                    <section class="sub">
                        <div class="text">
                            <!-- la fiecare debate trebuie setat, ca subiectul, sa nu depaseasca un anumit numar de caractere !-->
                            <p>jidiehdoi ehrfiuhefuh eufhierufh ieufh iuefiuehifu iuefiuseifnefnkdfbh</p>
                        </div>
                        <div class="inform">
                            <div class="icons">
                                <!-- functii care sa calculeze automat nr view and likes !-->
                              <i class="fas fa-eye iconita">215</i>
                              <i class="fas fa-thumbs-up iconita">23</i> </div>
                              <span class="author">by username</span>
                        </div>
                    </section>
                </article>
            </div>
        </div>
    </section>

<!-- <footer class="footer">

    <ul id="f-menu">
        <li><a href="index.html">Acasa</a></li>
        <li><a href="despre.html">Despre noi</a></li>
        <li><a href="servicii.html">Servicii</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</footer> !-->

<script src="js/slide_animation.js"></script>
<script src="js/model_login_home.js"></script>
<script src="js/sign_up.js"></script>
</body>
</html>
