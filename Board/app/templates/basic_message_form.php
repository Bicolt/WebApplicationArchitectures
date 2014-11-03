<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="template MVC">
		<meta name="author" content="Nicolas Benning">
		<link href="css/bootstrap/css/bootstrap.css" rel="stylesheet">
		<title>Nicolas' Portfolio</title>
	</head>
	
	<body>
			<div class='container' style='padding-top: 30px'>
				<div class='hero-unit'>
					<h1>My Portfolio</h1>
					<h5><?php echo $motto ?></h5>
				</div>
				<div class="row">
					<div class="span6">
						<h3>Personnal Introduction</h3>
						<p><?php echo $personnalIntro_box ?></p>
						<p><a class='btn' href='index.php?action=PersonnalIntroClick'>View more &raquo</a></p>
					</div>
					<div class="span6">
						<h3>Publications</h3>
						<p><?php echo $publications_box ?></p>
						<p><a class='btn' href='index.php?action=PublicationsClick'>View more &raquo</a></p>
					</div>
				</div>
						
						
			</div>

	</body>
</html>