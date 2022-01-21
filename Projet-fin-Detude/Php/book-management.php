<?php include './config/init.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

      <?php include './include/navbar.php' ?>
    
<div class="content" style="margin-top: 20px;">
    <main role="main">
      <div>
        <h1>Gestion des livres</h1>
        <div>
          
          
        </div>
      </div>

      <form action="" method="POST">
                                Trier par :
                            <select name="choix" class="form-control">

                                                    <option value="books_name">
                                                     Nom de livre
                                                    </option>
                                                    <option value="books_author_name">
                                                      Nom de l'auteur
                                                    </option><option value="status">
                                                    Status
                                                   </option>
                                                   <option value="categorie">
                                                     Categorie
                                                    </option>
                                                    
                                  </select>=<input type="text" name="mot" size="15" placeholder="Chercher...">

                                  <input class="Tri"  type="submit" value="Chercher" style="" name="trier">
                            </form>
                            <div>
            <a href="add_book.php" class="link" style="float: right">Nouveau livre</a>
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
      <div>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>ISBN</th>
              <th>Nom du Livre</th>
              <th>Auteur</th>
              <th>Categorie</th>
              <th>Quantité</th>
              <th>Date-publ</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

<?php     
 $res = mysqli_query($link, "select * from add_book");
 if( isset($_POST["trier"]) )
 {
     $choix=$_POST["choix"];
     $mot=$_POST["mot"];
     if($mot == "")
     {
         $res = mysqli_query($link, "select * from add_book order by $choix");
     }
     else
     {
         $res = mysqli_query($link, "select * from add_book where $choix like '%$mot%'");
     }


   
 }
 

  while($row = mysqli_fetch_array($res)) {
   
          ?>
              <tr>
              <td><?php echo$row['id']; ?></td>
              <td><?php echo $row['isbn']; ?></td>
              <td><?php echo $row['books_name']; ?></td>
              <td><?php echo $row['books_author_name']; ?></td>
              <td><?php echo $row['categorie']; ?></td>
              <td><?php echo $row['books_quantity']; ?></td>
              <td><?php echo $row['books_purchase_date']; ?></td>
              <td>
                <?php  
                  if ($row['status'] == "Disponible") {
                      echo "Disponible";
                  }else{
                    echo "Indisponible";
                  }

                ?>
  
                </td>
                <td>
                  <a class="link" href="modifier_book.php?id=<?php echo $row['id'] ?>">Modifier</a>

                  
                  <a class="link" href="delete_book.php?id=<?php echo $row["id"];?> ">Supprimer</a>
                </td>

            </tr> 



          <?php } ?>


  
            
          </tbody>
        </table>
      </div>
    </main>
  </div>


  <?php include './include/footer.php'; ?>


<?php

    if (isset($_GET['delete'])) {
        
        $id = $_GET['delete'];

        $table = "books";
        $where = "WHERE `id`=".$id." ";

        $myDelete = new Common();
        $check = $myDelete->myDelete($table, $where);

        if ($check == 1) {
          ?>
            <script>
                    iziToast.error({
                    title: 'Category Section!!',
                    message: 'Category Delete Successfully!!',
                    position: 'topRight'
                  });
          </script>


    <?php } ?>
<script>
setTimeout(function(){ window.location.href="book-management.php";}, 1500);
</script>
    <?php } ?>


    <?php

    if (isset($_GET['active'])) {
        
        $id = $_GET['active'];

        $table = "books";
        $fields = array('status'=>'1');

        $where = "WHERE `id`=".$id." ";

        $myStatus = new Common();

        $check = $myStatus->myUpdate($table, $fields, $where);

        if ($check == 1) {
          ?>
            <script>
                    iziToast.info({
                    title: 'Book Management Section!!',
                    message: 'Book Active Successfully!!',
                    position: 'topRight'
                  });
          </script>


    <?php } ?>
<script>
setTimeout(function(){ window.location.href="book-management.php";}, 1500);
</script>
    <?php } ?>


        <?php

    if (isset($_GET['in-active'])) {
        
        $id = $_GET['in-active'];

        $table = "books";

        $fields = array('status'=>'0');

        $where = "WHERE `id`=".$id." ";

        $myStatus = new Common();

        $check = $myStatus->myUpdate($table, $fields, $where);

        if ($check == 1) {
          ?>
            <script>
                    iziToast.warning({
                    title: 'Book Management Section!!',
                    message: 'Book In-Active Successfully!!',
                    position: 'topRight'
                  });
          </script>


    <?php } ?>
<script>
setTimeout(function(){ window.location.href="book-management.php";}, 1500);
</script>
    <?php } ?>


</body>
</html>
