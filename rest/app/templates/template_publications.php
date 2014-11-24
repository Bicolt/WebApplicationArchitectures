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
      <h1>Publications</h1>
    </div>
    <div>
      <h2>Publications</h2>
      <p><?php echo $publications; ?></p>
      <p><a class="btn btn-primary" href="index.php?page=publications&action=HomePageClick">Home Page &raquo</a></p>
    </div>
  </div>
</body>
</html>
