<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - coding forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_dbconnect.php';?>
    <?php require 'partials/_header.php';?>

    <!-- slider start here -->
    <div id="carouselExampleDark" class="carousel carousel-light slide" data-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="100">
                <img src="https://www.boardinfinity.com/blog/content/images/2023/01/Mern.png" style="height:500px"
                    class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item" data-bs-interval="200">
                <img src="https://sphero.com/cdn/shop/articles/coding_languages_1024x.png?v=1619126283"
                    style="height:500px" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item" data-bs-interval="200">
                <img src="https://akm-img-a-in.tosshub.com/indiatoday/images/story/202012/chris-ried-ieic5Tq8YMk-unsplas_1200x768.jpeg?size=1200:675"
                    style="height:500px" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    <hr>
    </div>


    <!-- categories container start here -->
    <div class="container my-3">
        <h1 class="text-center">iDiscuss Categories!</h1>
        <div class="row">

            <!-- Fatch all categories -->
            <!-- use for loop to itrate over the category or can say that to show the categories on home page -->
            <?php

        $sql = "SELECT * FROM `categories`";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
          $id = $row['category_id'];
          $cat = $row['category_name'];
          $desc = $row['category_description'];
          echo '<div class="col-md-4">
              <div class="card my-4" style="width: 18rem;">
                  <img src="img/card-'.$id.'.jpg" class="card-img-top" height="255px" width="300px" alt="image of '.$cat.'">
                  <hr>
                  <div class="card-body">
                      <h5 class="card-title"><a href="threadlist.php?catid=' .$id. '">' .$cat. '</a></h5>
                      <p class="card-text">' .substr($desc, 0, 90). '...</p>
                      <a href="threadlist.php?catid=' .$id. '" class="btn btn-primary">view Thread</a>
                  </div>
              </div>
          </div>';      
        }
        ?>
        </div>
    </div>

    <?php require 'partials/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>