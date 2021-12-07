<?php
session_start();
if (!isset($_SESSION['user_id'])) 
{
	$msg = "je bent nog niet ingelogt";
	header("Location: ../login.php?MSG=$msg");
	exit;	
}

	$action = $_POST['action'];

	

if($action == 'create')
{
	// variable
	$titel = $_POST['titel'];
	if(empty($titel)) 
	{
		$errors[] = "Vul de titel van de taak in."; 
		header("Location: ../task/create.php?error=geen titel");
	}

	$user = $_POST['user'];
	$user = $_SESSION['user_id'];
	if (empty($user)) 
	{
		$errors[] = "vul in wie de de melder is";
		header("Location: ../task/create.php?error= geen melder");
	}
	var_dump($user);
	$beschrijving = $_POST['beschrijving'];
	if (empty($beschrijving)) 
	{
		$errors[] = "beschrijf de taak in het kort.";
		header("Location: ../task/create.php?error=geen beschrijving");
	}

	$afdeling = $_POST['afdeling'];
	if (empty($afdeling)) 
	{
		$errors[] = "kies een afdeling.";
		header("Location: ../task/create.php?error=geen afdeling");
	}

	$status = $_POST['status'];

	if (isset($errors)) 
	{ 
		var_dump($errors); 
		die(); 
	}

	$deadline = $_POST ["deadline"];
	if (empty($deadline)) 
	{
		$errors[] = "kies een afdeling.";
		header("Location: ../task/create.php?error=geen afdeling");
	}

	// stap 1
	require_once '../backend/conn.php';

	// stap 2
	$query = "INSERT INTO taken (titel, beschrijving, afdeling, status , deadline, user) VALUES (:titel, :beschrijving, :afdeling, :status , :deadline, :user)";

	// STAP 3
	$statement = $conn->prepare($query);

	// stap 4
	$statement->execute([
		":titel" => $titel,
		":beschrijving" => $beschrijving,
		":afdeling" => $afdeling,
		":status" => $status,
		":deadline" => $deadline,
		":user"=> $user
	]);

	// stap 5
	header("Location: ../task/view.php?message=Taak aangemaakt");
}


if($action == "update")

{
	$id = $_POST['id'];
	$beschrijving = $_POST['beschrijving'];
	$status = $_POST['status'];
	$afdeling = $_POST['afdeling'];
	$titel = $_POST['titel'];
	$deadline = $_POST ['deadline'];


	require_once '../backend/conn.php';


	$query = "UPDATE taken SET beschrijving = :beschrijving, status = :status, afdeling = :afdeling, titel = :titel, deadline = :deadline  WHERE id = :id";


	$statement = $conn->prepare($query);

	$statement->execute([

		":beschrijving" => $beschrijving,
		":status" => $status,
		":afdeling" => $afdeling,
		":titel" => $titel,
		":deadline" => $deadline,
		":id" => $id
		
	]);
	header("Location: ../task/view.php?message=Taak Aangepast");
	// var_dump($_POST);
	// die;
}
// stap 5


if($action == "delete")

{
	$id = $_POST['id'];
	var_dump($id);
	// die;
	// $id = $_POST['id'];
	require_once '../backend/conn.php';
	$query = "DELETE FROM taken WHERE id = :id";
	$statement = $conn->prepare($query);
	$statement->execute([
		":id" =>$id
	]);
 header("Location: ../task/view.php?message=Taak verwijdert");	
}

