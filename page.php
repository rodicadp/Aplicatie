<?php
	session_start();
	if(!isset($_SESSION['id_user']))
 {
    header("Location:home.php");
 }

?><!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <title>Debates</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" type="text/css" href="css/page.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://maxcdn.bootstracdn.com/font-awesome/4.7.0/css/font-awsome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
      </head>
   <body>
       <?php
        require("mysql.php");

            $query = "SELECT * FROM debates order by id_debate ASC";
            $query2 = "SELECT * FROM debates order by id_debate DESC";
            /*$query3="SELECT c.*, d.* FROM category c, debates d
            WHERE c.id_category = d.id_debate";*/
            $query4 = "SELECT * FROM category order by id_category ASC";
            $query3 = "SELECT * FROM debates right join category on category.id_debate=debates.id_debate";
            $result = mysqli_query($conexiune, $query) or die ('Eroare');
            $result2 = mysqli_query($conexiune, $query2) or die ('Eroare');
            $result3 = mysqli_query($conexiune, $query3) or die ('Eroare');
            $result4 = mysqli_query($conexiune, $query4) or die ('Eroare');
            ?>
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
                       <a href="page.php" class="actived">Debate</a>
  		               <a href="about_page.php">About</a>
                   </section>
				   <!-- Daca userul NU este conectat sa apara butoanele astea !-->
                   <section class="login_sign">
                       <a name="login" id="login_button">Log In</a>
                       <a name="signin" id="sign_button">Sign Up</a>
					   <!-- Daca userul  este conectat sa apara buton de logout !-->
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
              		<input type="password" name="password_1">
              	</section>
              	<section class="button_modal_login">
              		<button type="submit" class="button_modal_login_text" name="login_user" onmouseup="action_lg('login.php');">Log In</button>
              	</section>
            </form>
        </section>
    </div>
    <div class="modal" id="simpleModal3">
        <section class="modal-content">
            <span class="closeBtn3">&times;</span>
            <h2 class="header_login">Log In</h2>
            <form method="post" action="login.php" id="form-login">
              	<section class="input-group">
              		<label>Username</label>
              		<input type="text" name="username" >
              	</section>
              	<section class="input-group">
              		<label>Password</label>
              		<input type="password" name="password_1">
              	</section>
              	<section class="button_modal_login">
              		<button type="submit" class="button_modal_login_text" name="login_user" onmouseup="action_lg('userpage.php');">Log In</button>
              	</section>
            </form>
        </section>
    </div>

    <section class="tot">
                <div class="titleandmorelink">
                    <div class="tit">
                        <h3>...............</h3></div>
                    <div class="More">
                        <a name="create" id="create_button">Create Dissution</a>
                    </div>
                </div>
                <section class="tab">
                  <button class="tablinks" onclick="openTab(event, 'All')" id="defaultOpen">All debates</button>
                  <button class="tablinks" onclick="openTab(event, 'Recent')">Recent debates</button>
                  <button class="tablinks" onclick="openTab(event, 'Popular')">Popular debates</button>
                  <button class="tablinks" onclick="openTab(event, 'Category')">Category</button>
                </section>

                <div id="All" class="tabcontent">
                  <div class="cub">
                      <?php
                      if (mysqli_num_rows($result)!=0)
                        {
                          while ($rows=mysqli_fetch_array($result))
                        {
                        echo  "<a href='debate.php'  class='column'>
                                <section class='imag'>
                                    <img src='img/".$rows['image']."' >
                                </section>
                                <section class='sub'>
                                    <p>".$rows['subject']."</p>
                                </section>
                               </a>" ; }
                        } else
                        {
                          echo '<p style="text-align: center; color: red; font-size: 20px;">Nu sunt debate-uri de afisat</p>';
                        }
                  ?>
                </div>
                </div>

                <div id="Recent" class="tabcontent" >
                    <div class="cub">
                        <?php
                        if (mysqli_num_rows($result2)!=0)
                        {
                            while ($rows=mysqli_fetch_array($result2))
                        {
                          echo  "<a href='debate.php'  class='column'>
                                    <section class='imag'>
                                        <img src='img/".$rows['image']."' >
                                    </section>
                                  <section class='sub'>
                                      <p>".$rows['subject']."</p>
                                  </section>
                              </a>" ;} }
                          else
                          {
                            echo '<p style="text-align: center; color: red; font-size: 20px;">Nu sunt debate-uri de afisat</p>';
                          }
                    ?> </div>
                </div>

                <div id="Popular" class="tabcontent">
                  <h3>Popular debates</h3>
				  <h2>Order by views number</h2>
            	</div>


                <div id="Category" class="tabcontent">
					<h2>Order by category</h2>
                  <div class="all_category">
					  <!-- pentru fiecare categorie vom avea cate un container !-->
                      <div class="category-title">
                          <h3>Category name</h3>
                      </div>
                      <div class="cub-category">
						  <!--formala generala !-->
						  <a   class='column'>
                                        <section class='imag'>

                                        </section>

                                      <section class='sub'>
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
                                  </a>
                      </div>
                  </div>
                </div>

    </section>


<script src="js/model_login_signup_page.js"></script>
<script src="js/tabs_debate.js"></script>
<script src="js/sign_up.js"></script>
<?php  mysqli_close($conexiune) ; ?>
</body>
</html>
