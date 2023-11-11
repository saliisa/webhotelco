<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Support Articles</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9eef98da8c.js" crossorigin="anonymous"></script>
  <body>
    <div class="container">
      <?php include('header.php'); ?>
      <?php require_once('connection.php') ; ?>

      <div class="support-container">
      <?php
      $categoryID = $_GET["categoryID"];
      $sql ="SELECT  * FROM categories LEFT JOIN articles ON categories.category_id = articles.category_id
       WHERE categories.category_id = $categoryID ORDER BY articles.publish_date DESC";
      $result = $conn->query($sql);

      if ($result->num_rows> 0 ) {
         while($row = $result->fetch_assoc()) {

            if (isset( $_GET["categoryID"])){
                $text = strip_tags($row["text"]);

           if($categoryID == $categoryID ){
                if(!isset($title)){
                    $title = '<h2> Support Articles: '.$row["name"].'</h2>';
                    echo $title;
                }

             $info =('<div class="support-category">
                      <h3>'.$row["title"].'</h3>
                      <p>'.$text.'</p>
                      <a href="article.php?articleID='.$row["article_id"].'">Read more</a>
                      </div>');

              if($row["article_id"] == NULL){
                  echo "<p>
                  No articles yet
                  </p>";
              }else{
                  echo $info;
              }
            }
          }
        }
      } else {
      echo "Empty";
      }
?>
      </div>
      <?php include('latest-articles.php'); ?>
      <?php include('footer.php'); ?>
      <?php $conn->close(); ?>
      </div>
  </body>
</html>
