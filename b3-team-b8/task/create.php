<?php session_start();
if (!isset($_SESSION['user_id'])) 
{
	$msg = "je bent nog niet ingelogt";
	header("Location: ../task/login.php?MSG=$msg");
	exit;	
}
?>

<!doctype html>
<!-- http://localhost/b3-team-b8/create.php -->
<!-- ^^^ link via localhost ^^^-->
<html lang="nl">
<head>
<?php 
    require_once '../head.php'; 

?>
</head>
<body>
<?php 
	require_once '../header.php';
	
?>
	<main>
		<div class="form-wrapper">
			<div class="flex-container">
				<div class="form-create">
					<form action="../backend/tasksController.php" method="POST">
						<input type="hidden" name="action" value="create">
						<h1>maak hier een nieuwe taak aan</h1>
						<!-- titel van de taak -->
						<div class="form-group">
							<label for="titel">titel</label>
							<input type="text" name="titel">				
						</div>	
						<!-- melder  -->
						<div class="form-group">
							<label for="user">melder</label>
							<input type="text" name="user">		
						</div>				
							<!-- dropdown menu -->
						<div class="form-group">
							<label for="afdeling"> afdeling </label>
							<select name="afdeling" id="afdeling">
					          <option value="">- kies een afdeling -</option>
					          <option value="Personeel">Personeel</option>
					          <option value="horeca">horeca</option>
					          <option value="Inkoop">Inkoop</option>
					          <option value="techniek">techniek</option>
					          <option value="klantenservice">klantenservice</option>
					          <option value="groen">groen</option>
			        		</select>
						</div>
		         <!-- beschrijvings vak van de taak  -->
						<div class="form-group">
							<label for="beschrijving">beschrijving taak</label>
							<textarea name="beschrijving" id="beschrijving" cols="30" rows="10"></textarea>
						</div>	
						<!-- deadline van de taak -->
						<div class="form-group">
							<label for="status">deadline:</label>
							<input type="date" name="deadline" id="" placeholder = "Y/M/D">
						</div>

						<div class="form-group">
							<label for="status">status:</label>
							<input type="text" value="todo" name="status" readonly>
						</div>
						<div class="form-group-submit">
							<input type="submit" name="submit" value="aanmaken">
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
</body>