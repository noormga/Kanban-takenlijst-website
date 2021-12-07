<?php
session_start();


$username = $_POST['username']; 
$password = $_POST['password'];

require_once 'conn.php';
$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([
	":username" => $username,
]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if($statement->rowCount() < 1) 
	{ 
		die("Error: account bestaat niet"); 
	}
if(!password_verify($password, $user['password'])) 
	{ 
		die("Error: wachtwoord niet juist!"); 
		
	}

$_SESSION['user_id'] = $user['id'];

header("Location: ../index.php?msg=ingelogt");
if (!isset($_SESSION['user_id'])) 
{
	$msg = "je bent nog niet ingelogt";
	header("Location: task/login.php?MSG=$msg");
	exit;	
}