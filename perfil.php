<?php
session_start();

// Verificar se o usuário está logado, caso contrário, redirecionar para a página de login
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

// Conectar ao banco de dados
$db = new PDO('sqlite:database.db');

// Consultar as informações do usuário atual
$stmt = $db->prepare("SELECT name, username, email FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obter os dados do formulário
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];

  // Atualizar as informações do usuário no banco de dados
  $stmt = $db->prepare("UPDATE users SET name = ?, username = ?, email = ? WHERE id = ?");
  $stmt->execute([$name, $username, $email, $_SESSION['user_id']]);

  // Redirecionar para a página de perfil
  header("Location: perfil.php");
  exit();
}

?>


<!DOCTYPE html>
<html lang = "en-US">
    <head>
        <title>Loving and Learning: Your Guide to Healthy, Happy Relationships</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <li><a href="home.php">Página Inicial</a></li>
			<li><a href="tickets.php">Meus Tickets</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
	<main>
		<h2>Perfil</h2>
		<form action="update_profile.php" method="post">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br><br>
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" value=""<?php echo htmlspecialchars($user['email']); ?>" required><br><br>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" value="********"><br><br>
			<label for="address">Address:</label>
			<input type="text" name="address" id="address" value="Rua das Flores, 123"><br><br>
			<label for="telephone">Telephone:</label>
			<input type="tel" name="telephone" id="telephone" value="(11) 99999-9999"><br><br>
			<label for="gender">Gender:</label>
			<select name="gender" id="gender">
				<option value="Female">Female</option>
				<option value="Male">Male</option>
				<option value="Non-Binary">Non-Binary</option>
			</select><br><br>
			<input type="submit" value="Save">
            <input type="submit" value="Cancel">
		</form>
	</main>
	<footer>
		<p>&copy Loving and Learning: Your Guide to Healthy, Happy Relationships</p>
	</footer>
    </body>
</html>
