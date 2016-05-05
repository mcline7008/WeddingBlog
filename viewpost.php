<?php
	$stmt = $db->prepare('SELECT postID, postTItle, postCont, postDate From blog_posts WHERE postID = :postID');
	$stmt->execute(array(':postID' => $_GET['id']));
	$row = $stmt->fetch();

	//If there is no post redirect to the home page
	if($row['postID'] == '')
	{
		header('Location: ./');
		exit;
	}

	//Front End for displaying the post
	echo '<div>';
		echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
		echo '<p>'.$row['postCont'].'</p>';
	echo '</div>'
