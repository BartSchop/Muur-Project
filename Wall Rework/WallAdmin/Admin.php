<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if(!isset($_SESSION['login'])){
  header("Location:../WallHome/Home.php");
 }

include "AdminInclude.php";
include( "../Templates/class.TemplatePower.inc.php" );
$tpl = new TemplatePower("../Templates/AdminTemplate.tpl");
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

case 'muteAcc':
$tpl->newBlock("mute");
	if(isset($_POST['post']))
	{
		MuteAcc($_GET['id']);
	}
	elseif($_GET['id'])
	{
		$result = DefaultDatabase3($_GET['id']);
		foreach($result as $row)
		{
			$tpl->assign("ID", $row['id']);
		}
	}
break;

case 'demuteAcc':
$tpl->newBlock("demute");
	if(isset($_POST['post']))
	{
		DeMuteAcc($_GET['id']);
	}
	elseif($_GET['id'])
	{
		$result = DefaultDatabase3($_GET['id']);
		foreach($result as $row)
		{
			$tpl->assign("ID", $row['id']);
		}
	}
break;

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

case 'deleteAcc':
$tpl->newBlock("deleteAcc");
	if(isset($_POST['post']))
	{
		DeleteAcc($_GET['id']);
	}
	elseif($_GET['id'])
	{
		$result = DefaultDatabase3($_GET['id']);
		foreach($result as $row)
		{
			$tpl->assign("ID", $row['id']);
		}
	}
break;

case 'debanAcc':
$tpl->newBlock("debanacc");
	if(isset($_POST['post']))
	{
		DeMuteAcc($_GET['id']);
	}
	elseif($_GET['id'])
	{
		$result = DefaultDatabase3($_GET['id']);
		foreach($result as $row)
		{
			$tpl->assign("ID", $row['id']);
		}
	}
break;

case 'AccOverzicht':
	$tpl->newBlock("AccOverzicht");
	$result = DefaultDatabase4();
	foreach($result as $row)
	{
		$tpl->newBlock("row2");
		$tpl->assign("VOORNAAM", $row['voornaam']);
		$tpl->assign("ACHTERNAAM", $row['achternaam']);
		$tpl->assign("EMAIL", $row['email']);
		$tpl->assign("STATUS", $row['groep_id']);
		$groepid = $row['groep_id'];
		if ($groepid == 3)
		{
			$tpl->newBlock("demutebutton");
		}
		else
		{
			$tpl->newBlock("mutebutton");
		}
		$tpl->assign("ID", $row['id']);
		if ($groepid == 0)
		{
			$tpl->newBlock("debanbutton");
		}
		else
		{
			$tpl->newBlock("banbutton");
		}
		$tpl->assign("ID", $row['id']);
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
			$tpl->assign("CONTENT", $row['content']);
			$tpl->assign("DATUM", $datum = date("d-m-Y \o\m G:i", $row['datum']));
			$tpl->assign("ID", $row['gebruiker_id']);
			$tpl->assign("POST_ID", $row['post_id']);
			$tpl->assign("NAAM", $row['voornaam']);
			$groepid = $row['groep_id'];
			$tpl->assign("ACHTERNAAM", $row['achternaam']);
			$tpl->assign("USER_ID", $row['show_id']);
			$result = DefaultComment($row['post_id']);
			foreach($result as $row)
			{
				$tpl->newBlock("addcomment");
				//Laat alle comments zien
				$tpl->assign("COMMENT", $row['content']);
				$tpl->assign("POST_ID", $row['comm_id']);
				$tpl->assign("ID", $row['gebruiker_id']);
				$tpl->assign("DATUM", $datum = date("\G\\e\p\o\s\\t \o\p d-m-Y \o\m G:i \d\o\o\\r\ ", $row['datum']));
				$tpl->assign("NAAM", $row['voornaam']);
				$tpl->assign("ACHTERNAAM", $row['achternaam']);
				$tpl->assign("USER_ID", $row['show_id']);
	}
}
break;
}
$tpl->printToScreen();

?>