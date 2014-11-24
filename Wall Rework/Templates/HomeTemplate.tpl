<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../Style/styleHome.css">
</head>
<body>
<!-- START BLOCK : register -->
<div class="basic">
	<form method="post" action="Home.php?actie=register">
		<p>
			<h3>Registratie Gegevens</h3>
		</p>
		<p>
			<label>*Voornaam</label>
			<input type="text" name="voornaam"/>
		</p>
		<p>
			<label>*Achternaam</label>
			<input type="text" name="achternaam"/>
		</p>
			<p>
			<label>*E-mail adres</label>
			<input type="text" name="email"/>
		</p>
		<p>
			<label>*Wachtwoord</label>
			<input type="password" name="paswoord"/>
		</p>
		<p>
			<label>*Wachtwoord Bevestigen</label>
			<input type="password" name="confirmPaswoord" />
		</p>
		<p>
			<label>&nbsp;</label>
			<input type="submit" value="Registreren" name="register" style="width:172px"/>
		</p>
	</form>
</div>
<!-- END BLOCK : register -->

<!-- START BLOCK : aanmelden -->
<div class="basic">
<h3>Aanmelden</h3>
	<form method="post" action="Home.php?actie=inloggen">
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

<ul>
	<li>
		<a href="Home.php?actie=recovery" style="margin-left:440px">Wachtwoord vergeten</a>
	</li>
	<li>
		<a href="Home.php" style="margin-left:10px">Terug</a>
	</li>
</ul>
<!-- END BLOCK : aanmelden -->

<!-- START BLOCK : registerinfo -->
<div class="basic">
	<h3>Extra registratie informatie</h3>
		<form method="post" action="Home.php?actie=registerinfo">
			<p>
				<label>*Geboortedatum</label>
					<select name="dag">
						<option value="0" selected="1">Dag</option>
					<!-- START BLOCK : day -->
						<option value="{DAY}">{DAY}</option>
					<!-- END BLOCK : day -->
					</select>
					<select name="maand">
						<option value="0" selected="1">Maand</option>
					<!-- START BLOCK : maand -->
						<option value="{MAAND}">{MAAND2}</option>
					<!-- END BLOCK : maand -->
					</select>
					<select name="jaar">
						<option value="0" selected="1">Jaar</option>
					<!-- START BLOCK : jaar -->
						<option value="{JAAR}">{JAAR}</option>
					<!-- END BLOCK : jaar -->
					</select>
			</p>
			<p>
				<label>*Geslacht</label>
				<select name="geslacht">
					<option value="man">Man</option>
					<option value="vrouw">Vrouw</option>
				</select>
			</p>
			<p>
				<label>Adres</label>
				<input type="text" name="adres"/>
			</p>
			<p>
				<label>Postcode</label>
				<input type="text" name="postcode"/>
			</p>
			<p>
				<label>Woonplaats</label>
				<input type="text" name="woonplaats"/>
			</p>
			<p>
				<label>Telefoon</label>
				<input type="text" name="telefoon"/>
			</p>
			<p>
				<label>Mobiel</label>
				<input type="text" name="mobiel"/>
			</p>
			<p>
				<label>&nbsp;</label>
				<input type="submit" value="opslaan" name="registerinfo" style="width:172px"/>
			</p>
		</form>
</div>
<!-- END BLOCK : registerinfo -->

<!-- START BLOCK : recovery -->
<div class="basic1">
	<form mehtod="post" action="../WallHome/Home.php">
		<p>
			<label>Wat was de naam van je eerste husidier :</label>
			<input type="text" name="recovery1"/>
		</p>
		<p>
			<label>Wat was de naam van je beste vriend:</label>
			<input type="text" name="recovery2"/>
		</p>
		<p>
			<label>Wat was je eerste vakantie land :</label>
			<input type="text" name="recovery3"/>
		</p>
		<p>
			<label>Wat is de naam van ja favoriete band :</label>
			<input type="text" name="recovery4"/>
		</p>
		<p>
			<label>Wat is je favoriete gerecht :</label>
			<input type="text" name="recovery5"/>
		</p>
		<p>
			<label>&nbsp;</label>
			<input type="submit" value="Deze functie is nog niet in gebruik" name="post" style="width:370px"/>
		</p>
	</form>
</div>
<!-- END BLOCK : recovery -->
<!-- START BLOCK : default -->
<div class="default">
	<div class="logo">
		<img src="../Style/logo.png">
	</div>
	<div class="button">
		<ul>
			<li>
				<h3>Welkom op de Muur</h3>
			</li>
			<li>
				<a href="Home.php?actie=inloggen"><button type="button">Aanmelden</button></a>
			</li>
			<li>
				<a href="Home.php?actie=register"><button type="button">Registreren</button></a>
			</li>
		</ul>
	</div>
</div>
<div class="info">
	<h2>Welkom op De Muur</h2>
	<p>Op de muur kan je berichten plaatsen en lezen. Daarnaast kan je op ieder bericht een reactie geven en likes of dislikes. Meld je aan log in en plaats je eerste bericht. Meld je aan of klik <a href="Home.php?actie=register">hier</a> om te beginnen. Deze website is gemaakt door ©Bart Schop.</p>
	<p>Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout van een pagina, afgeleid wordt door de tekstuele inhoud. Het belangrijke punt van het gebruik van Lorem Ipsum is dat het uit een min of meer normale verdeling van letters bestaat, in tegenstelling tot "Hier uw tekst, hier uw tekst" wat het tot min of meer leesbaar nederlands maakt. Veel desktop publishing pakketten en web pagina editors gebruiken tegenwoordig Lorem Ipsum als hun standaard model tekst, en een zoekopdracht naar "lorem ipsum" ontsluit veel websites die nog in aanbouw zijn. Verscheidene versies hebben zich ontwikkeld in de loop van de jaren, soms per ongeluk soms expres (ingevoegde humor en dergelijke).</p>
</div>
<!-- END BLOCK : default -->
</body>
</html>