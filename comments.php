<?php
if(isset($_POST['user_comm']))
{
  $id_debate =$_POST['id_debate'];
  $comment=$_POST['user_comm'];
  $id_user = $_SESSION['id_user'];
  $insert_query="INSERT INTO pro (id_debate, id_user, comment, createdOn)
   VALUES ('$id_debate','$id_user',$comment', NOW())";

  $insert = mysqli_query($conexiune,$insert_query);
  $id=mysqli_insert_id($conexiune);

  $select=mysqli_query($conexiune,"SELECT username,comment,DATE_FORMAT(pro.createdOn, '%Y-%m-%d') AS createdOn from pro join users where users.id_user='$id_user' and comment='$comment' and id_pro='$id'");

  if($row=mysqli_fetch_array($select))
  {
	  $name=$row['username'];
	  $comment=$row['comment'];
      $time=$row['createdOn'];
  ?>
     <div class="comment_div">
	    <p class="name">Posted by: <?php echo $name;?></p>
        <p class="comment"><?php echo $comment;?></p>
	    <p class="time"><?php echo $time;?></p>
    </div>
  <?php
  }
exit;
}
 ?>
