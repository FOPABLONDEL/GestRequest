
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>envoie d'une requette </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body class=" row h-auto justify-content-center align-items-center text-center">
        <?php
            include ("Header.php");
        ?>

            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name *" value=""/>
                        </div>
                        <div class="form-group"><br>
                            <input type="text" class="form-control htmlspecialchars" placeholder="Phone Number *" value=""/>
                        </div>
                    </div><br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control htmlspecialchars" placeholder="Your Password *" value=""/>
                        </div><br>
                        <div class="form-group">
                            <input type="text" class="form-control htmlspecialchars" placeholder="Confirm Password *" value=""/>
                        </div>
                    </div><br>
                    <div class="col-md-6"><br>
                        <div class="form-group">
                            <input type="text" class="form-control htmlspecialchars" placeholder="Adresse Email *" value=""/>
                        </div><br>
                        <div class="form-group">
                            <input type="text" class="form-control htmlspecialchars" placeholder="Phone Level *" value=""/>
                        </div>
                    </div><br>
                    <div class="col-md-6">
                        <div class="form-group"><br>
                            <input type="text" class="form-control htmlspecialchars" placeholder="Your Speciality *" value=""/>
                        </div><br>
                        <div class="form-group">
                            <input type="text" class="form-control htmlspecialchars" placeholder="your Faculty*" value=""/>
                        </div>
                    </div>

                </div><br>
                <button type="button" class="btnSubmit">Enregistrer</button>

                <button type="reset" class="btnReset">Annuler</button>
            </div>
        </div>
        <?php
    include ("footer.php");
    ?>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>
