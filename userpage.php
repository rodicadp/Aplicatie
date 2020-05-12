<?php
	session_start();
	if(!isset($_SESSION['id_user']))
 {
    header("Location:home.php");
 }

 $loggedIn = false;

 if (isset($_SESSION['loggedIn']) && isset($_SESSION['id_user'])) {
     $loggedIn = true;
 }

	require 'mysql.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <title>User Page</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" type="text/css" href="css/userpage.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://maxcdn.bootstracdn.com/font-awesome/4.7.0/css/font-awsome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      </head>
   <body>

           <header>
               <nav class="nav" id="myTopnav">
                   <section class="link-uri">
                     
					   <a href="home.php"  >Home</a>  <!--fara sa mai apara login & signup !-->
                       <a href="page.php">Debate</a>    <!--fara login & signup + permisiunea sa comenteze la debate-uri!-->
   		             <a href="about_page.php">About</a>



                     <section class="login_sign">
                        <a href="logout.php" >Log Out</a>
                   </section>
  		 </nav>
 	</header>
    <section class="about_form">
        <div class="about">
            <h2>Start a debate</h2>
        <?php

            $mesaj='';
            if (isset($_POST['create_button'])) {
                $subject = $_POST['subject'];
            	$category = $_POST['category'];
        		$argument = $_POST['argument'];
        		$image = $_FILES['image']['name']; //ia numele imaginii
        		$target = "img/".basename($image); //locatia imaginii
        		$query="INSERT INTO debates (id_user, subject, argument, image) VALUES (".$_SESSION['id_user'].",'".$subject."', '".$argument."', '".$image."')";
				$result=mysqli_query($conexiune, $query);
				$id_debate = $conexiune->insert_id;


                if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
                {
                    $mesaj = "Image uploaded successfully";
  	             }else{
  		                 $mesaj = "Failed to upload image";
  	            }

				$query1 = "INSERT INTO `category` (`id_category`, `id_debate`, `category`) ";
    			$query1 .= "VALUES (NULL, '".$id_debate."', '".$category."');";
				$result=$conexiune->query($query1);

                  }
                      else {

        ?>

            <form method="post" action="userpage.php" enctype="multipart/form-data">
                  <section class="input-debate">
                      <label >Category:</label>
                       <input class="category-input" type="text" name="category" id="category"  placeholder="Category..." required onkeyup='limitText(this.form.category,this.form.categorycountdown,30);'>
                       <span id="count_message">
                           <input class="count1" readonly type="text" name="categorycountdown"
                           size="6" value="30/30" tabindex="-1">
                       </span>
                  </section>
                  <section class="input-debate">
                      <label >Subject:</label>
                      <textarea class="textarea" name="subject" id="subject"
                      placeholder="Enter the subject of debate..." required onkeyup='limitText(this.form.subject,this.form.subjectcountdown,150);'></textarea>
                      <span id="count_message">
                          <input class="count" readonly type="text" name="subjectcountdown"
                          size="6" value="150/150" tabindex="-1">
                      </span>
                  </section>
                  <section class="input-debate">
                      <label>Argument in support:</label>
                      <textarea class="textarea" name="argument" id="argument"
                      placeholder="Enter your argument in support..." required onkeyup='limitText(this.form.argument,this.form.argumentcountdown,500);'></textarea>
                      <span id="count_message">
                          <input class="count" readonly type="text" name="argumentcountdown" size="6" value="500/500" tabindex="-1">
                      </span>
                 </section>
                 <section class="input-debate">
                        <p>Add a relevant image for your debate</p>
                        <span class="add1">
                            <input type="file" name="image" id="image" >
                        </span>
                 </section>
                 <section class="button_create_debate">
                      <button type="submit" class="button_create_debate_text" id="create_button" name="create_button">Create</button>
                 </section>
            </form>


        </div>
        <div class="form">
            <h2>My debates</h2>
            <div class="article-list">
                <?php
          $sql = "SELECT * FROM debates WHERE id_user = '".$_SESSION['id_user']."'";
          $result=mysqli_query($conexiune,$sql);

          if (mysqli_num_rows($result)!=0)
          {

                    while ($rows=mysqli_fetch_array($result))
              {
                  echo  "
                  <a href='debate.php'  class='column'>
                  <section class='imag'>
                          <img src='img/".$rows['image']."' >
                          </section>
                          <section class='sub'>
                              <p>".$rows['subject']."</p>
                          </section>
                      </a>" ;
                } }
                else
                {
                  echo '<p style="text-align: center; color: red; font-size: 20px;">Nu sunt debate-uri de afisat</p>';
                }
            }
          ?>


                <!--<article class="column">
                    <section class="imag">

                    </section>
                    <section class="sub">
                        <p>lfnksjbkvsdblb j cjhs fjsd fjls ljfz</p>
                        <p>knflkajb  n cnsd nsd fn snz csn vz  oiferiofh izhfiu i ghohg </p>

                    </section>
                </article> *!-->



            </div>
         </div>
     </section>



<script src="js/userpage.js"></script>
<?php  mysqli_close($conexiune) ; ?>
</body>

</html>
