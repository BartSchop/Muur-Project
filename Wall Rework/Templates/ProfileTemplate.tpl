<html>
<head>
	<title>Document</title>
	<link rel="stylesheet" href="../Style/styleProfile.css" style="style/css"> 
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
				<a href="Home.php?actie=register"><button type="button">Registreren</button></a>
			</li>
		</ul>
	</div>
</div>
<div class = "leftmenu">
	<ul class="menu">
		<li><a href="Profile.php?actie=edit">Profiel veranderen</a></li>
		<li><a href="Profile.php">Jouw Posts</a></li>
		<li><a href="../WallPost/Post.php">Hoofd Pagina</a></li>
		<li><a href="Profile.php?actie=show">Profiel Gegevens</a></li>
		<li><a href="../WallHome/Home.php?actie=uitloggen">Uitloggen</a></li>
		<li>Recovery settings</li>
	</ul>
</div>

<!-- START BLOCK : defaultProfile -->
<div class="basic">
<h3>Jouw profiel gegevens</h3>
	<ul class="infoprofiel">
		<li>
			<img src="{LINK}">
		</li>
		<li>
			<p>Voornaam : {VOORNAAM}</p>
		</li>
		<li>
			<p>Achternaam : {ACHTERNAAM}</p>
		</li>
		<li>
			<p>Geboortedatum : {GEBOORTEDATUM}</p>
		</li>
		<li>
			<p>Adres : {ADRES}</p>
		</li>
		<li>
			<p>Postcode : {POSTCODE}</p>
		</li>
		<li>
			<p>Woonplaats : {WOONPLAATS}</p>
		</li>
		<li>
			<p>Mobiele nummer : {MOBIEL}</p>
		</li>
		<li>
			<p>Telefoon nummer : {TELEFOON}</p>
		</li>
	</ul>
</div>
<!-- END BLOCK : defaultProfile -->

<!-- START BLOCK : show -->
<div class="basic">
<h3>Jouw posts</h3>
		<!-- START BLOCK : row -->
				<div class="basic1">
				<img src="{LINK}">
				<h3>{CONTENT}</h3>
				<h4>Gepost op {DATUM} door <a href="../WallProfile/Profile.php?actie=showother&id={USER_ID}">{NAAM} {ACHTERNAAM}</a></h4>
				<form method="post" action="../WallPost/Post.php?actie=addcomment&id={POST_ID}">
					<p>
						*<textarea rows="1" cols="20" name="content" placeholder="Comment..."></textarea>
					</p>
					<p>
						<label>&nbsp;</label>
						<input type="submit" value="Reactie plaatsen" name="post" style="width:160px"/>
					</p>
				</form>
				<a href="../WallPost/Post.php?actie=edit&id={POST_ID}"><button>Aanpassen</button></a>
				<a href="../WallPost/Post.php?actie=delete&id={POST_ID}"><button>Verwijderen</button></a>
			<!-- START BLOCK : addcomment -->
			<div class="basic1">
				<img src="{LINK}">
				<p>{COMMENT}</p>
				<h5>Gepost op {DATUM} door <a href="../WallProfile/Profile.php?actie=showother&id={USER_ID}">{NAAM} {ACHTERNAAM}</a></h5>
			</div>
			<!-- END BLOCK : addcomment -->
		</div>
		<!-- END BLOCK : row -->
</div>
<!-- END BLOCK : show -->

<!-- START BLOCK : edit -->
<div class="basic">
	<h3>Gegevens aanpassen</h3>
		<form method="post" action="Profile.php?actie=edit">
			<p>
				<img src="{LINK}">
			</p>
			<p>
				<label>Voornaam</label>
				<input value="{VOORNAAM}" type="text" name="voornaam">
			</p>
			<p>
				<label>Achternaam</label>
				<input value="{ACHTERNAAM}" type="text" name="achternaam">
			</p>
			<p>
				<label>Adres</label>
				<input value="{ADRES}" type="text" name="adres"/>
			</p>
			<p>
				<label>Postcode</label>
				<input value="{POSTCODE}" type="text" name="postcode"/>
			</p>
			<p>
				<label>Woonplaats</label>
				<input value="{WOONPLAATS}" type="text" name="woonplaats"/>
			</p>
			<p>
				<label>Telefoon</label>
				<input value="{TELEFOON}" type="text" name="telefoon"/>
			</p>
			<p>
				<label>Mobiel</label>
				<input value="{MOBIEL}" type="text" name="mobiel"/>
			</p>
			<p>
				<label>&nbsp;</label>
				<input type="submit" value="opslaan" name="edit" style="width:172px"/>
			</p>
		</form>
</div>
<!-- END BLOCK : edit -->

<!-- START BLOCK : aanmelden -->
<div>
<h3>Aanmelden</h3>
	<form method="post" action="Profile.php?actie=deactiveren">
		<p>
			<label>E-mail adres</label>
			<input type="text" name="email" />
		</p>
		<p>
			<label>Wachtwoord</label>
			<input type="password" name="paswoord" />
		</p>
		<p>
			<label>&nbsp;</label>
			<input type="submit" value="inloggen" name="inloggen" style="width:172px"/>
		</p>
	</form>
</div>
<!-- END BLOCK : aanmelden -->
</body>
</html>