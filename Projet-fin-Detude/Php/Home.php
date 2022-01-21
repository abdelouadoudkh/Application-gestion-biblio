<!DOCTYPE html>
<html lang="en">
<title>Home page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style11.css">

<style>
    body {
        font-family: "Lato", sans-serif
    }
    
    .mySlides {
        display: none
    }
    
    .w3-container .w3-white {
        font-family: 'Arial';
        font-style: italic;
        font-weight: 400;
    }
</style>

<body>

    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large">Accueil</a>
            <a href="#band" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Présentation</a>
            <a href="#tour" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Nos Livre</a>
            <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Contact</a>
            <a href="login.php" class="w3-button w3-padding-large w3-hide-small lll">Se connecter</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">Suite <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="http://bib.ump.ma/index.php?lvl=infopages&pagesid=15" class="w3-bar-item w3-button">Bibliotheque</a>
                    <a href="http://www.ump.ma/" class="w3-bar-item w3-button">UMP</a>
                    <a href="http://esto.ump.ma/" class="w3-bar-item w3-button">ESTO</a>
                </div>
            </div>
            <!--<a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a> -->
        </div>
    </div>

    <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
    <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <a href="#band" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Présentation</a>
        <a href="#tour" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Nos Livre</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
        <a href="login.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Se connecter</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Suite</a>
    </div>

    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px;margin-top:46px">

        <!-- Automatic Slideshow Images -->
        <div class="mySlides w3-display-container w3-center">
            <img src="tt.jpg" style="width:100%">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>UMP</h3>
                <p><b>L'université Mohammed Iᵉʳ !</b></p>

            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="k.jpg" style="width: 100%">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>L’Ecole Supérieure de Technologie</h3>
                <p><b>Cœur d’un environnement de formation et de recherche!</b></p>

            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="ff.jpg" style="width: 100%">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>Bibliothéque</h3>
                <p><b>La bibliothèque de l'ESTO !</b></p>
            </div>
        </div>

        <!-- The Band Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
            <h2 class="w3-wide">Présentation</h2>
            <p class="w3-opacity"><i>Bibliotheque Universitaire</p><br>
                <img src="image.gif" style="width: 15%"><br><br>
            <p class="w3-justify" style="font-size: 18.6px">La bibliothèque de l'ESTO abrite des ouvrages composés essentiellement de monographies avec plus de 5400 références et plus de 5000 rapports de stage. L'essentiel de la documentation traite du domaine industriel et des techniques de management.
                Le logiciel "PMB" est installé au sein du service pour faciliter l'accès et à aller dans le même sens du développement technologique que connait l'université. L'usage de la bibliothèque est soumis à une réglementation qui peut être consultée
                auprès du responsable de la bibliothèque de l'ESTO. Une journée "Portes Ouvertes" est organisée au mois de septembre de chaque année pour faciliter l'orientation des utilisateurs internes et externes. Cette journée est l'occasion d'exposer
                les différentes ressources de la bibliothèque ainsi que les différentes voies d'accès à la documentation.</p><br><br><br>

        </div>

        <!-- The Tour Section -->
        <div class="w3-black" id="tour">
            <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
                <h2 class="w3-wide w3-center">Nos Livre</h2>
                <p class="w3-opacity w3-center"><i>Reserver vos livres ici!</i></p><br>



            <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
                <div class="w3-third w3-margin-bottom">
                    <img src="ii.jpg" alt="New York" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>COMPTER SCIENCE RESSOURCES</b></p>
                        <p class="w3-opacity">Fri 27 Nov 2019</p>
                        <p>Reserver ici et emprunter à la bibliotheque.</p>
                        <form action="login.php"><button class="w3-button w3-black w3-margin-bottom">Reserver le livre</button></form>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="pp.jpg" alt="Paris" style="width:100% " class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>DATA SCIENCE</b></p>
                        <p class="w3-opacity">Sat 02 Jan 2018</p>
                        <p>Reserver ici et emprunter à la bibliotheque.</p>
                        <form action="login.php"><button class="w3-button w3-black w3-margin-bottom">Reserver le livre</button></form>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="oo.jfif" alt="San Francisco" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>CERTIFIED BITCOIN EXPERT</b></p>
                        <p class="w3-opacity">Sun 09 Avr 2020</p>
                        <p>Reserver ici et emprunter à la bibliotheque.</p>
                        <form action="login.php"><button class="w3-button w3-black w3-margin-bottom">Reserver le livre</button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$conn = mysqli_connect('localhost','root','','project');
    //mysqli_select_db($conn, "library");
if(!$conn){echo'try to connect it';exit;}
    
if(isset($_POST['submit'])){
    
$mail=$_POST['Email'];
$Name=$_POST['Name'];
$message=$_POST['Message'];
    
    $dest = "bu.esto.ump@gmail.com";
 $sujet = "Contact";
 $corp = "Nom : $Name
 l'email : $mail
 message : $message";
 $headers = 'From:bu.esto.ump@gmail.comu' . "\r\n" .
          'Reply-To: bu.esto.ump@gmail.com' . "\r\n" .
          'MIME-Version: 1.0' . "\r\n" .
          'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

    mail($dest,$sujet,$corp, $headers);

}else{
    echo "";
}
?>



    <!-- The Contact Section -->
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
        <h2 class="w3-wide w3-center">CONTACT</h2>
        <p class="w3-opacity w3-center"><i>Contactez le Support!</i></p>
        <div class="w3-row w3-padding-32">
            <div class="w3-col m6 w3-large w3-margin-bottom">
                <img src="loc.PNG" alt="loc"><i class="fa fa-map-marker" style="width:30px"></i> BP 457- Campus universitaire, 60000 <br> &emsp;&emsp;&ensp;&nbsp;&nbsp;&nbsp;Oujda, Maroc <br>
                <img src="Num.PNG" alt="Num"><i class="fa fa-phone" style="width:30px"></i> Phone: 06 36 50 02 24<br>
                <img src="Email.PNG" alt="Email"><i class="fa fa-envelope" style="width:30px"> </i> Email: bu.esto.ump@gmail.com<br>
            </div>
            <div class="w3-col m6">
                <form action="" target="_blank" method="POST">
                    <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                        </div>
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                        </div>
                    </div>
                    <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
                    <button class="w3-button w3-black w3-section w3-right" type="submit" name="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

    <!-- End Page Content -->
    </div>

    <script>
        // Automatic Slideshow - change image every 4 seconds
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 4000);
        }

        //Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

</body>

</html>