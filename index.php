<?php require('includes/config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Cline Bird Wedding</title>
</head>

<body>
<h1>This is the Cline Bird Wedding Blog</h1>

<div class="blogPosts">

<?php
	try {
		$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
		while($row = $stmt->fetch()){
			echo '<div>';
			echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
			echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
			echo '<p>'.$row['postDesc'].'</p>';
			echo '<p><ahref="viewpost.php?id='.$row['postID'].'">Read More</a></p>';
			echo '</div>'
		}

	}catch (PDOException $e)
	{
		echo $e->getMessage();
	}

?>

</div>
</body>
</html>