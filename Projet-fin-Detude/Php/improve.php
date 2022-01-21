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

       $isbn=$rowss["isbn"];
       $name=$rows["name"];
        $auteur=$rowss["books_author_name"];
        $img=$rowss["books_image"];
       $cat=$rowss["categorie"];
       $ph=$rows["phone"];
       $em=$rows["email"];
       $i=$rows["id"];
       $bn=$rowss["books_name"]; 
       $date = date('Y-m-d',time() + 2 * 60 * 60);

       $bi=date("d/m/Y | h:i:s");
       //$br=date('Y-m-d');
       $days=7*24*60*60;
       $br=date("d/m/Y", time()+$days);

       $ra = mysqli_query($link, "insert into livre_emp (id,isbn,image,name,categorie,photo,email,booksname,auteur,booksissuedate,booksreturndate,date,id_stu) values ($id,'$isbn','$img','$name','$cat','$ph','$em','$bn','$auteur','$bi','$br','$date',$i)");
       $raa = mysqli_query($link, "update add_book set books_quantity=$q where id=$id");
        ?>
        <script type="text/javascript">
            window.location="in-out-books.php";
        </script>
        <?php
    }



?>