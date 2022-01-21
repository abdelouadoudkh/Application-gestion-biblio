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


      <?php
        if(isset($_POST["add_book"] ))
        {
          $image_name=$_FILES['image']['name'];
          $temp = explode(".", $image_name);
          $newfilename = round(microtime(true)) . '.' . end($temp);
          $imagepath="books-image/".$image_name;
          move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
       
            $date=(string)$_POST["date"];
            if($_POST["name"]!="" && $_POST["isbn"]!="" )
            {
              mysqli_query($link, "insert into add_book (isbn,books_name,books_author_name,categorie,books_quantity,books_purchase_date,status,books_image) values ('$_POST[isbn]','$_POST[name]','$_POST[author]','$_POST[category]','$_POST[quantity]','$date','$_POST[status]','$imagepath')");
              ?>
               
              <div style="color: green;">
                           Le livre est bien ajouté !!
                       </div>
               <?php
                header('Refresh:5;url=book-management.php');
            }
            else
            {
              ?>
              <div style="color:red;">
                            Remplir les champs  !!
                        </div>
                        <?php
            }
                
                //
            }
          
             
        
       
               
             ?>

      <div class="col-md-10 mx-auto">


          

      <form method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-md-6">
                      <label>ISBN</label>
                      <input type="text" name="isbn" class="form-control" placeholder="ISBN">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Nom du livre</label>
                      <input type="text" name="name" class="form-control" placeholder="Nom du livre">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Auteur</label>
                      <input type="text" name="author" class="form-control" placeholder="Auteur">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>catégorie</label>
                      <input type="text" name="category" class="form-control" placeholder="catégorie">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Quantité</label>
                      <input type="text" name="quantity" class="form-control" placeholder="Quantité">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Date-Publication</label>
                      <input type="date" name="date" class="form-control">                    
                  </div>

                  <div class="form-group col-md-6">
                 
									<input type="file" name="image" class="parcourir" id="image">
								
								
                                    
								
                  </div>
                  <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="Indisponible">In-Active</option>
                        <option value="Disponible">Active</option>
                      </select>                    
                  </div>
                </div>
                  <div class="text-center">
                     <input type="submit" name="add_book" value="ajouter un nouveau" class="btn btn-success btn-sm">
                  </div>
            </form>


        
      


      </div>
   

    </main>

  </div>

  <?php include './include/footer.php'; ?>

</body>
</html>
