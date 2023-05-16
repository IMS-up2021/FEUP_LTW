
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
            <p>Please enter your account!</p>
        </div>
        <section id="login_register">
            <form>
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
                <button formaction="#" formmethod="post">Login</button>
                <p class="center">Don't have an account?<a href="register.php" class="done">Register</a></p>
            </div>
        </section>
        <footer>
            <p>&copy;Love and Learning, 2023</p>
        </footer>
    </body>
</html>   


<?php
/*
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
  }*/
?>


