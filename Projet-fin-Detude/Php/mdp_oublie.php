<!DOCTYPE html>
<html>

<head>
    <title>MOT DE PASSE PERDU</title>
<meta charset="utf-8">
    <link type="text/css" rel="stylesheet" media="screen" href="style-MDP.css" />
</head>

<body id="cas">
    <?php 
    session_start();
    include 'inc/connection.php';

    
if(isset($_POST['submit'])){
    
$mail=$_POST['email'];
$sql="SELECT email from lib_registration where email ='$mail'";
    
$mdp="Select password from lib_registration where email='$mail'";
    
   
      $res = mysqli_query($link, "Select * from lib_registration where email='$mail'");
                                while ($row = mysqli_fetch_array($res)) 
                                {
                                   
                                    $bkn=$row["password"];
                                }
    
    
$result1 = mysqli_query($link, $mdp);
//$donnees = mysql_fetch_array($mdp);
    
if($result2 = mysqli_query($link, $sql)){
    
    $dest = "$mail";
 $sujet = "Recuperation du Mot de passe";
 $corp = "Le mot de passe est : $bkn";
 $headers = 'From: bu.esto.ump@gmail.comu' . "\r\n" .
          'Reply-To: bu.esto.ump@gmail.com' . "\r\n" .
          'MIME-Version: 1.0' . "\r\n" .
          'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

    if (mail($dest, $sujet, $corp, $headers)) {
   echo "Email envoyé avec succès à $dest ...";
   header('Refresh:5;url=https://www.gmail.com/');
    } else {
   echo "Échec de l'envoi de l'email...";
 }
    
}else{
    echo"Email invalide";
}}
?>
    
    <div class="form">
        <div id="header">
            <h1 class="mark">
                <a href="">
                    <img src="image.gif" class="logo">
                </a>
            </h1>
        </div>

        <div id="nav">
            <h2 id="nav-title">

                <div class="app-name">
                    <span class="auth-label">MOT DE PASSE PERDU</span>
                </div>
            </h2>
        </div>
        <form action=""  method="post">

           

            <label for="password" class="fl-label">E-mail</label>
            <input id="password" name="email" type="text" value="" size="40" placeholder="amine.ali@domain.com" /><br><br>

            <div id="le">
                <p><img src="ddd.jpeg" alt="!!!"> IMPORTANT : l'adresse email doit être reconnue </p>
                <p> Pour que la demande de réinitialisation de votre mot de passe soit acceptée, il est nécessaire que l'adresse e-mail de récupération saisie soit déclarée dans notre système d'information . Sans cela, votre demande ne pourra être prise en
                    compte.
                </p>
            </div>
           

            <button class="btn btn-submit" name="submit" accesskey="l" value="Se connecter" type="submit">Récupération</button><br><br>


        </form>
    </div>

</body>

</html>