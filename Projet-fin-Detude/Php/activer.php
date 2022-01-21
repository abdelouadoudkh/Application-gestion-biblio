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
    include 'inc1/connection.php';

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $r = mysqli_query($link, "update lib_registration  set status='A' where id=$id");
      
        ?>
        <script type="text/javascript">
            window.location="students.php";
        </script>
        <?php
    }



?>