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
            <form action="register.php" method="post">
                <label>
                    username <input type = "text" name="username">
                </label>
                <label>
                    Password <input type = "password" name="password">
                </label>
                <button formaction="#" formmethod="post">Login</button>
            </form>
        </section>
            
        <footer>
            <p>&copy Loving and Learning: Your Guide to Healthy, Happy Relationships 2023</p>
        </footer>
    </body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Insere o novo usuário no banco de dados
  // Se o registro for bem-sucedido, redireciona o usuário para a página de login
  // Se houver algum erro, exibe uma mensagem de erro
}
?>
