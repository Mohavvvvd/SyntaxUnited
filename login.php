<?php
$con = mysqli_connect("localhost", "root", "", "eBank-pro");

if (!$con) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Utilisez des requêtes préparées pour éviter les injections SQL
$user = $_POST["username"];
$pswd = $_POST["password"];

// Construisez votre requête SQL avec des paramètres de substitution
$req = "SELECT * FROM utilisateur WHERE nom = ? and mdp = ?";

// Préparez la requête
$stmt = mysqli_prepare($con, $req);

// Liez les valeurs aux paramètres de substitution
mysqli_stmt_bind_param($stmt, "ss", $user, $pswd);

// Exécutez la requête préparée
mysqli_stmt_execute($stmt);

// Obtenez le résultat
$resultat = mysqli_stmt_get_result($stmt);

if (!$resultat) {
    echo "<script>alert('Erreur d'exécution de la requête : " . mysqli_error($con) . "')</script>";
} else {
    // Traitez le résultat comme d'habitude
    $row = mysqli_fetch_assoc($resultat);
    
    if ($row) {
        // L'utilisateur existe, vous pouvez faire quelque chose ici
        echo "<script>alert('Connexion réussie !')</script>";
    } else {
        echo "<script>alert('Aucun utilisateur avec ce nom et ce mot de passe.')</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit;

    }
}

// Fermez la requête préparée et la connexion à la base de données lorsque vous avez fini
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
