<!DOCTYPE html>
<html lang="en">
<head>
 <script type="text/javascript">
 function disable() {
  setTimeout("document.getElementById('addpost').disabled=true;",0);
  setTimeout("document.getElementById('addcomment').disabled=true;",0);
 }
 </script>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../Style/styleAdmin.css" style="style/css">
</head>
<body>
<div class="default">
	<div class="logo">
		<img src="../Style/logo.png">
	</div>
	<div class="button">
		<ul class="top">
			<li>
				<h3>Welkom op de Muur</h3>
			</li>
			<li>
				<a href="../WallHome/Home.php?actie=uitloggen"><button type="button">Uitloggen</button></a>
			</li>
			<li>
				<a href="Home.php?actie=register"><button type="button">Ander account</button></a>
			</li>
		</ul>
	</div>
</div>
<div class="leftmenu">
	<ul class="menu">
		<li><a href="../WallHome/Home.php?actie=uitloggen">Uitloggen</a></li>
		<li><a href="../WallProfile/Profile.php">Jouw profiel</a></li>
		<li><a href="../WallAdmin/Admin.php">Post overzicht</a></li>
		<li><a href="../WallAdmin/Admin.php?actie=AccOverzicht">Account overzicht</a></li>
		<li><a href="../WallPost/Post.php">Hoofd Pagina</a></li>
	</ul>
</div>
	<!-- START BLOCK : default -->
<div class="basic">
	<form method="post" action="../WallPost/Post.php?actie=post">
		<p>
			*<textarea rows="4" cols="50" name="content" placeholder="Content..."></textarea>
		</p>
		<p>
			<label>&nbsp;</label>
			<input onclick="disable();" id="addpost" type="submit" value="post" name="post" style="width:370px"/>
		</p>
	</form>
	<!-- START BLOCK : row -->
		<div class="basic1">
					<h3>{CONTENT}</h3>
					<h4>Gepost op {DATUM} door <a href="../WallProfile/Profile.php?actie=showother&id={USER_ID}">{NAAM} {ACHTERNAAM}</a></h4>
				<form method="post" action="../WallPost/Post.php?actie=addcomment&id={POST_ID}">
					<p>
						*<textarea rows="1" cols="20" name="content" placeholder="Comment..."></textarea>
					</p>
					<p>
						<label>&nbsp;</label>
						<input type="submit" onclick="disable();" id="addcomment" value="Reactie plaatsen" name="post" style="width:160px"/>
					</p>
				</form>
				<ul class="knop">
					<li>
						<a href="../WallAdmin/Admin.php?actie=delete&id={POST_ID}"><button>Verwijderen</button></a>
					</li>
				</ul>
		<!-- START BLOCK : addcomment -->
			<div class="basic1">
				<p>{COMMENT}</p>
				<a href="../WallPost/Post.php?actie=editComm&id={POST_ID}">Aanpassen</a>
				<a href="../WallAdmin/Admin.php?actie=deleteComm&id={POST_ID}">Verwijderen</a>
				<h5>{DATUM}<a href="../WallProfile/Profile.php?actie=showother&id={USER_ID}">{NAAM} {ACHTERNAAM}</a></h5>
			</div>
		<!-- END BLOCK : addcomment -->
		</div>
	<!-- END BLOCK : row -->
</div>
<!-- END BLOCK : default -->

<!-- START BLOCK : deleteComm -->
<div class="basic">
	<form method="post" action="../WallAdmin/Admin.php?actie=deleteComm&id={COMM_ID}">
		<label>&nbsp;</label>
		<input type="submit" value="Ja" name="post"/>
	</form>
	<a href="../WallAdmin/Admin.php"><button type="button">Nee</button></a>
<!-- END BLOCK : deleteComm -->

<!-- START BLOCK : delete -->
<div class="basic">
	<form method="post" action="../WallAdmin/Admin.php?actie=delete&id={POST_ID}">
		<label>&nbsp;</label>
		<input type="submit" value="Ja" name="post"/>
	</form>
	<a href="../WallAdmin/Admin.php"><button type="button">Nee</button></a>
<!-- END BLOCK : delete -->

<!-- START BLOCK : deleteAcc -->
<div class="basic">
	<form method="post" action="../WallAdmin/Admin.php?actie=deleteAcc&id={ID}">
		<label>&nbsp;</label>
		<input type="submit" value="Ja" name="post"/>
	</form>
	<a href="../WallAdmin/Admin.php"><button type="button">Nee</button></a>
<!-- END BLOCK : deleteAcc -->

<!-- START BLOCK : mute -->
<div class="basic">
	<form method="post" action="../WallAdmin/Admin.php?actie=muteAcc&id={ID}">
		<label>&nbsp;</label>
		<input type="submit" value="Ja" name="post"/>
	</form>
	<a href="../WallAdmin/Admin.php"><button type="button">Nee</button></a>
<!-- END BLOCK : mute -->

<!-- START BLOCK : demute -->
<div class="basic">
	<form method="post" action="../WallAdmin/Admin.php?actie=demuteAcc&id={ID}">
		<label>&nbsp;</label>
		<input type="submit" value="Ja" name="post"/>
	</form>
	<a href="../WallAdmin/Admin.php"><button type="button">Nee</button></a>
<!-- END BLOCK : demute -->

<!-- START BLOCK : debanacc -->
<div class="basic">
	<form method="post" action="../WallAdmin/Admin.php?actie=debanAcc&id={ID}">
		<label>&nbsp;</label>
		<input type="submit" value="Ja" name="post"/>
	</form>
	<a href="../WallAdmin/Admin.php"><button type="button">Nee</button></a>
<!-- END BLOCK : debanacc -->

<!-- START BLOCK : AccOverzicht -->
<div class="basic">
<table>
	<tr>
		<th>Voornaam</th>
		<th>Achternaam</th>
		<th>E-mail</th>
		<th>Status</th>
		<th>Mute</th>
		<th>Ban</th>
	</tr>
	<!-- START BLOCK : row2 -->
		<tr>
			<td>{VOORNAAM}</td>
			<td>{ACHTERNAAM}</td>
			<td>{EMAIL}</td>
			<td>{STATUS}</td>
			<td>
				<!-- START BLOCK : mutebutton -->
						<a href="../WallAdmin/Admin.php?actie=muteAcc&id={ID}"><button>Mute</button></a>
				<!-- END BLOCK : mutebutton -->
				<!-- START BLOCK : demutebutton -->
						<a href="../WallAdmin/Admin.php?actie=demuteAcc&id={ID}"><button>UnMute</button></a>
				<!-- END BLOCK : demutebutton -->
			</td>
			<td>
				<!-- START BLOCK : banbutton -->
						<a href="../WallAdmin/Admin.php?actie=deleteAcc&id={ID}"><button>Ban</button></a>
				<!-- END BLOCK : banbutton -->
				<!-- START BLOCK : debanbutton -->
						<a href="../WallAdmin/Admin.php?actie=debanAcc&id={ID}"><button>UnBan</button></a>
				<!-- END BLOCK : debanbutton -->
			</td>
		</tr>
	<!-- END BLOCK : row2 -->
</table>
</div>
<!-- END BLOCK : AccOverzicht -->
</body>
</html>