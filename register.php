
<link rel="stylesheet" href="main.css">
<!DOCTYPE html>
<html lang = "en-US">
    <head>
        <title> Ticket line </title>
        <meta charset="UTF-8"> 
    </head>
    <body>
        <header>
            <img src="Logo.png" alt="Brand" class="brand">
            <input type="text" placeholder="Search...">
            <a href="login.php" class="log_reg">Login</a>
            <a href="register.php" class="log_reg">Register</a>
        </header>
        <nav class="menu">
            <ul>
                <li><a href="index.php">Initial page</a></li>
                <li><a href="tips.php">Tips</a></li>
                <li><a href="questions.php">Questions</a></li>
                <li><a href="perfil.php">Profile</a></li>
            </ul>
          </nav>
        <div class="frase">
            <p>Create your Magic Ticket account!</p>
        </div>
        <section id="login_register">
            <form>
                <label>
                Username 
                </label>
                <input type="username" name="username"><br></br>
                <label>
                E-mail 
                </label>
                <input type="email" name="email"><br></br>
                <label>
                Password 
                </label>
                <input type="password" name="password"><br></br>
            </form>
            <div class="button">
                <button formaction="#" formmethod="post">Register</button>
                <p class="center">Already have an account?<a href="login.php" class="done">Login</a></p>
            </div>
        </section>
        <footer>
            <p>&copy;Love and Learning, 2023</p>
        </footer>
    </body>
</html> 

<?php
/*
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
  */
?>
