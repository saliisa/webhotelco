<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Articles</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9eef98da8c.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
    <?php include('header.php'); ?>
    <?php require_once('connection.php') ; ?>

    <div class="article-info">
      <?php
      $id = $_GET["articleID"];
      $sql = "SELECT * FROM articles INNER JOIN users ON articles.author = users.user_name WHERE article_id = $id";
      $result = $conn->query($sql);

        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {

              if (isset($_GET["articleID"])) {
                  $text = strip_tags($row["text"]);

                  if($id == $id){
                      echo '<h2>'.$row["title"].'</h2>';
                      echo '<p>Created '.$row["publish_date"].' || By '.$row["first_name"].' '.$row["last_name"].' ('.$row["role"].')</p>';
                      echo '<p>'.$text.'</p>';
                  }
              }
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
