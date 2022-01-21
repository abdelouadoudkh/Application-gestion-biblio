<?php 
    session_start();
    include 'inc/connection.php';
 ?>
<!DOCTYPE html>
<html>
	<head>
	    <title>Service d'authentification</title>
  		
      <link rel="stylesheet"  href="style-login.css">
<style>
    .esto 
{
  position: absolute;
  left: 47%;
  top: 2%;
  width: 100px;
}
</style>
</head>
    
<body id="cas" style="background-image:url(libr.jpg);background-size: 100%"> 
<img src="V3.png" alt="logo" class="esto">
  	<div class="form"> 	<div id="header">
				  <h1 class="mark">
            <a href="">
           <img  src="image.gif" class="logo">
            </a>
        </h1>
				</div>
            
		    <div id="nav">
          <h2 id="nav-title">
            
            <div class="app-name">
              <span class="auth-label" style="position:relative;left:23%;padding-top:10px;padding-bottom:10px;">Authentification</span>
              <?php 
                    if (isset($_POST["login"])) {
                        $count=0;
                        $res= mysqli_query($link, "select * from lib_registration where  email='$_POST[username]' && password= '$_POST[password]' ");
                        $count = mysqli_num_rows($res);
                        if ($count==0) {
                            ?>
                                <div class="alert alert-warning" style="margin-left:25px;margin-bottom:5px;margin-top:5px;">
                                    <strong style="color:#333"> <span style="color: red;font-weight: bold; ">Erreur! D'autentification.</span></strong>
                                </div>
                            <?php
                        }
                        else{
                            if($_POST["username"]=="admin" && $_POST["password"]=="admin")
                            {
                              
                                 $result= mysqli_query($link,"select * from lib_registration where email='$_POST[username]' && password= '$_POST[password]' ");
                            $tab = mysqli_fetch_array($result);
                            $_SESSION["username"] =$tab["name"];
                            $_SESSION["name"] = $tab["name"];
                                 $_SESSION["email"]=$tab["email"];
                                
                                ?>
                               <script type="text/javascript">
                                window.location="dashboard.php";
                            </script>
                               <?php 
                            }
                            else
                            {
                                
                           
                            $result= mysqli_query($link,"select * from lib_registration where email='$_POST[username]' && password= '$_POST[password]' ");
                            $tab = mysqli_fetch_array($result);
                            $_SESSION["username"] =$tab["name"];
                            $_SESSION["name"] = $tab["name"];
                                 
                            
                            ?>
                            <script type="text/javascript">
                                window.location="dashboard2.php";
                            </script>
                            <?php  
                        }            
                        }

                    }
                 ?>
            </div>
          </h2>
        </div>
    <form  action="" method="post">
                  
              
                  
                        <h3></h3> <br>
                     
                    <label for="username" class="fl_label">E-mail</label>

				    <input id="username" name="username" type="text" value="" size="25" placeholder="E-mail"/><br>
                  
				 
                  
                    <label for="password" class="fl-label">Mot de passe</label>
				    <input id="password" name="password" type="password"  placeholder="Mot de passe" value="" size="25" />
                 

                
                   <a href="mdp_oublié.php"
                    class="lost-password">Mot de passe oublié ?</a><br><br>
                
          
                
                
                  
					
                        <button class="btn btn-submit" name="login" accesskey="l" value="Se connecter"  type="submit">se connecter</button><br><br>
            
                 <button class="btn btn-reset" name="reset" accesskey="c" value="Effacer"  type="reset">Effacer</button><br>
                
            
                
                     Nouveau sur l'université ?
                     <a href="s'inscrire.php"
                    class="lost-password">S'inscrire</a>
                  
                  
       </form>
</div>
                
		
</body>
</html>