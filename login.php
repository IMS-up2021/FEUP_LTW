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
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Verifica se o usuário existe no banco de dados e se a senha está correta
  // Se as credenciais estiverem corretas, redireciona o usuário para a página principal
  // Se as credenciais estiverem incorretas, exibe uma mensagem de erro
}
?>
