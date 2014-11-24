<?php
function OpenDatabase(){
	global $db;
	$db = new PDO('mysql:host=localhost;dbname=demuur','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
function DeleteComm($id){
	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE comment SET status = '0' WHERE id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	header("location: ../WallAdmin/Admin.php");
}
function DeletePost($id){
	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE post SET status = '0' WHERE id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
	$stmt->execute();
	header("location:../WallAdmin/Admin.php");
}
function DeleteAcc($id){
	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE gebruikers SET groep_id = '0' WHERE id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();

	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE post SET status = '0' WHERE gebruiker_id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();

	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE comment SET status = '0' WHERE gebruiker_id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	header("location:../WallAdmin/Admin.php?actie=AccOverzicht");
}
function MuteAcc($id){
	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE gebruikers SET groep_id = '3' WHERE id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	header("location:../WallAdmin/Admin.php?actie=AccOverzicht");
}
function DeMuteAcc($id){
	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE gebruikers SET groep_id = '1' WHERE id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	header("location:../WallAdmin/Admin.php?actie=AccOverzicht");
}

//Alle defaults
function DefaultComment($id){
	global $db;
	$sql = "SELECT *, persoon.id as show_id, comment.id as comm_id 
	FROM comment INNER JOIN gebruikers ON comment.gebruiker_id = gebruikers.id 
	INNER JOIN persoon ON gebruikers.persoon_id = persoon.id 
	WHERE post_id = $id AND status = 1 ORDER BY datum DESC";
	return $db->query($sql);
}
function DefaultDatabase(){
	global $db;
	$sql = "SELECT *, post.id as post_id, persoon.id as show_id FROM post 
	INNER JOIN gebruikers ON post.gebruiker_id = gebruikers.id
	INNER JOIN persoon ON gebruikers.persoon_id = persoon.id
	WHERE status = 1 ORDER BY datum DESC";
	return $db->query($sql);
}
function DefaultDatabase1($id){
	global $db;
	$sql = "SELECT * FROM post WHERE status = 1 AND id = $id ORDER BY datum DESC";
	return $db->query($sql);
}
function DefaultDatabase2($id){
	global $db;
	$sql = "SELECT * FROM comment WHERE id = $id";
	return $db->query($sql);
}
function DefaultDatabase3($id){
	global $db;
	$sql = "SELECT * FROM gebruikers WHERE id = $id";
	return $db->query($sql);
}
function DefaultDatabase4(){
	global $db;
	$sql = "SELECT * FROM gebruikers INNER JOIN persoon ON gebruikers.persoon_id = persoon.id";
	return $db->query($sql);
}
?>