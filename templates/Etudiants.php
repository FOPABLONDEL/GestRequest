<?php
session_start();
$idUser = $_SESSION['id'];

if (empty($idUser)) {
    header('Location:index.php');
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>ETUDIANT</title>
</head>

<body class="bg-image h-auto justify-content-center align-items-center text-center"style="background-image: url('../images/bg4.jpg');">
    <?php
    include("Header.php");
    ?>

    <div class="header text-white text-center">
        <h2>ETUDIANTS</h2>
    </div>

    <a href="SendRequest.php" class="my-4 py-2 btn btn-success">NOUVELLE REQUETTE</a>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
                    role="tab" aria-controls="nav-home" aria-selected="false">
                BOITE DE RECEPTION
                <span class="position-absolute top-1 start-98 translate-middle badge rounded-pill bg-dark">
                    10
                    <span class="visually-hidden">messages non lu</span>
                </span>
            </button>

            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">BOITE D'ENVOIE
            </button>

        </div>
    </nav>
<!--contenu des menus-->
<div class="tab-content" id="nav-tabContent">

    <!--premier menu-->
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="accordion-item border-3">
            <div class="accordion-body bg-light col-auto">
                <table class="table table-hover w-100%">
                    <thead>
                        <!--en tete ligne-->
                        <tr>
                            <th></th>
                            <th>MESSAGES</th>
                            <th>E-MAIL</th>
                            <th>ACTION</th>
                        </tr>
                        <!--fin en tete ligne-->
                    </thead>
                    <tbody>
                        <?php
                        include('../Connect.php');
                        $idUser = $_SESSION['id'];
                        $query = mysqli_query($con, "select * from requete where id_etudiant='$idUser' and status='$idUser'") or die(mysqli_error($con));
                        $i = 1;
                        while ($row = mysqli_fetch_array($query)) {
                            $cid = $row['id_requete'];
                            ?>

                            <tr class="active">
                                <td class="track_dot">
                                    <span class="track_line"></span>
                                </td>
                                <td><?php echo $row['libelle'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-success">MODIFIER</a>
                                    <a href="#" class="btn btn-danger">SUPPRIMER</a>
                                </td>
                            </tr>
                            <?php $i++;
                        } ?>
                        <!-- fin liste des email traitées-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--fin premier menu-->

    <!--deuxieme menu-->
    <div class="tab-pane fade mt-5 m-lg-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <!--bar des sous menus-->
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-import-tab" data-bs-toggle="tab" data-bs-target="#nav-import"
                        type="button" role="tab" aria-controls="nav-import" aria-selected="true">MESSAGES ENVOYES
                </button>
                <button class="nav-link" id="nav-avarie-tab" data-bs-toggle="tab" data-bs-target="#nav-avarie"
                        type="button" role="tab" aria-controls="nav-avarie" aria-selected="false">
                    BROULLON
                    <span class="position-absolute top-1 start-98 translate-middle badge rounded-pill bg-dark">
                            7
                            <span class="visually-hidden">messages non lu</span>
                        </span>
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <!--debut premier sous menu-->
            <div class="tab-pane fade show active" id="nav-import" role="tabpanel" aria-labelledby="nav-import-tab">

                <div class="accordion-item border-3">
                    <div class="accordion-body bg-light col-auto">
                        <table class="table table-hover w-100%">
                            <thead>
                            <!--en tete ligne-->
                            <tr>
                                <th></th>
                                <th>MESSAGES</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                            <!--fin en tete ligne-->
                            </thead>
                            <tbody>
                            <?php
                            include('../Connect.php');
                            $idUser = $_SESSION['id'];
                            $query = mysqli_query($con, "select * from requete where id_etudiant='$idUser'") or die(mysqli_error($con));
                            $i = 1;
                            while ($row = mysqli_fetch_array($query)) {
                                $cid = $row['id_requete'];
                                ?>

                                <tr class="active">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td><?php echo $row['libelle'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success">MODIFIER</a>
                                        <a href="#" class="btn btn-danger">SUPPRIMER</a>
                                    </td>
                                </tr>
                                <?php $i++;
                            } ?>
                            <!-- fin liste des email traitées-->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!--fin du premier sous menu-->

            <!--debut du dexieme sous menu-->
            <div class="tab-pane fade" id="nav-export" role="tabpanel" aria-labelledby="nav-export-tab">
                <div class="accordion-item border-3">
                    <div class="accordion-body bg-light col-auto">
                        <table class="table table-hover w-100%">
                            <thead>
                            <!--en tete ligne-->
                            <tr>
                                <th></th>
                                <th>MESSAGES</th>
                                <th>E-MAIL</th>
                                <th>ACTION</th>
                            </tr>
                            <!--fin en tete ligne-->
                            </thead>
                            <tbody>
                            <tbody>
                            <?php
                            include('Connect.php');
                            $idUser = $_SESSION['id'];
                            $query = mysqli_query($con, "select * from requete where id_etudiant='$idUser'") or die(mysqli_error($con));
                            $i = 1;
                            while ($row = mysqli_fetch_array($query)) {
                                $cid = $row['id_requete'];
                                ?>

                                <tr class="active">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td><?php echo $row['libelle'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success">MODIFIER</a>
                                        <a href="#" class="btn btn-danger">SUPPRIMER</a>
                                    </td>
                                </tr>
                                <?php $i++;
                            } ?>
                            <!-- fin liste des email traitées-->
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!--fin du deuxieme sous menu-->

            <!--debut du toisieme sous menu-->
            <div class="tab-pane fade" id="nav-avarie" role="tabpanel" aria-labelledby="nav-avarie-tab">

                <div class="accordion-item border-3">
                    <div class="accordion-body bg-light col-auto">
                        <table class="table table-hover w-100%"">
                            <thead>
                            <!--en tete ligne-->
                            <tr>
                                <th></th>
                                <th>MESSAGES</th>
                                <th>E-MAIL</th>
                                <th>ACTION</th>
                            </tr>
                            <!--fin en tete ligne-->
                            </thead>
                            <tbody>
                            <?php
                            include('Connect.php');
                            $idUser = $_SESSION['id'];
                            $query = mysqli_query($con, "select * from requete where id_etudiant='$idUser'") or die(mysqli_error($con));
                            $i = 1;
                            while ($row = mysqli_fetch_array($query)) {
                                $cid = $row['id_requete'];
                                ?>

                                <tr class="active">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td><?php echo $row['libelle'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success">MODIFIER</a>
                                        <a href="#" class="btn btn-danger">SUPPRIMER</a>
                                    </td>
                                </tr>
                                <?php $i++;
                            } ?>
                            <!-- fin liste des email traitées-->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!--fin du troisieme sous menu-->
        </div>
    </div>
    <!--fin deuxieme menu-->
</div>
<?php
include("footer.php");
?>
<!--fin contenu menu-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
</body>

</html>