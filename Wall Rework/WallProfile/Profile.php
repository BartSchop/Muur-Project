<?php 
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../WallHome/Home.php");
 }
 
include 'ProfileInclude.php';
include '../gravatar.php';
include( "../Templates/class.TemplatePower.inc.php" );
$tpl = new TemplatePower("../Templates/ProfileTemplate.tpl");
$tpl->prepare();
OpenDatabase();

if(isset($_GET['actie']))
{
	$actie = $_GET['actie'];
} 
else
{
	$actie = null;
}

switch ($actie) {
	case 'edit':
	$tpl->newBlock("edit");
	$result = ShowInfo();
	foreach($result as $row)
	{
		$tpl->assign("VOORNAAM", $row['voornaam']);
		$tpl->assign("ACHTERNAAM", $row['achternaam']);
		$tpl->assign("ADRES", $row['adres']);
		$tpl->assign("POSTCODE", $row['postcode']);
		$tpl->assign("WOONPLAATS", $row['woonplaats']);
		$tpl->assign("TELEFOON", $row['telefoon']);
		$tpl->assign("MOBIEL", $row['mobiel']);
	}
		if(isset($_POST['edit']))
		{
		EditProfile($_POST['voornaam'], $_POST['achternaam'], $_POST['adres'], $_POST['postcode'], $_POST['woonplaats'], $_POST['telefoon'], $_POST['mobiel']);
		}
		else
		{
		}
	break;

	case 'show':
	$tpl->newBlock("defaultProfile");
		$result = DefaultDatabase();
		foreach($result as $row)
		{
			$grav_url=getPicture($row['email']);
			$tpl->assign("LINK",$grav_url);
			$tpl->assign("VOORNAAM", $row['voornaam']);
			$tpl->assign("ACHTERNAAM", $row['achternaam']);
			$tpl->assign("GEBOORTEDATUM", $row['geboortedatum']);
			$tpl->assign("ADRES", $row['adres']);
			$tpl->assign("POSTCODE", $row['postcode']);
			$tpl->assign("WOONPLAATS", $row['woonplaats']);
			$tpl->assign("MOBIEL", $row['mobiel']);
			$tpl->assign("TELEFOON", $row['telefoon']);
		}
	break;

	case 'showother':
	$tpl->newBlock("defaultProfile");
		$result = DefaultDatabase1();
		foreach($result as $row)
		{
			$grav_url=getPicture($row['email']);
			$tpl->assign("LINK",$grav_url);
			$tpl->assign("VOORNAAM", $row['voornaam']);
			$tpl->assign("ACHTERNAAM", $row['achternaam']);
			$tpl->assign("GEBOORTEDATUM", $row['geboortedatum']);
			$tpl->assign("ADRES", $row['adres']);
			$tpl->assign("POSTCODE", $row['postcode']);
			$tpl->assign("WOONPLAATS", $row['woonplaats']);
			$tpl->assign("MOBIEL", $row['mobiel']);
			$tpl->assign("TELEFOON", $row['telefoon']);
		}
	break;

	default:
		$tpl->newBlock("show");
		$result = ShowPost();
		foreach($result as $row)
		{
			$tpl->newBlock("row");
			$grav_url=getPicture($row['email']);
			$tpl->assign("LINK",$grav_url);
			$tpl->assign("CONTENT", $row['content']);
			$tpl->assign("DATUM", $datum = date("d-m-Y \o\m G:i", $row['datum']));
			$tpl->assign("NAAM", $row['voornaam']);
			$tpl->assign("ACHTERNAAM", $row['achternaam']);
			$tpl->assign("POST_ID", $row['post_id']);
			$tpl->assign("USER_ID", $row['show_id']);
			$result = DefaultComment($row['post_id']);
			foreach($result as $row)
			{
				$tpl->newBlock("addcomment");
				$grav_url=getPicture2($row['email']);
				$tpl->assign("LINK",$grav_url);
				$tpl->assign("COMMENT", $row['content']);
				$tpl->assign("ID", $row['gebruiker_id']);
				$tpl->assign("DATUM", $datum = date("d-m-Y \o\m G:i", $row['datum']));
				$tpl->assign("NAAM", $row['voornaam']);
				$tpl->assign("ACHTERNAAM", $row['achternaam']);
				$tpl->assign("USER_ID", $row['show_id']);
			}
			}
	break;
}

$tpl->printToScreen();
?>