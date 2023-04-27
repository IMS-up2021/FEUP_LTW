<!DOCTYPE html>
<html lang = "en-US">
    <head>
	    <title>Loving and Learning: Your Guide to Healthy, Happy Relationships</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>

        </header>
        <section id="login">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br>

                <input type="submit" value="Login">
            </form>
        </section>
        
        <footer>
            <p>&copy Loving and Learning: Your Guide to Healthy, Happy Relationships 2023</p>
        </footer>
    </body>

</html>

<?php
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];
  

  if ($user_exists) {
    // Create a session for the user
    $_SESSION['username'] = $username;

    // Redirect to the home page
    header('Location: home.php');
    exit();
  } else {
    // User does not exist, display an error message
    $_SESSION['error'] = "Invalid username or password.";
    header('Location: index.php');
    exit();
  }
?>


