<?php

function OpenDatabase(){
	global $db;
	$db = new PDO('mysql:host=localhost;dbname=demuur','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}


function Register($email, $paswoord, $voornaam, $achternaam){
	global $db;
	$sql = "SELECT * FROM gebruikers WHERE email = :email";
	$stmt = $db->prepare($sql);
	$paswoordconf = $_POST['confirmPaswoord'];
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->execute();
	if($email == NULL or $paswoord == NULL or $paswoordconf == NULL or $voornaam == NULL or $achternaam == NULL)
	{
		?>
			<script>
				alert("Niet alle verplichten velden zijn ingevuld, vul alle velden met een * in.");
			</script>
		<?php
	}
	else
	{
		if($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			?>
				<script>
					alert("Het E-mail adres wat je hebt ingevuld is al in gebruik, probeer een ander E-mail adres.");
				</script>
			<?php
		}
		else
		{
			$paswoord = $_POST['paswoord'];
			$confirmPaswoord = $_POST['confirmPaswoord'];

			if($paswoord == $confirmPaswoord)
			{
				$query = "INSERT INTO persoon (voornaam, achternaam) VALUES (:voornaam, :achternaam)";
				$stmt = $db->prepare($query);
				$stmt->bindParam(':voornaam', $voornaam, PDO::PARAM_STR);
				$stmt->bindParam(':achternaam', $achternaam, PDO::PARAM_STR);
				$stmt->execute();

				$persoonid = $db->lastInsertID();
				$sql = "INSERT INTO gebruikers (email, paswoord, persoon_id) VALUES (:email, :paswoord, :persoon_id)";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':email', $email, PDO::PARAM_STR);
				$stmt->bindParam(':paswoord', $paswoord, PDO::PARAM_STR);
				$stmt->bindParam(':persoon_id', $persoonid, PDO::PARAM_STR);
				$stmt->execute();

				$_SESSION["id"] = $persoonid;

				header("location: Home.php?actie=registerinfo");
			}
			else
			{
				?>
					<script>
						alert("Het wachtwoord wat je hebt ingevuld is niet het zelfden, probeer het opnieuw.");
					</script>
				<?php
			}
		}
	}
}

function RegisterInfo($geboortedatum, $geslacht, $adres, $postcode, $woonplaats, $telefoon, $mobiel){
	global $db;
	if($geboortedatum == NULL)
	{
		?>
			<script>
				alert("Niet alle verplichten velden zijn ingevuld, vul alle velden met een * in.");
			</script>
		<?php
	}
	else
	{
		
		$id = $_SESSION["id"];
		$sql = "UPDATE persoon SET geslacht = :geslacht, adres = :adres, geboortedatum = :geboortedatum, postcode = :postcode, woonplaats = :woonplaats, telefoon = :telefoon, mobiel = :mobiel WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':geboortedatum', $geboortedatum, PDO::PARAM_STR);
		$stmt->bindParam(':adres', $adres, PDO::PARAM_STR);
		$stmt->bindParam(':geslacht', $geslacht, PDO::PARAM_STR);
		$stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
		$stmt->bindParam(':woonplaats', $woonplaats, PDO::PARAM_STR);
		$stmt->bindParam(':telefoon', $telefoon, PDO::PARAM_STR);
		$stmt->bindParam(':mobiel', $mobiel, PDO::PARAM_STR);
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->execute();
		header("location: Home.php?actie=inloggen");
	}
}

function Inloggen($email, $paswoord){
	global $db;
	$sql = "SELECT * FROM gebruikers WHERE email = :email AND paswoord = :paswoord";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam(':paswoord', $paswoord, PDO::PARAM_STR);
	$stmt->execute();
	if($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{

		$_SESSION["login"] = $row['id'];
		$id = $_SESSION["login"];
			$result = DefaultID();
			foreach($row as $result)
			{
				$groepid = $row['groep_id'];
			}
			if ($groepid == 0)
			{
				?>
					<script>
						alert("Je account is gedeactiveerd. Er is een e-mail gestuurd naar jou e-mail adres.");
					</script>
				<?php
			}
			else
			{
				header("location: ../WallProfile/Profile.php?id=$id");
			}
	}
	else
	{
		?>
			<script>
				alert("Het wachtwoord of E-mail adres is niet correct, probeer het opnieuw.");
			</script>
		<?php
	}
}
function DefaultID(){
	global $db;
	$sql = "SELECT * FROM gebruikers";
	return $db->query($sql);
}
?>