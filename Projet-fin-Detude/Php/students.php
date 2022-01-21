<?php include './config/init.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

      <?php include './include/navbar.php' ?>
    

<div class="content" style="margin-top:-130px;">
    <main role="main">
      <div>
        <h1>Gestion des étudiants</h1>
        <div>
        
          
        </div>
      </div>

     

      <div>
      <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>étudiants</th>
              <th>E-mail</th>
              <th>Télephone</th>
              <th>Status</th>
              
           
              <th style="width: 250px;">Actions</th>
            </tr>
          </thead>
          <tbody>
 <?php     

  $myQuery = $mysqli->query("SELECT * FROM `lib_registration`");
  $i = 0;

  while($row = $myQuery->fetch_assoc()) {
    if($row['name']!="admin")
    {
          ?>
              <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><?php
              if($row['status']=="A")
               echo "Active"  ;
               else
               echo "Suspendu"  ;
          
               ?></td>
             
              
              <!-- <td> -->

            <?php 
            //  $now = new DateTime();
              //$future_date = new DateTime($row['return_date']);
              //$interval = $future_date->diff($now);     
              //echo $interval->format("%a days, %h hours");         
              ?>
              <!-- </td> -->

              <td>
                 
                  
                 <?php
           if($row['status']=="A")

                 {
                  ?>
                  
                 <a class="link" href="suspendre.php?id=<?php echo $row["id"]; ?> ">Suspendre</a> 
                 <?php } else { ?>

                 <a class="link" href="activer.php?id=<?php echo $row["id"]; ?> ">Activer</a>    
                 <?php }  ?>
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

    if (isset($_GET['delete'])) {
        
        $id = $_GET['delete'];

        $table = "students";
        $where = "WHERE `id`=".$id." ";

        $myDelete = new Common();
        $check = $myDelete->myDelete($table, $where);

        if ($check == 1) {
          ?>
            <script>
                    iziToast.error({
                    title: 'Students Management Section!!',
                    message: 'Student Delete Successfully!!',
                    position: 'topRight'
                  });
          </script>


    <?php } ?>
<script>
setTimeout(function(){ window.location.href="students.php";}, 1500);
</script>
    <?php } ?>


    <?php

    if (isset($_GET['enable'])) {
        
        $id = $_GET['enable'];

        $table = "students";
        $fields = array('status'=>'1');

        $where = "WHERE `id`=".$id." ";

        $myStatus = new Common();

        $check = $myStatus->myUpdate($table, $fields, $where);

        if ($check == 1) {
          ?>
            <script>
                    iziToast.info({
                    title: 'Students Management Section!!',
                    message: 'Student Enabled Successfully!!',
                    position: 'topRight'
                  });
          </script>


    <?php } ?>
<script>
setTimeout(function(){ window.location.href="students.php";}, 1500);
</script>
    <?php } ?>


        <?php

    if (isset($_GET['disable'])) {
        
        $id = $_GET['disable'];

        $table = "students";

        $fields = array('status'=>'0');

        $where = "WHERE `id`=".$id." ";

        $myStatus = new Common();

        $check = $myStatus->myUpdate($table, $fields, $where);

        if ($check == 1) {
          ?>
            <script>
                    iziToast.warning({
                    title: 'Student Management Section!!',
                    message: 'Student Disabled Successfully!!',
                    position: 'topRight'
                  });
          </script>


    <?php } ?>
<script>
setTimeout(function(){ window.location.href="students.php";}, 1500);
</script>
    <?php } ?>


</body>
</html>
