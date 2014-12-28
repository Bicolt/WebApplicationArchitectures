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
      <h1>Personal Intro</h1>
    </div>
    <div>
      <h2>Personal Intro</h2>
      <p><?php echo $personal_intro; ?></p>
      <p><a class="btn btn-primary" href="index.php?page=personal_intro&action=HomePageClick">Home Page &raquo</a></p>
    </div>
  </div>
</body>
</html>
