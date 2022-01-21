<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        ?>
        <script type="text/javascript">
            window.location="login.php";
        </script>
        <?php
    }

    include './config/init.php'; 
    include 'inc/connection.php';

    if (isset($_GET["id"]) && isset($_GET["id_student"])) {
        $id = $_GET["id"];
        $id_student=$_GET["id_student"];
        //mysqli_query($link,"delete from livre_reser where id=$id and name='$_SESSION[email]'");



        $r = mysqli_query($link, "select * from lib_registration where id=$id_student");
        $rows = mysqli_fetch_array($r);
        $ree=mysqli_query($link, "select * from add_book where id=$id");
       $rowss = mysqli_fetch_array($ree);
       $q=(int)$rowss["books_quantity"]-1;
       mysqli_query($link,"delete from livre_reser where id=$id and email='$rows[email]'");

        ?>
        <script type="text/javascript">
            window.location="in-out-books.php";
        </script>
        <?php
    }



?>