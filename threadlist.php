<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - coding forums</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_dbconnect.php';?>
    <?php require 'partials/_header.php';?>

    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id=$id";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
        }
        ?>

<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=="POST"){
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<","&lt", $th_title);
        $th_title = str_replace(">","&lt", $th_title);

        $th_desc = str_replace("<","&lt", $th_desc);
        $th_desc = str_replace(">","&lt", $th_desc);

        $sno = $_POST['sno'];
        
        // inserting the thread into the data base
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;

        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> your thread has been added! please wait for community respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>

<!-- Thread information is heandle here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forum</h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is peer to peer forum for shearing knowledge with each other</p>
            <ul>
                <li>This is a Civilized Place for Public Discussion. Please treat this discussion forum with the same
                    respect you would a public park. ...</li>
                <li>Improve the Discussion. ...</li>
                <li>Be Agreeable, Even When You Disagree. ...</li>
                <li>Always Be Civil. ...</li>
                <li>Keep It Tidy.</li>
            </ul>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>



<!-- for starting the new discussion -->
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION==true){
        echo'<div class="container">
        <h1>Start a discussion</h1>
        <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">keep your title as short and crip as possible.</div>
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>
            <div class="form-floating">
                <div><label for="floatingTextarea2"> Ellaborate your concern</label></div>
                <textarea class="form-control py-3" placeholder="Leave a comment here" id="desc" name="desc"
                    style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-success my-3">Submit</button>
        </form>

    </div>';
    }

    else{
        echo'
        <div class="container">
                <h1>Start a discussion</h1>
                <p class="lead">you are not logged in ! please login to start Discussion</p>
                </div>
            <div class="container">';
    }
    ?>
   

<!-- Question and Answer's section handle here -->
    <div class="container my-4">
        <h1>Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time =$row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);


        echo  '<div class="media my-4">
           <img class="align-self-start mr-3" src="img/defult_user.jpg" width="50px" alt="Generic placeholder image">
           <div class="media-body">'.
           '<h5 class="mt-0"><a class = "text-blue" href="thread.php?threadid=' .$id. '">' .$title. '</a></h5>
           <p>' .$desc. '</p>
           </div>'.'<p class="font-weight-bold my-0"> Asked by: ' . $row2['user_email'] .'  at ' .$thread_time. '</p>' .'
           </div>';
        }
         
        if($noResult){
            // echo var_dump($noResult);
           echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="display-5">No Threads found</p1>
                <p class="lead"> Be the first person to ask Question</p>
            </div>
            </div>';
        }
    ?>


        <!-- Remove later; putting this just to check the html alignment -->

        <!-- <div class="media my-4">
            <img class="align-self-start mr-3" src="img/defult_user.jpg" width="50px" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">How to use python tkinter module </h5>
                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            </div>
        </div> -->


        <?php require 'partials/_footer.php';?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>