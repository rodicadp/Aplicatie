	<?php
			session_start();
			$loggedIn = false;

			 if (isset($_SESSION['loggedIn']) && isset($_SESSION['id_user'])) {
			     $loggedIn = true;
			 }

			 $action = "view";

			 if (isset($_GET['action'])) {
			 	$action = $_GET['action'];
			 }
			 require ('mysql.php');
	?>
	<!DOCTYPE html>
	<html lang="en" dir="ltr">
	   <head>
	      <title>Debate</title>
	      <meta charset="UTF-8">
	      <meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <link rel="stylesheet" type="text/css" href="css/debate.css">
	      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	      <link href="https://maxcdn.bootstracdn.com/font-awesome/4.7.0/css/font-awsome.min.css" rel="stylesheet">
	      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
		  <script type="text/javascript" src="js/jquery.js">
		  <script type="text/javascript">

		  $("#new-comment").submit(function(event) {
			  event.preventDefault();

			  //var id_debate = document.getElementById('id_debate');
			  var comment = document.getElementById('comment').value;

			  $.ajax({
				  type: 'post',
				  url: 'comments.php',
				  data: {
					  id_debate: $('#id_debate').val(),
					  user_comm:comment
				  },

				  success: function ()
				  {
					  console.log("succces");
				  },
				  error: function()
				  {
					  console.log("fail");
				  }
			  });
		  });
			  /*function processNewComment(e) {
		 	  	var comment = document.getElementById("comment").value;
	  		      $.ajax({
	  		        type: 'post',
					contentType: 'application/x-www-form-urlencoded'
	  		        url: 'comments.php',
	  		        data: {
						id_debate:id_debate,
	   					id_pro:id_pro,
	   			        user_comm:comment
					},
	  		        success: function (response)
	  		        {
						document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
			  	    	document.getElementById("comment").value="";
	  					console.log("call on success");
					},
					error: function(data, status, jqXhr)
					{
						console.log(status);
					}
				  });
				  e.preventDefault();
			  }
			  $('#new-comment').onsubmit(processNewComment);
		  /*function processComment()
			  {
			    var comment = document.getElementById("comment").value;
			    if(comment.length > 5)
			    {
			      $.ajax({
			        type: 'post',
			        url: 'comments.php',
			        data:
			        {
					 id_debate:id_debate,
					 id_pro:id_pro,
			         user_comm:comment
			        },
			        success: function (response)
			        {
						document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
			  	    	document.getElementById("comment").value="";
				},
					error: function(jqXhr, textStatus, errorThrown)
					{
						console.log(errorThrown);
					}
			      });
			  	}
			    return false;
			}*/
			  </script>
	      </head>
	   <body>
	           <header>
	               <nav class="nav" id="myTopnav"
	                   <section class="link-uri">
	                      <a href="home.php">Home</a>
	                      <a href="page.php">Debate</a>
	  		             <a href="about_page.php">About</a>
	                     </section>
	                     <section class="back-user">
	                        <a href="userpage.php">Back</a>
	                   </section>
	  		      </nav>
	 	      </header>
	<?php
	$query = "SELECT * FROM debates WHERE id_debate=".$_GET['id_debate'];
	$rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
	 ?>
	<section class="content">
		<section class="column">

		<section class="sub">
			<?php
			if ($action == "view") {
				if (mysqli_num_rows($rezultat) > 0) {
	            while($row = mysqli_fetch_assoc($rezultat)) {
					echo "<div class='text'>
							<section class='topic'>
								<p>" . $row["subject"] . "</p>
							</section>
							<section class='argument'>
								<p>" . $row["argument"] . "</p>
							</section>
						  </div> "; }}} ?>
			<div class="inform">
				<div class="icons">
				  <i class="fas fa-eye iconita">215</i> 
				  <i class="fas fa-thumbs-up iconita"></i>
				  <i class="fas fa-thumbs-down iconita"></i>
				  <button id="report" type="button" name="button" ><i class="fas fa-flag"></i></button>
			 </div>
			</div>
			<div class="modal" id="editDebate">
				<section class="modal-content">
					<span class="closeBtn">&times;</span>
					<h2 class="header_login">Edit debate</h2>
					<form method="post" action="debate.php?id=<?=$id?>" id="form-edit">
	                    <section class="input-debate">
	                        <label >Subject:</label>
	                        <textarea type="text" class="textarea" name="subject" id="subject" ><?=$roww["subject"]?></textarea>
	                    </section>
	                    <section class="input-debate">
	                        <label>Argument in support:</label>
	                        <textarea type="text" class="textarea" name="argument" id="argument" ><?=$roww["argument"]?></textarea>
	                   </section>

	                   <section class="button_create_debate">
	                        <button type="submit" class="button_create_debate_text" id="submit" name="submit">Edit</button>
	                   </section>
					</form>
				</section>
			</div>
		</section>
		</section>
	</section>

	<section class="content2">
	<section class="pro">
		<header class="type-p">
			<h3>Pro section</h3>
		</header>
		<form id='new-comment' method='post' action="">
			<!-- <input type="hidden" id="username" name="username"> !-->
			<input type="hidden" name="id_debate" id="id_debate">
			<input type="hidden" name="id_pro" id="id_pro">
		  	<textarea name="user_comm" class="textarea-comm" id="comment" placeholder="Write your Pro argument here....."></textarea>
		  	<br>
		  	<input id="submit" class="add-user-comm" type="submit" value="Post Comment">
		  </form>
		  <div id="all_comments">
			  <?php
				$id_debate = $conexiune->real_escape_string($_GET['id_debate']);
				$comm = "SELECT pro.id_pro, pro.id_debate, username, comment, DATE_FORMAT(pro.createdOn, '%Y-%m-%d') AS
				createdOn FROM pro  join users where id_debate = '$id_debate' and users.id_user = pro.id_user order by comment desc";
				$rezultat_s = mysqli_query($conexiune, $comm) or die ('Eroare');
			    while($row=mysqli_fetch_assoc($rezultat_s))
			    {
				  $name=$row['username'];
				  $comment=$row['comment'];
			      $time=$row['createdOn'];
			    ?>
				<div class="comment_div">
				  <section class="name">Posted by: <?php echo $name;?></section>
			      <p class="comment"><?php echo $comment;?></p>
				  <section class="time"><?php echo $time;?></section>
				</div>
			    <?php
			    }
			    ?>
	  	</div>
	</section>
	<section class="contra">
		<header class="type-c">
			<h3>Con Section</h3>
		</header>
	    <div class="add.comm">
			<p>Same as Pro Section</p>
	    </div>
	</section>
	</section>
<!--	<script src="js/debate.js"></script> !-->
	<?php mysqli_close($conexiune) ; ?>
	</body>
	</html>
