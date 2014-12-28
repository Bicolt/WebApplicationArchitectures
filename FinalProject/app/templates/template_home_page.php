<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="mvc template">
  <title>this is a mvc content</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
  <style type="text/css">
  body{
    padding-top: 30px !important;
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="hero-unit">
      <h1>Portfolio</h1>
      <h5><?php echo $motto; ?></h5>
    </div>
    <div class="row">
      <div class="span6">
        <h2>Personal Intro</h2>
        <p><?php echo $personal_intro; ?></p>
        <p><a class="btn btn-primary" href="index.php?action=PersonalIntroClick">Personal Intro &raquo</a></p>
      </div>
      <div class="span6">
        <h2>Publications</h2>
        <p><?php echo $publications; ?></p>
        <p><a class="btn btn-primary" href="index.php?action=PublicationsClick">Publications &raquo</a></p>
      </div>
    </div>
  </div>
</body>
</html>
