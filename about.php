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
    <script src="https://kit.fontawesome.com/680b4062c6.js" crossorigin="anonymous"></script>

    <style>
    .container {
        min-height: 80vh;
    }
    </style>
</head>

<body>
    <?php require 'partials/_dbconnect.php';?>
    <?php require 'partials/_header.php';?>
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-2 text-center text-decoration-underline"> <b>iDiscuss forum</b></h1>
            <h3 class="font-weight my-0 text-center">A place to shere Knowledge and better understand the coding</h3>
            <hr class="my-4">

            <div class="media my-4">
                <img class="align-self-start mr-3" src="img/about.png" width="450px" alt="Generic placeholder image">
                <div class="media-body">
                    <h4 class="font-weight-bold text-center text-decoration-underline my-3">Our vision:</h4>
                    <p class="h5">Coding techologies and communities are growing day by day and
                    a lot of beginners struggle with the their queries, issues and bugs being answered and fixed.</p>
                
                    <p class="h5">These communities include everything you might need while working as a programmer.</p>
                
                    <p class="h5">This forums are related to web development, web app, fremworks,  independent development, freelance development.</p>
                </div>

            </div>
                <p>Delve deeply into knowledge with this enlightening piece, fostered within the supportive environment of
                    the <em><b>iDiscuss Community—every coder</b></em>, no matter their experience level, is welcome to contribute to our
                    collective wisdom.</p>

                <p>A simple <em><b>"thank you"</b></em> can make a big difference—express your gratitude in the comments!</p>

                <p>Sharing information enhances our journey on <em><b> iDiscuss</b> </em> and fortifies our community connection. Did you find
                this useful? A moment to thank the author can make a significant impact.</p>
            <ul>
                <li>This is a Civilized Place for Public Discussion. Please treat this discussion forum with the same
                    respect you would a public park. ...</li>
                <li>Improve the Discussion. ...</li>
                <li>Be Agreeable, Even When You Disagree. ...</li>
                <li>Always Be Civil. ...</li>
                <li>Keep It Tidy.</li>
            </ul>
            <p class="lead">
                <!-- <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a> -->
            </p>
        </div>
    </div>
    <?php require 'partials/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>