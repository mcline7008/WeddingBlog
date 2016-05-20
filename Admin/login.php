<?php
	require_once('../includes/config.php');
?>

<form action="" method="post">
<p><label>Username</label><input type="text" name="username" value="" /></p>
<p><label>Password</label><input type="text" name="password" value="" /></p>
<p><label</label><input type="submit" name="submit" value="Login" /></p>

<?php
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if($user->login($usernam, $password)){
			header('Location: index.php');
			exit;
		}
		else
		{
			$message = '<p class=:error">Wrong username or password</p>';
		}
	}

	if (isset($message)){echo $message;}
?>
