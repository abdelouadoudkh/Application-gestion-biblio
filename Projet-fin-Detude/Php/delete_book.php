<?php include './config/init.php';
include 'inc1/connection.php'; ?>

  <?php include './include/header.php' ?>


  <?php include './include/navbar.php' ?>
      <?php
      if(isset($_GET["id"]))
      {
        $id=$_GET["id"];
        mysqli_query($link,"delete from add_book where id='$id'");
       
      }
                                   ?>
                                    <script type="text/javascript">
                                            window.location="book-management.php";
                                        </script>