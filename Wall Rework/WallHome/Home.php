<?php 
include 'HomeInclude.php';
OpenDatabase();

session_start();

include( "../Templates/class.TemplatePower.inc.php" );
$tpl = new TemplatePower("../Templates/HomeTemplate.tpl");
$tpl->prepare();

if(isset($_GET['actie']))
{
	$actie = $_GET['actie'];
} 
else
{
	$actie = null;
}

switch ($actie) {
	case 'register':
	$tpl->newBlock("register") ;
		if(isset($_POST['register']))
		{
			Register($_POST['email'], $_POST['paswoord'], $_POST['voornaam'], $_POST['achternaam']);
		}
		else
		{
		}
	break;

	case 'uitloggen':
		session_start();
		session_destroy();
		header("location:../WallHome/Home.php");
	break;

	case 'registerinfo':
	$tpl->newBlock("registerinfo");
		if(isset($_POST['registerinfo']))
		{
			RegisterInfo($_POST['dag'] . "-" . $_POST['maand'] . "-" . $_POST['jaar'], $_POST['geslacht'], $_POST['adres'] ,$_POST['postcode'], $_POST['woonplaats'], $_POST['telefoon'], $_POST['mobiel']);
		}
		else
		{
		}
	break;

	case 'inloggen':
	$tpl->newBlock("aanmelden") ;
		if(isset($_POST['inloggen']))
		{
			Inloggen($_POST['email'], $_POST['paswoord']);
		}
		else
		{
		}
	break;
	
	default:
		$tpl->newBlock("default");
	break;

	case 'recovery':
	$tpl->newBlock("recovery");
		if(isset($_POST['post']))
		{
			Recovery();
		}
		else
		{
			
		}
	break;
}

date_default_timezone_get('UTC');
setlocale(LC_ALL, 'dutch');

for ($day=1; $day <32 ; $day++){ 
	$tpl->newBlock("day");
	$tpl->assign("DAY", $day);
}

for ($maand=1; $maand <13 ; $maand++) { 
	$maand2 = strftime("%b", strtotime("$maand/12/10"));
	$tpl->newBlock("maand");
	$tpl->assign("MAAND", $maand);
	$tpl->assign("MAAND2", $maand2);
}

for ($jaar=2015; $jaar >1900; $jaar--) { 
	$tpl->newBlock("jaar");
	$tpl->assign("JAAR", $jaar);
}

$tpl->printToScreen();

?>