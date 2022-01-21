<?php include './config/init.php';
include 'inc1/connection.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

  <?php include './include/navbar.php' ?>
      
<br>
<div class="content" style="margin-top: 150px;">
    <main role="main">
      <div>


      
       

      <div class="col-md-10 mx-auto">

      <?php
      if(isset($_GET["id"]))
      {
        $id=$_GET["id"];
        $res5 = mysqli_query($link, "select * from add_book where id='$_GET[id]' ");
        while($row5 = mysqli_fetch_array($res5)){
            $ISBN      = $row5['isbn'];
            $nom_livre  = $row5['books_name'];
            $Auteur     = $row5['books_author_name'];
            $cat     = $row5['categorie'];
            $qty    = $row5['books_quantity'];
            $date_pub    = $row5['books_purchase_date'];  
            $qty    = $row5['books_quantity'];
        }   $status = $row5['status'];
      }
                                   
                                   ?>
          

      <form method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-md-6">
                      <label>ISBN</label>
                      <input type="text" name="isbn" class="form-control" placeholder="ISBN" value="<?php echo $ISBN; ?>">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Nom du livre</label>
                      <input type="text" name="name" class="form-control" placeholder="Nom du livre" value="<?php echo $nom_livre; ?>">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Auteur</label>
                      <input type="text" name="author" class="form-control" placeholder="Auteur" value="<?php echo $Auteur; ?>">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>catégorie</label>
                      <input type="text" name="category" class="form-control" placeholder="catégorie" value="<?php echo $cat; ?>">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Quantité</label>
                      <input type="text" name="quantity" class="form-control" placeholder="Quantité" value="<?php echo $qty; ?>">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Date-Publication</label>
                      <input type="date" name="date" class="form-control" value="<?php echo $date_pub; ?>">                    
                  </div>

                  <div class="form-group col-md-6">
                 
								
								
								
                                    
								
                  </div>
                  <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status" value="<?php echo $status; ?>">
                        <option value="Indisponible">Indisponible</option>
                        <option value="Disponible">Disponible</option>
                      </select>                    
                  </div>
                </div>
                  <div class="text-center">
                     <input type="submit" name="update" value="Modifer" class="btn btn-success btn-sm">
                  </div>
            </form>


        
            <?php
                               if (isset($_POST["update"])){
                                $ISBN  = $_POST["isbn"];
                                $nom_livre  = $_POST["name"];
                                $Auteur     = $_POST["author"];
                                $cat     = $_POST["category"];
                                $qty    = $_POST["quantity"];
                                $date_pub    = $_POST["date"];  
                               $status = $_POST["status"];
                                  $sq = mysqli_query($link,"update add_book set isbn='$ISBN',books_name='$nom_livre',books_author_name='$Auteur',categorie='$cat',books_quantity='$qty',books_purchase_date='$date_pub',status='$status' where id='$id'");
                                    ?>
                                          <script type="text/javascript">
                                            window.location="book-management.php";
                                        </script>
                                    <?php
                              }
                            ?>


      </div>
   

    </main>

  </div>

  <?php include './include/footer.php'; ?>

</body>
</html>
