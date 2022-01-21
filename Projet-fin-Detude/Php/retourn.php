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

    if (isset($_GET["id"]) && isset($_GET["id_stud"])) {
        $id=$_GET["id"];
        $id_stud=$_GET["id_stud"];
        //mysqli_query($link,"delete from livre_reser where id=$id and name='$_SESSION[email]'");



      
      
       mysqli_query($link,"delete from livre_emp where id=$id and id_stu='$id_stud'");

       $ree=mysqli_query($link,"select * from add_book where id=$id");
       $rowss=mysqli_fetch_array($ree);
       $q=(int)$rowss["books_quantity"]+1;

       $raa = mysqli_query($link, "update add_book set books_quantity=$q where id=$id");
        ?>
        <script type="text/javascript">
            window.location="in-out-books.php";
        </script>
        <?php
    }



?>