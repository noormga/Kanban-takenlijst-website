<?php session_start();?>

<!doctype html>
<html lang="nl">

<head>
    <?php require_once '../head.php'; ?>
</head>
<body>
	<?php require_once '../header.php' ?>
	<main>
		<div class="flex-container">
			<div class="todo" id="login">
				<form action="../backend/loginController.php" method="POST" class="login-form">
					<input type="hidden" action="login" value="login">
					<h5>inloggen bij developerland</h5>
					<div class="login">
						<label for="username" >Gebruikersnaam: </label>
						<input type="text" name="username" id="username" placeholder="username">
					</div>
					<div class="login">
						<label for="wachtwoord">wachtwoord: </label>
						<input type="password" name="password" id="password" placeholder="password">
					</div>
					<div class="login">
						<input type="submit" value="login"id="submit-button">
					</div>
				</form>
			</div>
		</div>
	</main>	
</body>

</html>