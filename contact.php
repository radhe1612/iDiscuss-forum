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
        <h1 class="text-center">Contact Us</h1>
        <form action="#">
            <div class="mb-3">
                <i class="fa-solid fa-envelope" for="email"></i>
                <label for="exampleFormControlInput1" class="form-label"><b>Email address:</b></label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <i class="fa-solid fa-user"></i>
                <label for="exampleFormControlInput1" class="form-label"><b>Enter your username:</b></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Discribe your concern:</b></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr>

        <div class="container my-4">
            <div class="jumbotron text-center mx-3 ">
                <h3 class="text-center">Join us on..</h3>
                <span class="inline">
                    <i class="fa-brands fa-linkedin"></i>
                </span>

                <span class="mx-2">
                    <i class="fa-brands fa-github"></i>
                </span>

                <span class="inline">
                    <i class="fa-brands fa-twitter"></i>
                </span>

                <span class="mx-2">
                    <i class="fa-brands fa-square-instagram"></i>
                </span>

                <span class="inline">
                    <i class="fa-brands fa-whatsapp"></i>
                </span>

            </div>
        </div>
        <?php require 'partials/_footer.php';?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>