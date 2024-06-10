<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>iDiscuss - coding forums</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #maincontainer{
            min-height : 90vh;
        }
    </style>
</head>

<body>

  <?php require 'partials/_dbconnect.php';?>
  <?php require 'partials/_header.php';?>

  <!-- search reasult -->


  <div class="container my-3" id="maincontainer">
    <h1 class="text-center"> search reasults for <?php echo $_GET['search'];?></h1>
    <div class="result my-4">
    <?php
    $noResult = true;
        $search = $_GET['search'];
        $sql = "SELECT * FROM `threads`WHERE MATCH(`thread_title`, `thread_desc`) against ('$search');";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
          $id = $row['thread_id'];
          $title = $row['thread_title'];
          $desc = $row['thread_desc'];
          $url = "thread.php?threadid=".$id;
          $noResult = false;

          echo'<h3 class="text-center"><a href="'.$url.'" class="text-dark ">'.$title.'</a></h3>
                <p> '.$desc.'</p>';
        } 

        if($noResult){
         echo '<div class="jumbotron jumbotron-fluid">
          <div class="container">
              <p class="display-5">No results found</p1>
              <p class="lead"> Your search - '.$search.'did not match any documents.

              Suggestions:
              <ul>
              <li>Make sure that all words are spelled correctly.</li>
              <li>Try different keywords.</li>
              <li>Try more general keywords.</li>
              <li>Try fewer keywords.</li>
              </ul>
              </p>
          </div>
          </div>';
      }
  ?>
        
    </div>
  </div>
  
  <?php require 'partials/_footer.php';?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>