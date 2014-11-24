<?php

function OpenDatabase(){
	global $db;
	$db = new PDO('mysql:host=localhost;dbname=demuur','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

//Alle post functions , Delete, Comment, Edit
function Post($content, $id){
	global $db;
		$result = DefaultID();
		foreach($result as $row)
		{
		$groepid = $row['groep_id'];
		}

	if($content == NULL)
	{
		?>
			<script>
	    		alert("Niet alle verplichten velden zijn ingevuld, vul alle velden met een * in.");
	   		</script>
	   	<?php
	}
	else
	{
		if ($groepid == 3)
		{
			?>
				<script>
    				alert("Je account is gemute voor een tijd.");
   				</script>
   			<?php
		}
		else
		{
			$id = $_SESSION["login"];
			$sql = "INSERT INTO post (content, datum, gebruiker_id) VALUES (:content, :datum, :gebruiker_id)";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':content', $content, PDO::PARAM_STR);
			$stmt->bindParam(':datum', time(), PDO::PARAM_INT);
			$stmt->bindParam(':gebruiker_id', $id, PDO::PARAM_STR);
			$stmt->execute();
			header("location: Post.php");
		}
	}
}
function EditPost($content, $id){
	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE post SET content = :content WHERE id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':content', $content, PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
	$stmt->execute();
	header("location:../WallProfile/Profile.php");
}
function DeletePost($id){
	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE post SET status = '0' WHERE id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
	$stmt->execute();
	header("location:../WallProfile/Profile.php");
}

//Alle comment functions, Delete, Edit, Post
function AddComment($content, $postid){
	global $db;
		$result = DefaultID();
		foreach($result as $row)
		{
		$groepid = $row['groep_id'];
		}

if($content == NULL)
{
	?>
		<script>
    		alert("Niet alle verplichten velden zijn ingevuld, vul alle velden met een * in.");
   		</script>
   	<?php
}
else
{
	if ($groepid == 3)
	{
		?>
			<script>
				alert("Je account is gemute voor een tijd.");
			</script>
		<?php
	}
	else
	{
		$postid = $_GET['id'];
		$id = $_SESSION["login"];
		$sql = "INSERT INTO comment (content, post_id, gebruiker_id, datum) 
				VALUES (:content, :post_id, :gebruiker_id, :datum)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':content', $content, PDO::PARAM_STR);
		$stmt->bindParam(':datum', time(), PDO::PARAM_INT);
		$stmt->bindParam(':post_id', $postid, PDO::PARAM_INT);
		$stmt->bindParam(':gebruiker_id', $id, PDO::PARAM_INT);
		$stmt->execute();
		header("location: ../WallPost/Post.php");
	}
}
}
function DeleteComm($id){
	global $db;
	$id = $_GET['id'];
	$sql = "UPDATE comment SET status = '0' WHERE id = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	header("location: ../WallPost/Post.php");
}
function EditComm($content, $id){
	global $db;
	$id = $_GET['id'];

		$sql = "UPDATE comment SET content = :content WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':content', $content, PDO::PARAM_STR);
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->execute();
		header("location: ../WallPost/Post.php");
}

//Defaults
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
	ORDER BY datum DESC";
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
function DefaultID(){
	global $db;
	$id = $_SESSION["login"];
	$sql = "SELECT * FROM gebruikers WHERE id = $id";
	return $db->query($sql);
}
?>