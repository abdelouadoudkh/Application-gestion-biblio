<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        ?>
        <script type="text/javascript">
            window.location="login.php";
        </script>
        <?php
    }

    include 'inc/connection.php';
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        mysqli_query($link, "delete from livre_reser where id=$id and name='$_SESSION[username]'");

        ?>
        <script type="text/javascript">
            window.location="l_reserver.php";
        </script>
        <?php
    }



?>