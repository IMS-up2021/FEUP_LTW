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
        <section id="register">
            <h1>Register</h1>
            <form action="register.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br>

                <input type="submit" value="Register">
            </form>
        </section>
            
        <footer>
            <p>&copy Loving and Learning: Your Guide to Healthy, Happy Relationships 2023</p>
        </footer>
    </body>
</html>

<?php
  // Retrieve form data
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate username
  if (empty($username)) {
    $_SESSION['error'] = "Please enter a username.";
    header('Location: index.php');
    exit();
  }

  // Validate password
  if (empty($password)) {
    $_SESSION['error'] = "Please enter a password.";
    header('Location: index.php');
    exit();
  }

  // Insert user data into database
  $sql = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
  // Execute SQL statement
  // ...

  // Set the user as logged in
  $_SESSION['username'] = $username;


  // Redirect user to login page
  header('Location: login.php');
?>
