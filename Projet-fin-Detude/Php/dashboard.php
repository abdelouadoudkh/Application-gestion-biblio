<?php include './config/init.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

      <?php include './include/navbar.php' ?>
    
<div class="content" style="margin-top: -200px;">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <br>
        <br><br>
        <h1 class="h2">Messages Récent</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
      
        </div>
      </div>
<br><br>
      <table>
          <thead>
            <tr>
              <th>Utilisateur</th>
              <th>Objet</th>
              <th>Message</th>
             
           
              
            </tr>
          </thead>
          <tbody>
 <?php     

  $myQuery = $mysqli->query("SELECT * FROM `message` order by id desc");
  $i = 0;

  while($row = $myQuery->fetch_assoc()) {
    $i++
          ?>
              <tr>
              
              <td><?php echo $row['susername']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['msg']; ?></td>
             

            </tr> 



  <?php } ?>

         
          </tbody>
        </table>
      
    </main>
  </div>


  <?php include './include/footer.php'; ?>

</body>
</html>
