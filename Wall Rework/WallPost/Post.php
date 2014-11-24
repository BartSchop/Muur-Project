<?php
error_reporting(E_ALL ^ E_DEPRECATED);

session_start();

include 'PostInclude.php';
include '../gravatar.php';
include 'RemoveTag.php';
include( "../Templates/class.TemplatePower.inc.php" );
$tpl = new TemplatePower("../Templates/PostTemplate.tpl");
$tpl->prepare();
OpenDatabase();

$result = DefaultID();
foreach($result as $row)
{
	$groepid = $row['groep_id'];
}
if ($groepid == 2)
{
	$tpl->newBlock("adminmenu");
}

if(isset($_GET['actie']))
{
	$actie = $_GET['actie'];
} 
else
{
	$actie = null;
}

switch ($actie) {
	case 'post':

		if(isset($_POST['post']))
		{
			$saneText=removeeviltags ($_POST['content']);
			Post($saneText, $_SESSION["login"]);
		}
		else
		{
		}
	break;

	case 'delete':
	$tpl->newBlock("delete");
		if(isset($_POST['post']))
		{
			DeletePost($_GET['id']);
		}
		elseif($_GET['id'])
		{
			
			$results = DefaultDatabase1($_GET['id']);
			foreach($results as $row)
			{
				$tpl->assign("POST_ID", $row['id']);
			}
		}
	break;

	case 'edit':
		if(isset($_POST['edit']))
		{
			EditPost($_POST['content'], $_GET['id']);
		}
		elseif($_GET['id'])
		{
			
			$results = DefaultDatabase1($_GET['id']);
			foreach($results as $row)
			{
				$tpl->newBlock("edit");
				$tpl->assign("POST_ID", $row['id']);
				$tpl->assign("CONTENT", $row['content']);
			}
		}
	break;

	case 'addcomment':
	$tpl->newBlock("addcomment");
		if(isset($_POST['post']))
		{
			AddComment($_POST['content'], $_GET['id']);
		}
		elseif($_GET['id'])
		{	
			$results = DefaultDatabase1($_GET['id']);
			foreach($results as $row)
			{
				$tpl->assign("POST_ID", $row['id']);
			}
		}
	break;

	case 'editComm':
	$perid = $_SESSION["login"];
	$gebid = $_GET['gebid'];
	if ($perid == $gebid)
	{
		if(isset($_POST['edit']))
		{
			EditComm($_POST['content'], $_GET['id'], $_GET['gebid']);
		}
		elseif($_GET['id'])
		{
			$results = DefaultDatabase2($_GET['id']);
			foreach($results as $row)
			{
				$tpl->newBlock("editComm");
				$tpl->assign("POST_ID", $row['id']);
				$tpl->assign("ID", $row['gebruiker_id']);
				$tpl->assign("CONTENT", $row['content']);
			}
		}
	}

	case 'deleteComm':
	$tpl->newBlock("deleteComm");
		$perid = $_SESSION["login"];
			if(isset($_POST['post']))
			{
				DeleteComm($_GET['id']);
			}
			elseif($_GET['id'])
			{
				$result = DefaultDatabase2($_GET['id']);
				foreach($result as $row)
				{
					$tpl->assign("COMM_ID", $row['id']);
				}
			}
	break;

	default:
	$perid = $_SESSION["login"];
	$tpl->newBlock("default");
	$result = DefaultDatabase();
	foreach($result as $row)
	{
		//Laat alle posts zien
		$tpl->newBlock("row");
		$stid = $row['status'];
		if ($stid == 0)
		{
			$tpl->assign("CONTENT", "Deze post is verwijderd");
		}
		else
		{
			$grav_url=getPicture($row['email']);
			$tpl->assign("LINK",$grav_url);
			$tpl->assign("CONTENT", $row['content']);
			$tpl->assign("DATUM", $datum = date("\G\\e\p\o\s\\t \o\p d-m-Y \o\m G:i \d\o\o\\r\ ", $row['datum']));
			$tpl->assign("ID", $row['gebruiker_id']);
			$tpl->assign("POST_ID", $row['post_id']);
			$tpl->assign("NAAM", $row['voornaam']);
			$tpl->assign("ACHTERNAAM", $row['achternaam']);
			$tpl->assign("USER_ID", $row['show_id']);
			$tpl->newBlock("commentshow");
			$tpl->assign("POST_ID", $row['post_id']);
			$result = DefaultComment($row['post_id']);
			foreach($result as $row)
			{
				$tpl->newBlock("addcomment");
				if ($perid == $row['gebruiker_id'])
					{
						//laat bij alle comments van de ingelogde gebruiker de delete en verander optie zien
						$grav_url=getPicture2($row['email']);
						$tpl->assign("LINK",$grav_url);
						$tpl->newBlock("editcomment");
						$tpl->assign("COMMENT", $row['content']);
						$tpl->assign("POST_ID", $row['comm_id']);
						$tpl->assign("ID", $row['gebruiker_id']);
						$tpl->assign("DATUM", $datum = date("\G\\e\p\o\s\\t \o\p d-m-Y \o\m G:i \d\o\o\\r\ ", $row['datum']));
						$tpl->assign("NAAM", $row['voornaam']);
						$tpl->assign("ACHTERNAAM", $row['achternaam']);
						$tpl->assign("USER_ID", $row['show_id']);
					}
					else
					{
						//Laat alle comments zien
						$grav_url=getPicture2($row['email']);
						$tpl->assign("LINK",$grav_url);
						$tpl->assign("COMMENT", $row['content']);
						$tpl->assign("POST_ID", $row['comm_id']);
						$tpl->assign("ID", $row['gebruiker_id']);
						$tpl->assign("DATUM", $datum = date("\G\\e\p\o\s\\t \o\p d-m-Y \o\m G:i \d\o\o\\r\ ", $row['datum']));
						$tpl->assign("NAAM", $row['voornaam']);
						$tpl->assign("ACHTERNAAM", $row['achternaam']);
						$tpl->assign("USER_ID", $row['show_id']);
					}
			}
		}
	}

	break;
}
$tpl->printToScreen();
?>