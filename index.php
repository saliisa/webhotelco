<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Web Hotel Co</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9eef98da8c.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
    <?php include('header.php'); ?>
    <?php require_once('connection.php'); ?>

    <div class="category-container">
    <?php
    $sql = "SELECT name, category_id  FROM Categories ORDER BY order_number";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    	 while($row = $result->fetch_assoc()) {
         echo ('<div class="category">
                <a href="support-articles.php?categoryID='.$row["category_id"].'"> <h2>'.$row["name"].'</h2></a>
                </div>');
    	 }
    }
    ?>
    </div>
  <?php include('latest-articles.php'); ?>
  <?php include('footer.php'); ?>
  <?php $conn->close(); ?>
    </div>
  </body>
</html>
