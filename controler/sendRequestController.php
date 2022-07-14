
<?php
    session_start();
    /* include('../Connect.php') */;
    try
    {
        $dbconnection = new PDO('
            mysql:host=localhost;
            dbname=gestrequest;
            charset=utf8', 
            'root', 
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
    }
    catch (Exception $e)
    {
            die('Erreur :'.$e->getMessage());
    }

    // Ecriture de la requête
    $sqlQuery = 'INSERT INTO `requete`(`Type`, `EmailEtud`, `libelle`) VALUES(:requesttype,:emailEtud,:requesttext)';

    // Préparation
    $insertPerson = $dbconnection->prepare($sqlQuery);

    // Exécution ! La recette est maintenant en base de données
    $insertPerson->execute([
        'requesttype' => $_POST['requesttype'],
        'emailEtud' => $_POST['email'],
        'requesttext' => $_POST['requesttext']
    ]);
    echo "<script type='text/javascript'>alert('Successfully added request.');</script>";
    echo "<script>document.location='../templates/Etudiants.php'</script>";
