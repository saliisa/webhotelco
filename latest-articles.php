<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  </head>
  <body>
    <?php require_once('connection.php') ; ?>

    <div class="right-column">
      <h3>Latest articles</h3>
      <?php
      $sql = "SELECT title, article_id FROM articles ORDER BY publish_date DESC LIMIT 10";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             echo ' <a href="article.php?articleID='.$row["article_id"].'"><i class="fa-solid fa-file-lines"></i> '.$row["title"].'</a> <br><br>';
         }
      }
       ?>
    </div>
  </body>
</html>
