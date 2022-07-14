<?php

session_start();
include('../Connect.php');

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);


$query = mysqli_query($con, "select * from utilisateur where Email='$email' and password='$password'") or die(mysqli_error($con));

$row = mysqli_fetch_array($query);
$id = $row['id_utilisateur'];
$counter = mysqli_num_rows($query);
if($counter > 0 ){
    $_SESSION['id']=$id;
    $name = $row['Fonction'];
    if ($name>0) {
        header('location:../templates/Administrateur.php');
    } 
    else {
        header('location:../templates/Utilisateur.php');
    }
}
else{
    echo "<script type='text/javascript'>alert('Invalid Username or Password!');
    document.location='../index.php'</script>";
}

