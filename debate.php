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

	//require 'sign_up.php';

	///$username = $conexiune->real_escape_string($_POST['username']);
	function createCommentRow($data) {
	    global $conexiune;

	    $response = '
	            <div class="comment">
	                <div class="user">'.$data['username'].' <span class="time">'.$data['createdOn'].'</span></div>
	                <div class="userComment">'.$data['comment'].'</div>
	                <div class="reply"><a href="javascript:void(0)" data-id_pro="'.$data['id_pro'].'" onclick="reply(this)">reply</a></div>
	                <div class="replies">';

	    $sql = $conexiune->query("SELECT pro_replies.id_pro_replies, username, comment, DATE_FORMAT(pro_replies.createdOn, '%Y-%m-%d') AS createdOn FROM pro_replies INNER JOIN users ON pro_replies.id_user = users.id_user WHERE pro_replies.id_pro = '".$data['id_pro']."' ORDER BY pro_replies.id_pro DESC LIMIT 1");
	    while($dataR = $sql->fetch_assoc())
	        $response .= createCommentRow($dataR);

	    $response .= '
	                        </div>
	            </div>
	        ';

	    return $response;
	}

	if (isset($_POST['getAllComments'])) {
	    $start = $conexiune->real_escape_string($_POST['start']);

	    $response = "";
	    $sql = $conexiune->query("SELECT pro.id_pro, username, comment, DATE_FORMAT(pro.createdOn, '%Y-%m-%d') AS createdOn FROM pro INNER JOIN users ON pro.id_user = users.id_user ORDER BY pro.id_pro DESC LIMIT $start, 20");
	    while($data = $sql->fetch_assoc())
	        $response .= createCommentRow($data);

	    exit($response);
	}


	if (isset($_POST['addComment'])) {
	    $comment = $conexiune->real_escape_string($_POST['comment']);
	    $isReply = $conexiune->real_escape_string($_POST['isReply']);
	    $id_pro = $conexiune->real_escape_string($_POST['id_pro']);

	    if ($isReply != 'false') {
	        $conexiune->query("INSERT INTO pro_replies (comment, id_pro, id_user, createdOn) VALUES ('$comment', '$id_pro', '".$_SESSION['id_user']."', NOW())");
	        $sql = $conexiune->query("SELECT pro_replies.id_pro, username, comment, DATE_FORMAT(pro_replies.createdOn, '%Y-%m-%d') AS createdOn FROM pro_replies INNER JOIN users ON pro_replies.id_user = users.id_user ORDER BY pro_replies.id_pro DESC LIMIT 1");
	    } else {
	        $conexiune->query("INSERT INTO pro (id_user, comment, createdOn) VALUES ('".$_SESSION['id_user']."','$comment',NOW())");
	        $sql = $conexiune->query("SELECT pro.id_pro, username, comment, DATE_FORMAT(pro.createdOn, '%Y-%m-%d') AS createdOn FROM pro INNER JOIN users ON pro.id_user = users.id_user ORDER BY pro.id_pro DESC LIMIT 1");
	    }

	    $data = $sql->fetch_assoc();
	    exit(createCommentRow($data));
	}
			$sqlNumComments=$conexiune->query("SELECT id_pro from pro");
			$numComments = $sqlNumComments->num_rows;


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

      </head>
   <body>
	   <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="  crossorigin="anonymous"></script>
	   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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



<section class="content">
<section class="column">


	<section class="sub">
		<div class="text">
			<section class="topic">
			<p>Subject from database</p>
			</section>
			<section class="argument">
				<p>argument from database<br></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</section>
		</div>
		<div class="inform">
			<div class="icons">
				<!-- rating system : 5 stars !-->

			  <i class="fas fa-eye iconita">215</i> <!-- functii care sa calculeze automat nr view and likes !-->
			  <i class="fas fa-thumbs-up iconita"></i>
			  <i class="fas fa-thumbs-down iconita"></i>

			  <button id="report" type="button" name="button" ><i class="fas fa-flag"></i></button>
			  <!-- Daca userul nu e conectat sa nu apara asta!-->
			  <!-- Doar la userul care detine dezbatere!-->
			   <button id="delete" name="button"><i class="fas fa-trash"></i></button>
			   <button id="edit" name="button"><i class="fas fa-edit"></i></button>
		   </div>

		</div>
<!-- Deschiderea formului de editare a debate-ului !-->
<!-- Importare date din baza....sa fie afisate, gata de editare-->
		<div class="modal" id="editDebate">
			<section class="modal-content">
				<span class="closeBtn">&times;</span>
				<h2 class="header_login">Edit debate</h2>
				<form method="post" action="debate.php" id="form-edit">

                    <section class="input-debate">
                        <label >Subject:</label>
                        <textarea class="textarea" name="subject" id="subject"></textarea>
                    </section>
                    <section class="input-debate">
                        <label>Argument in support:</label>
                        <textarea class="textarea" name="argument" id="argument"></textarea>
                   </section>
				   	<div class="img-change">
					   <div class="ch">

                          <label class="label-change">Change image</label></div>
                          <section class="add1">
                              <input class="button_change" type="file" name="image" id="image" >
                          </section>
				   </div>
                   <section class="button_create_debate">
                        <button type="submit" class="button_create_debate_text" id="create_button" name="create_button">Edit</button>
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
    <div class="add.comm">
		<textarea id="mainComment" class="textarea-comm" placeholder="Support the ideea by adding your pro." rows="10" cols="30"></textarea><br>
		<button type="button" class="add-user-comm" onclick="isReply = false;" name="button" id="addComment">Add Comment</button>
    </div>
	<div class="list-comm">
		<h3 class="number"><b id="numComments"><?php echo $numComments ?> comments</b></h3>
		<div class="userComments">
		</div>
	</div>
</section>
<div class="row replyRow" style="display:none">
    <div class="col-md-12">
        <textarea class="textarea-comm-rep" id="replyComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
        <button style="float:right" class="btn-reply" onclick="isReply = true;" id="addReply">Add Reply</button>
        <button style="float:right" class="btn-close" onclick="$('.replyRow').hide();">Close</button>
    </div>
</div>


<section class="contra">
	<header class="type-c">
		<h3>Con Section</h3>
	</header>
    <div class="add.comm">
<p>Same as Pro Section</p>
    </div>
</section>
</section>





<script type="text/javascript">
var isReply = false, id_pro = 0, max = <?php echo $numComments ?>;

$(document).ready(function () {
	$("#addComment, #addReply").on('click', function () {
		var comment;

		if (!isReply)
			comment = $("#mainComment").val();
		else
			comment = $("#replyComment").val();

		if (comment.length > 5) {
			$.ajax({ url: 'debate.php',	method: 'POST', dataType: 'text',
				data: {
					addComment: 1,
					comment: comment,
					isReply: isReply,
					id_pro: id_pro
				}, success: function (response) {
					max++;
					$("#numComments").text(max + " Comments");

					if (!isReply) {
						$(".userComments").prepend(response);
						$("#mainComment").val("");
					} else {
						id_pro = 0;
						$("#replyComment").val("");
						$(".replyRow").hide();
						$('.replyRow').parent().next().append(response);
					}
				}
			});
		} else
			alert('Please Check Your Inputs');
	});

	        getAllComments(0, max);
	    });

		function react(id)

	    function reply(caller) {
	        id_pro = $(caller).attr('data-id_pro');
	        $(".replyRow").insertAfter($(caller));
	        $('.replyRow').show();
	    }

	    function getAllComments(start, max) {
	        if (start > max) {
	            return;
	        }

	        $.ajax({
	            url: 'debate.php',
	            method: 'POST',
	            dataType: 'text',
	            data: {
	                getAllComments: 1,
	                start: start
	            }, success: function (response) {
	                $(".userComments").append(response);
	                getAllComments((start+20), max);
	            }
	        });
	    }

</script>



<script src="js/debate.js"></script>
</body>
</html>
