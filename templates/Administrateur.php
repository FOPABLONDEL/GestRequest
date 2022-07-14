<?php session_start();
    if (empty($_SESSION['id'])):
        header('Location:../index.php');
    endif;
    include('StatusRequest.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    <title>ADMINISTRATEUR</title>
</head>

<body class="bg-image"style="background-image: url('../images/BGa.jpg');">
    <?php
        include('../Connect.php');
        $idUser = $_SESSION['id'];
        
    ?>
    <?php   
        include ("Header.php");
    ?>
    <div class="header text-white text-center">
        <h2>ADMINISTRATEUR</h2>
    </div>

    <nav>
        <div class="nav nav-tabs text-white" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-state-tab" data-bs-toggle="tab" data-bs-target="#nav-state" type="button" role="tab" aria-controls="nav-state" aria-selected="true">STATISTIQUES</button>

            <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">
                BOITE DE RECEPTION
            </button>

            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">BOITE D'ENVOIE</button>

        </div>
    </nav>
    <!--contenu des menus-->
    <div class="tab-content" id="nav-tabContent">
        <!--  menu statistique -->
        <div class="tab-pane fade show active" id="nav-state" role="tabpanel" aria-labelledby="nav-state-tab">

            <div class="jumbotron">
                <div class="row w-100 justify-content-around">
                    <div class="col-md-4">
                        <div class="card border-success mx-sm-1 p-4">
                            <div class="card border-success shadow text-success"></div>
                            <div class="text-success text-center mt-3">
                                <h4>TOTAL DES REQUETTES TRAITEES</h4>
                            </div>
                            <div class="text-success text-center mt-2">
                                <?php
                                    $query = mysqli_query($con, "select count(*) from requete WHERE status='".$AE."'") or die(mysqli_error($con));
                                        while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <h1><?php
                                        echo $row['count(*)']
                                    ?></h1>
                                <?php ;} ?>                                
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h6>REQUEST</h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-danger mx-sm-1 p-4">
                            <div class="card border-danger shadow text-danger"></div>
                            <div class="text-danger text-center mt-3">
                                <h4>TOTAL DES REQUETTE REFUSEES</h4>
                            </div>
                            <div class="text-danger  text-center mt-2">
                                <?php
                                    $query = mysqli_query($con, "select count(*) from requete WHERE status='".$R."'") or die(mysqli_error($con));
                                        while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <h1><?php
                                        echo $row['count(*)']
                                    ?></h1>
                                <?php ;} ?>  
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h6>REQUEST</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin menu statistique -->
        <!--premier menu-->
        <div class="tab-pane fade mt-5 m-lg-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <!--bar des sous menus-->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-export-tab" data-bs-toggle="tab" data-bs-target="#nav-export" type="button" role="tab" aria-controls="nav-export" aria-selected="True">
                        REQUETTES
                        <?php
                            $query = mysqli_query($con, "select count(*) from requete WHERE status='".$EE."'") or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <span class="position-absolute top-1 start-98 translate-middle badge rounded-pill bg-danger">
                                <?php
                                    echo $row['count(*)']
                                ?>
                                <span class="visually-hidden">total</span>
                            </span>
                        <?php ;} ?>   
                    </button>
                    <button class="nav-link" id="nav-avarie-tab" data-bs-toggle="tab" data-bs-target="#nav-avarie" type="button" role="tab" aria-controls="nav-avarie" aria-selected="false">
                        REQUETTE CONSULTEES
                        <?php
                            $query = mysqli_query($con, "select count(*) from requete WHERE status='".$C."'") or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <span class="position-absolute top-1 start-98 translate-middle badge rounded-pill bg-danger">
                                <?php
                                    echo $row['count(*)']
                                ?>
                                <span class="visually-hidden">total</span>
                            </span>
                        <?php ;} ?>
                    </button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!--debut du premier sous menu-->
                <div class="tab-pane fade show active" id="nav-export" role="tabpanel" aria-labelledby="nav-export-tab">
                    <div class="accordion-item border-3 overflow-scroll">
                        <div class="w-100 accordion-body bg-light col-auto">
                            <table class="table table-hover w-100%">
                                <thead class="text-center">
                                    <!--en tete ligne-->
                                    <tr>
                                        <th>#</th>
                                        <th>MESSAGES</th>
                                        <th>E-MAIL</th>
                                        <th>ACTION</th>
                                    </tr>
                                    <!--fin en tete ligne-->
                                </thead>
                                <tbody>
                                    <?php
                                        $query = mysqli_query($con, "SELECT * FROM `requete` WHERE `status`='".$EE."'") or die(mysqli_error($con));
                                            while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <!--liste des email traitées-->
                                    <tr>
                                        <td class="track_dot">
                                            <span class="track_line"></span>
                                            <?php echo $row['id_requete']; ?>
                                        </td>
                                        <td><a href="#"><?php echo $row['libelle']?></a></td>
                                        <td><a href="#"><?php echo $row['EmailEtud']?></a></td>
                                        <td>
                                            <?php $idr=$row['id_requete']; ?>
                                            <a href="#" class="mx-4 btn btn-success">REPONDRE</a>
                                            <?php 
                                                echo "<a href='../controler/deleteMailControler.php?ide=".$idr."' >SUPPRIMER</a>"; 
                                            ?>
                                        </td>  
                                    </tr>
                                    <?php ;} ?>
                                </tbody>    
                            </table>
                        </div>
                    </div>

                </div>
                <!--fin du premier sous menu-->

                <!--debut du deuxieme sous menu-->
                <div class="tab-pane fade" id="nav-avarie" role="tabpanel" aria-labelledby="nav-avarie-tab">

                    <div class="accordion-item border-3 overflow-scroll">
                        <div class="w-100 accordion-body bg-light col-auto">
                            <table class="table table-hover w-100%">
                                <thead>
                                    <!--en tete ligne-->
                                    <tr>
                                        <th>#</th>
                                        <th>MESSAGES</th>
                                        <th>E-MAIL</th>
                                        <th>ACTION</th>
                                    </tr>
                                    <!--fin en tete ligne-->
                                </thead>
                                <tbody>
                                    <!--liste des email non traité-->
                                    <?php
                                        $query = mysqli_query($con, "SELECT * FROM `requete` WHERE `status`='".$AE."'") or die(mysqli_error($con));
                                            while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <!--liste des email traitées-->
                                    <tr>
                                        <td class="track_dot">
                                            <span class="track_line"></span>
                                            <?php echo $row['id_requete']; ?>
                                        </td>
                                        <td><a href="#"><?php echo $row['libelle']?></a></td>
                                        <td><a href="#"><?php echo $row['EmailEtud']?></a></td>
                                        <td>
                                            <?php $idr=$row['id_requete']; ?>
                                            <a href="#" class="mx-4 btn btn-success">REPONDRE</a>
                                            <?php 
                                                echo "<a href='../controler/deleteMailControler.php?ide=".$idr."' >SUPPRIMER</a>"; 
                                            ?>
                                        </td>  
                                    </tr>
                                    <?php ;} ?>
                                    <!-- fin liste des email non traitées-->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!--fin du deuxieme sous menu-->
            </div>
        </div>
        <!--fin premier menu-->

        <!--deuxieme menu-->
        <div class="tab-pane fade mt-5 m-lg-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <!--bar des sous menus-->
            <div class="tab-content show active" role="tabpanel">
                <div class="accordion-item border-3">
                    <div class="accordion-body bg-light col-auto">
                        <table class="table table-hover w-100%">
                            <thead>
                                <!--en tete ligne-->
                                <tr>
                                    <th>#</th>
                                    <th>MESSAGES</th>
                                    <th>E-MAIL</th>
                                    <th>ACTION</th>
                                </tr>
                                <!--fin en tete ligne-->
                            </thead>
                            <tbody>
                                <!--liste des email traitées-->
                                <tr class="active">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td><a href="#">Bienvenue sur notre page de gestion des requetes des étudiants.</a></td>
                                    <td><a href="#">awoufack.adeline21@myiuc.com</a></td>
                                    <td>
                                        <a href="#" class="btn btn-danger">SUPPRIMER</a>
                                    </td>
                                </tr>
                                <!-- fin liste des email traitées-->
                            </tbody>
                        </table>
                    </div>
                </div>
                 
                </div>
                <!--fin du premier sous menu-->
            </div>
        </div>
        <!--fin deuxieme menu-->
    </div>
    <!--fin contenu menu-->
    <?php
    include ("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>