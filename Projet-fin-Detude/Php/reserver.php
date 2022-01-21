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
        
        
        $r = mysqli_query($link, "select * from lib_registration where name='$_SESSION[username]'");
        $rows = mysqli_fetch_array($r);
        $ree=mysqli_query($link, "select * from add_book where id=$id");
       $rowss = mysqli_fetch_array($ree);
      
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
       
        
         $res = mysqli_query($link,"select * from livre_reser where name='$_SESSION[username]' and id='$id'");
                                
         $count = mysqli_num_rows($res);
        
        if($count==0)
        {
            
            $ra = mysqli_query($link, "insert into livre_reser (id,isbn,image,name,categorie,phone,email,booksname,auteur,booksissuedate,booksreturndate,date,id_stu) values ($id,'$isbn','$img','$name','$cat','$ph','$em','$bn','$auteur','$bi','$br','$date',$i)");
        }
            
        ?>
        <script type="text/javascript">
            window.location="display-books.php";
        </script>
        <?php
    }



?>