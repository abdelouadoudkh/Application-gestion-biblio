<?php 
	include 'inc/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription-page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style-s'inscrire.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">

  <style>
    .dom
    {
     
      position: absolute;
      left: 80.5%;
      top: 50%;
      color: rgb(255, 145, 0);
    }
    .logo 
{
  position: absolute;
  left: 80%;
  top: 40%;
  width: 100px;
  border: 5px solid rgb(245, 135, 32);
}
.esto 
{
  position: absolute;
  left: 80%;
  top: 55%;
  width: 100px;
}
  </style>
</head>
<body style="background-image:url(libr.jpg);background-size: 100%">
 
  <img  class="logo" src="BU.png" alt="">
  <P class="dom">BU.ESTO.MA</P>
  <img src="V3.png" alt="logo" class="esto">

  <img class="pic" src="h.png" alt="">
  <!--<img class="pic1" src="boy.png" alt="">-->
  

  <div class="cont">
    <div class="f-sign-in">
      <h2>S'INSCRIRE</h2>
      <br>
        <?php
        if(isset($_POST["submit"]))
        {
            if ($_POST["pwd"]==$_POST["re-pwd"]) {
                $photo = "upload/avatar.jpg";
                $name=$_POST["nom"]." ".$_POST["prenom"];
                mysqli_query($link, "insert into lib_registration values('','$name','$_POST[pwd]','$_POST[email]','$_POST[tel]','','$photo','A')");
                ?>
               
               <div style="color: green;">
                            Le compte est bien creé !!
                        </div>
                <?php
                 header('Refresh:5;url=login.php');
            }
            else{
                ?>
                <div style="color: red;">
                            Les deux champs de Mot de pass Ne sont pas identique!
                        </div>
                    <?php
                    }
             
        }
       
               
             ?>

           <form  method="POST">
        <table class="tab.form">
          <tr>

           <td><label for="nom">Nom :</label></td>

           <td><input type="text" id="nom" name="nom" size="20"></td>
         </tr>
         <tr>
           <td><label for=prenom >Prénom :</label></td>

           <td><input type="text" id="prenom" name="prenom" size="20" required></td>
        </tr>
        <tr>
           <td><label for="email">Email :</label></td>

           <td><input type="text" id="email" name="email" size="20" required></td>
        </tr>
        <tr>
           <td><label for="cne">Tél:</label></td>

           <td><input type="text" id="cne" name="tel" size="20" ></td>
        </tr>
        <tr>
          <td><label for="pwd">Mot de passe :</label></td>

          <td><input type="password" id="pwd" name="pwd" size="20" required></td>
       </tr>
       <tr>
        <td><label for="re-pwd">Confirmation :</label></td>

        <td><input type="password" id="re-pwd" name="re-pwd" size="20" required></td>
     </tr>


      </table>
      <input class="submit" name="submit" type="submit" value="s'inscrire" style="margin-left: 25%; width: 260px;height: 36px;border-radius: 30px;color: #fff;font-size: 15px;cursor: pointer;">
        </form>

      <div class="social-media">
        <ul>
          <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li>
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        
        <span class="img-text m-in">
          <h2>Déja S'inscrire?</h2>
          <p>Si vous avez déjà un compte, connectez-vous. Vous nous avez manqué!</p>
         <a href="login.php" style="text-decoration: none;"><input class="login" type="button" value="LOG-IN"></a> 
          
          

        </span>
       

    </div>  
    </div>
     
</body>
</html>