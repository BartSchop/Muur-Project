<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../Style/stylePost.css" style="style/css">
 <script type="text/javascript">
	 function disable()
	 {
	  setTimeout("document.getElementById('addpost').disabled=true;",0);
	  setTimeout("document.getElementById('addcomment').disabled=true;",0);
	 }
 </script>
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
				<a href="../WallHome/Home.php?actie=inloggen"><button type="button">Ander account</button></a>
			</li>
		</ul>
	</div>
</div>
<div class="leftmenu">
	<ul class="menu">
		<li><a href="../WallHome/Home.php?actie=uitloggen">Uitloggen</a></li>
		<li><a href="../WallProfile/Profile.php">Jouw profiel</a></li>
		<!-- START BLOCK : adminmenu -->
			<li><a href="../WallAdmin/Admin.php">Post overzicht</a></li>
			<li><a href="../WallAdmin/Admin.php?actie=AccOverzicht">Account overzicht</a></li>
		<!-- END BLOCK : adminmenu -->
		<li><a href="../WallPost/Post.php">Hoofd Pagina</a></li>
	</ul>
</div>

<!-- START BLOCK : default -->
<div class="basic">
	<form method="post" action="Post.php?actie=post">
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
			<img src="{LINK}">		
			<h3>{CONTENT}</h3>
			<h4>{DATUM}<a href="../WallProfile/Profile.php?actie=showother&id={USER_ID}">{NAAM} {ACHTERNAAM}</a></h4>
			<!-- START BLOCK : commentshow -->
				<form method="post" action="Post.php?actie=addcomment&id={POST_ID}">
					<p>
						*<textarea rows="1" cols="20" name="content" placeholder="Comment..."></textarea>
					</p>
					<p>
						<label>&nbsp;</label>
						<input onclick="disable();" id="addcomment" type="submit" value="Reactie plaatsen" name="post" style="width:160px"/>
					</p>
				</form>
			<!-- END BLOCK : commentshow -->
		<!-- START BLOCK : addcomment -->
			<div class="basic1">
				<p>{COMMENT}</p>
				<img src="{LINK}">
				<!-- START BLOCK : editcomment -->
				<p>{COMMENT}</p>
				<img src="{LINK}">
				<a href="../WallPost/Post.php?actie=editComm&id={POST_ID}&gebid={ID}">Aanpassen</button></a>
				<a href="../WallPost/Post.php?actie=deleteComm&id={POST_ID}&gebid={ID}">Verwijderen</button></a>
				<h5>{DATUM}<a href="../WallProfile/Profile.php?actie=showother&id={USER_ID}">{NAAM} {ACHTERNAAM}</a></h5>
				<!-- END BLOCK : editcomment -->
				<h5>{DATUM}<a href="../WallProfile/Profile.php?actie=showother&id={USER_ID}">{NAAM} {ACHTERNAAM}</a></h5>
			</div>
		<!-- END BLOCK : addcomment -->
		</div>
	<!-- END BLOCK : row -->
</div>
<!-- END BLOCK : default -->

<!-- START BLOCK : edit -->
<div class="basic">
<form method="post" action="Post.php?actie=edit&id={POST_ID}">
	<p>
		*<textarea rows="4" cols="50" name="content">{CONTENT}</textarea>
	</p>
	<p>
		<label>&nbsp;</label>
		<input type="submit" value="edit" name="edit" style="width:370px"/>
	</p>
</form>
</div>
<!-- END BLOCK : edit -->

<!-- START BLOCK : editComm -->
<div class="basic">
<form method="post" action="Post.php?actie=editComm&id={POST_ID}&gebid={ID}">
	<p>
		*<textarea rows="4" cols="50" name="content">{CONTENT}</textarea>
	</p>
	<p>
		<label>&nbsp;</label>
		<input type="submit" value="blub" name="edit" style="width:370px"/>
	</p>
</form>
</div>
<!-- END BLOCK : editComm -->

<!-- START BLOCK : delete -->
<div class="basic">
	<form method="post" action="Post.php?actie=delete&id={POST_ID}">
		<label>&nbsp;</label>
		<input type="submit" value="Ja" name="post"/>
	</form>
	<a href="../WallProfile/Profile.php"><button type="button">Nee</button></a>
<!-- END BLOCK : delete -->

<!-- START BLOCK : deleteComm -->
<div class="basic">
	<form method="post" action="Post.php?actie=deleteComm&id={COMM_ID}">
		<label>&nbsp;</label>
		<input type="submit" value="Ja" name="post"/>
	</form>
	<a href="../WallProfile/Profile.php"><button type="button">Nee</button></a>
<!-- END BLOCK : deleteComm -->

</body>
</html>