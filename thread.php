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
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
           $title = $row['thread_title'];
           $desc = $row['thread_desc'];
           $thread_user_id = $row['thread_user_id'];
           $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
           $result2 = mysqli_query($conn, $sql2);
           $row2 = mysqli_fetch_assoc($result2);
           $posted_by = $row2['user_email'];
        }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=="POST"){

        $comment = $_POST['comment'];
        $comment = str_replace("<","&lt", $comment);
        $comment = str_replace(">","&gt", $comment);
        $sno = $_POST['sno'];
        // inserting into comment  data base
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;

        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> your comment has been added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>


    <!-- Thread title and description is heandle here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $title; ?> </h1>
            <p class="lead"><?php echo $desc; ?></p>
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
                 Posted by : <b><?php echo $posted_by; ?> </b>
            </p>
        </div>
    </div>


    <!--  comment on the particular thread is heandle here  -->
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION==true){
        echo'
            <div class="container">
                <h1>Post a Comment</h1>
                <form action=" '.$_SERVER["REQUEST_URI"].' " method="post">

                    <div class="form-floating">
                        <div><label for="floatingTextarea2"> Type your comment</label></div>
                        <textarea class="form-control py-3" placeholder="Leave a comment here" id="comment" name="comment"
                            style="height: 100px"></textarea>
                        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                        
                    </div>
                    <div><button type="submit" class="btn btn-success my-3">Post comment</button></div>
                </form>

            </div>';
    }

    else{
        echo'
            <div class="container">
                    <h1>Start a discussion</h1>
                    <p class="lead">you are not logged in ! please login to post comment</p>
                    </div>
            <div class="container">';
    }
    ?>


    <!-- Discussion section heandle hare yet to be edited -->
    <div class="container my-4">
        <h1>Discussion</h1>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['comment_id'];
            $comment = $row['comment_content'];
            $comment_time = $row['comment_time'];
            $thread_user_id = $row['comment_by'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);


        echo  '<div class="media my-4">
           <img class="align-self-start mr-3" src="img/defult_user.jpg" width="50px" alt="Generic placeholder image">
           <div class="media-body">
           <p class="font-weight-bold my-0"> ' . $row2['user_email'] . ' at ' .$comment_time. '</p>
           <p>' .$comment. '</p>
           </div>
           </div>';
        }

        if($noResult){
            // echo var_dump($noResult);
           echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="display-5">No Comments found</p1>
                <p class="lead"> Be the first person to comment </p>
            </div>
            </div>';
        }
                
    ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <?php require 'partials/_footer.php';?>
</body>

</html>