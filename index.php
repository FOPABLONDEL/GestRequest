<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>Signin </title>
    </head>
    <body class="bg-image row h-auto justify-content-center align-items-center text-center"style="background-image: url('images/BSs.jpg');">
        <main class="bg-image form-signin w-50 m-auto mt-5 rounded border" style="background-image: url('images/email.png');">
            <form action="controler/authController.php" method="post">
                <img class="mb-4 mt-3 rounded-circle" src="images/logo.PNG" alt="" width="150" height="150">
                <h1 class="h3 mb-3 fw-normal">connexion</h1>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control htmlspecialchars" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control htmlspecialchars" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-50 btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; SendRequest-2022 <br> tous droits reserver</p>
            </form>
        </main>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>
