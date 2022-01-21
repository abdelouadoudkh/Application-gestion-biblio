<?php include './config/init.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

  <?php include './include/navbar.php' ?>
      
    <div class="content" style="margin-top: 140px;">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

        <?php 
        if(isset($_GET['email']) && isset($_GET['bn']))
        {
         
          $dest=$_GET['email'];
          $bn=$_GET['bn'];
          $sujet = "Relance !!!";
          $corp = "Il vous reste un jour pour rendre le livre : \"".$_GET[bn]."\" .";
          $headers = 'From: bu.esto.ump@gmail.comu' . "\r\n" .
                   'Reply-To: bu.esto.ump@gmail.com' . "\r\n" .
                   'MIME-Version: 1.0' . "\r\n" .
                   'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
         
             if(mail($dest, $sujet, $corp, $headers))
             {
              $raa = mysqli_query($link, "update livre_emp set deja_mail='d' where booksname='$bn' and email='$dest'");
             header('Refresh:0;url=relances.php');
             }
        }
       
        ?>
       



      