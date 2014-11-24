<?php

function OpenDatabase(){
	global $db;
	$db = new PDO('mysql:host=localhost;dbname=demuur','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

function DefaultDatabase(){
	global $db;
	$id = $_SESSION["login"];
	$sql = "SELECT * FROM gebruikers 
			INNER JOIN persoon ON persoon.id = gebruikers.persoon_id 
			WHERE gebruikers.id = $id";
	return $db->query($sql);
}

function DefaultDatabase1(){
	global $db;
	$id = $_GET['id'];
	$sql = "SELECT * FROM gebruikers 
			INNER JOIN persoon ON persoon.id = gebruikers.persoon_id 
			WHERE gebruikers.id = $id";
	return $db->query($sql);
}

function ShowPost(){
	global $db;
	$id = $_SESSION["login"];
	$sql = "SELECT *, post.id as post_id, persoon.id as show_id FROM post 
	INNER JOIN gebruikers ON post.gebruiker_id = gebruikers.id
	INNER JOIN persoon ON gebruikers.persoon_id = persoon.id
	WHERE gebruiker_id = $id AND status = 1 ORDER BY datum DESC";
	return $db->query($sql);
}
function EditProfile($voornaam, $achternaam, $adres, $postcode, $woonplaats, $telefoon, $mobiel){
	global $db;
	$id = $_SESSION["login"];
	$sql = "UPDATE persoon SET voornaam = :voornaam, achternaam = :achternaam, adres = :adres, postcode = :postcode, woonplaats = :woonplaats, telefoon = :telefoon, mobiel = :mobiel WHERE id = $id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':voornaam', $voornaam, PDO::PARAM_STR);
	$stmt->bindParam(':achternaam', $achternaam, PDO::PARAM_STR);
	$stmt->bindParam(':adres', $adres, PDO::PARAM_STR);
	$stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
	$stmt->bindParam(':woonplaats', $woonplaats, PDO::PARAM_STR);
	$stmt->bindParam(':telefoon', $telefoon, PDO::PARAM_STR);
	$stmt->bindParam(':mobiel', $mobiel, PDO::PARAM_STR);
	$stmt->execute();
	header("location:Profile.php?id=$id");
}

function ShowInfo(){
	global $db;
	$id = $_SESSION["login"];
	$sql = "SELECT * FROM gebruikers 
			INNER JOIN persoon ON persoon.id = gebruikers.persoon_id 
			WHERE gebruikers.id = $id";
	return $db->query($sql);
}
function DefaultComment($id){
	global $db;
	$sql = "SELECT *, persoon.id as show_id FROM comment 
	INNER JOIN gebruikers ON comment.gebruiker_id = gebruikers.id 
	INNER JOIN persoon ON gebruikers.persoon_id = persoon.id 
	WHERE post_id = $id AND status = 1 ORDER BY datum DESC";
	return $db->query($sql);
}
?>