<?php
	session_start();
	header('Location: another-page.php');
	exit();
?>


<!DOCTYPE html>
<html lang = "en-US">
    <head>
        <title>Loving and Learning: Your Guide to Healthy, Happy Relationships</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <li><a href="main_page.php">Página Inicial</a></li>
			<li><a href="tickets.php">Meus Tickets</a></li>
			<li><a>Logout</a></li>
		</ul>
	</nav>
	<main>
		<h2>Profile</h2>
		<form method="POST" action="profile.php">
  			<label for="name">Name:</label>
  			<input type="text" name="name" id="name" value="<?php echo $name; ?>" required>

  			<label for="username">Username:</label>
  			<input type="text" name="username" id="username" value="<?php echo $username; ?>" required>

  			<label for="password">Password:</label>
  			<input type="password" name="password" id="password" required>

  			<label for="email">Email:</label>
  			<input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
		</form>
		<form method="POST" action="process.php">
  			<button type="submit">Update profile</button>
		</form>

	</main>
	<footer>
		<p>&copy Loving and Learning: Your Guide to Healthy, Happy Relationships</p>
	</footer>
    </body>
</html>
