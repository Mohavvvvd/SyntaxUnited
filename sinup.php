<?php
$con = mysqli_connect("localhost", "root", "", "eBank-pro");
if (!$con) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$fn = mysqli_real_escape_string($con, $_POST["fname"]);
$eml = mysqli_real_escape_string($con, $_POST["eml"]);
$dat = mysqli_real_escape_string($con, $_POST["dat"]);
$pswd = mysqli_real_escape_string($con, $_POST["pswrd"]);
$cpswd = mysqli_real_escape_string($con, $_POST["cpswd"]);
$req = "INSERT INTO utilisateur VALUES('',$fn,$eml,$pswd,$dat);";
$res=mysqli_query($con,$req);
if($res == false){
    echo "<script>
    res = document.getElementById('res');
    res.innerHTML = 'erreur de saisir !'</script>" . mysqli_error($con);
}
mysqli_close($con);
?>

