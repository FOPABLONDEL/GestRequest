<?php session_start();
if (empty($_SESSION['id'])):
    header('Location:../index.php');
endif;
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>envoie d'une requete </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body class="bg-image h-auto justify-content-center align-items-center text-center"style="background-image: url('../images/BSs.jpg');">
        <?php
            include('../Connect.php');
            $idUser = $_SESSION['id'];
            $query = mysqli_query($con, "select * from type_requete") or die(mysqli_error($con));
        ?>
        <?php
            include ("Header.php");
        ?>
        <div class="header text-center">
            <h2>Nouvelle Requette</h2>
        </div>
        <main class="bg-image form-signin w-50 my-4 m-auto rounded border border-success bg-info" style="background-image: url('../images/email.png');">
            <form class="mt-4" method="post" action="../controler/sendRequestController.php">
                <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="idUser" id="user">
                <div class="form-floating mb-2 mx-3">
                    <select class="form-select htmlspecialchars" id="floatingSelect" aria-label="Floating label select example" name="requesttype" required>
                    <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($query)) {
                            $cid = $row['id_requete'];
                    ?>
                        <option value="1"><?php echo $row['Libellé'] ?></option>
                    <?php $i++;} ?>
                    </select>
                    <label for="floatingSelect">Type of request</label>
                </div>
                <div class="form-floating mb-3 mx-3">
                    <input type="email" class="form-control htmlspecialchars" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-4 mx-3">
                    <input type="text" class="form-control htmlspecialchars" name="requesttext" id="floatingTextarea2" placeholder="Leave a comment here" required style="height: 100px" >
                    <label for="floatingTextarea2">My request</label>
                </div>

                <button class="w-50 btn btn-lg btn-primary" type="submit">Envoyer</button>
                <a class="btn btn-info" href="Etudiants.php">Voir les requêtes</a>
                <p class="mt-5 mb-3 text-muted">&copy;SendRequest-2022 <br> tous droits reserver</p>
            </form>
        </main>
        <?php
    include ("footer.php");
    ?>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>
