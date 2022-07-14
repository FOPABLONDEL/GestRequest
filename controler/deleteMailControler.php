<?php
    include('../Connect.php');
    include('../templates/StatusRequest.php');

    $id =$_GET['ide'];
    $sql = "UPDATE requete SET status = ".$R."  WHERE id_requete = ".$id; 

    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        header('Location: ../templates/Administrateur.php');
        exit;
    }
    else {
        echo "Error deleting record";

    }
?>
