<?php include './config/init.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

      <?php include './include/navbar.php' ?>
    

  <div class="content" style="margin-top:-130px;">  

    <main role="main">
      <div>
        <h1>Relances</h1>
        <div>
          <div class="btn-group mr-2">
            <!-- <a href="add_student.php" class="btn btn-sm btn-outline-secondary">New Book</a> -->
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          
        </div>
      </div>

     

      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>ISBN</th>
              <th>Nom du livre</th>
              <th>ID-Etudiant</th>
              <th>étudiants</th>
              <th>E-mail</th>
              <th>Date-Retour</th>
              <th>J-Restants</th>

              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

<?php     

$myQuery = $mysqli->query("SELECT * FROM `livre_emp`");
$i = 0;

while($roww = $myQuery->fetch_assoc()) {
  $r = mysqli_query($link, "select status from lib_registration where name='$roww[name]'");
  $days=(int)$roww["booksreturndate"]-(int)$br=date("d",time());
 if($days==1)
 {
        ?>
            <tr>
            <td><?php echo $roww['id']; ?></td>
            <td><?php echo $roww['isbn']; ?></td>
            <td><?php echo $roww['booksname']; ?></td>
            <td><?php echo $roww['id_stu']; ?></td>
            <td><?php echo $roww['name']; ?></td>
            <td><?php echo $roww['email']; ?></td>
            <td><?php echo $roww['booksreturndate']; ?></td>
            <TD>
              <?php
                            $bn= $roww['booksname'];

            $r = mysqli_query($link, "select status from lib_registration where name='$roww[name]'");
                                    $days=(int)$roww["booksreturndate"]-(int)$br=date("d",time());
                                    echo $days;

                                    ?>
            </TD>
                <td>
                <?php
                if($roww['deja_mail']!="d")
                {
                  ?>
                   <a class="link" href="send_mail.php?email=<?php echo $roww['email'] ?>&bn=<?php echo $bn;?> ">Mail</a>
                   <?php
                }
                   else
                   {
                     ?>
                      <div style="color: red;">
                        Déja Relancé
                       </div> 
                    <?php 
                   }
                
                 
?>
                </td>

            </tr> 



  <?php }} ?>


  
            
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <?php include './include/footer.php'; ?>



  <?php

    if (isset($_GET['delete-out'])) {
        
        $id = $_GET['delete-out'];
        $isbn = $_GET['isbn'];

        $table = "out-books";
        $where = "WHERE `id`=".$id." ";

        $myDelete = new Common();
        $check = $myDelete->myDelete($table, $where);

        $quantity = 1;
        $checkQuantity = $myDelete->myBookQuantity($quantity, $isbn);

        if ($check == 1) {
          ?>
            <script>
                    iziToast.error({
                    title: 'Book Loan Section!!',
                    message: 'Book Loan Delete Successfully!!',
                    position: 'topRight'
                  });
          </script>


      <?php } ?>
<script>
setTimeout(function(){ window.location.href="relances.php";}, 1500);
</script>
    <?php } ?>


</body>
</html>
