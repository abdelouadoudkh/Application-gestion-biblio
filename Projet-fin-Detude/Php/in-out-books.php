<?php include './config/init.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

      <?php include './include/navbar.php' ?>


  <div class="content" style="margin-top:20px;">  
    <main>
      <div>
        <h1>Entrée-Sortie d'ouvrage</h1>
        <div>
          
        </div>
      </div>

     
<br>
<br>
     

      <div>
        <h1>Demande d'ouvrage</h1>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>ISBN</th>
              <th>Livre</th>
              <th>ID-Etudiant</th>
              <th>étudiants</th>
              <th>Email</th>
              <th>Date-debut</th>
              <th>Date-Retour</th>
           
              <th style="width: 250px;">Actions</th>
            </tr>
          </thead>
          <tbody>
 <?php     

  $myQuery = $mysqli->query("SELECT * FROM `livre_reser`");
  $i = 0;

  while($row = $myQuery->fetch_assoc()) {
    $i++
          ?>
              <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['isbn']; ?></td>
              <td><?php echo $row['booksname']; ?></td>
              <td><?php echo $row['id_stu']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['booksissuedate']; ?></td>
              <td><?php echo $row['booksreturndate']; ?></td>
              
              <!-- <td> -->

            <?php 
            //  $now = new DateTime();
              //$future_date = new DateTime($row['return_date']);
              //$interval = $future_date->diff($now);     
              //echo $interval->format("%a days, %h hours");         
              ?>
              <!-- </td> -->

                <td>
                  
                  <!-- <a class="btn btn-sm btn-primary" href="view-in-book.php?id=<?php echo $row['id'] ?>">view</a> -->
                  
                  <?php
                   ?>
                  <a class="link" href="improve.php?id=<?php echo $row["id"];?>&id_student= <?php echo $row['id_stu']; ?> ">Approuver</a>    
                    <?php  ?>
                  
                  <a class="link" href="delete_reser1.php?id=<?php echo $row["id"];?>&id_student= <?php echo $row['id_stu']; ?> ">Supprimer</a>

                </td>

            </tr> 



  <?php } ?>

         
          </tbody>
        </table>
      </div>

<br>
            <div class="table-responsive">
              <h1 class="h2">Retourne d'ouvrage</h1>
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
            <th>ID</th>
              <th>ISBN</th>
              <th>Livre</th>
              <th>ID-Etudiant</th>
              <th>étudiants</th>
              <th>Email</th>
             
              <th>Date-Retour</th>
              <th>Rendre</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
 <?php     

  $myQuery = $mysqli->query("SELECT * FROM `livre_emp`");
  $i = 0;

  while($roww = $myQuery->fetch_assoc()) {
    $i++
          ?>
              <tr>
              <td><?php echo $roww['id']; ?></td>
              <td><?php echo $roww['isbn']; ?></td>
              <td><?php echo $roww['booksname']; ?></td>
              <td><?php echo $roww['id_stu']; ?></td>
              <td><?php echo $roww['name']; ?></td>
              <td><?php echo $roww['email']; ?></td>
              <td><?php echo $roww['booksreturndate']; ?></td>
              <!-- <td> -->
                <?php 

$em=$roww['id_stu'];

              // $now = new DateTime();
              // $future_date = new DateTime($row['return_date']);
              // $interval = $future_date->diff($now);     
              // echo $interval->format("%a days, %h hours");         



              ?>
                
              <!-- </td> -->
              <td>
                <?php
                  
                   ?>
                     <a class="link" href="retourn.php?id=<?php echo $roww['id'];?>&id_stud= <?php echo $em; ?> ">Retourner</a>  
                    

               
              </td>
              <td>
                
                  
                     <a class="link" href="suspendre.php?id=<?php echo $em; ?> ">Suspendre</a>
                  

              
              </td>
                

            </tr> 



  <?php } ?>
         
          </tbody>
        </table>
      </div>
    </main>
  </div>




<!-- OUT Book -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close close-view-out-book">&times;</span>
      <h2>Out Book Record</h2>
    </div>
    <div class="modal-body">

      <table>

        <tr>
          <th>Student Status</th>
          <td><p id="myStudentSuspend"></p></td>
        </tr>
        <tr>
          <th>Return Book</th>
          <td><p id="myCOunt"></p></td>
        </tr>
 
       
      </table>
      </div>
     <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>
</div>



<!-- OUT Book -->
<div id="myModal2" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close close-view-in-book">&times;</span>
      <h2>In Book Record</h2>
    </div>
    <div class="modal-body">

      <table>
      
        <tr>
          <th>Student Status</th>
          <td><p id="myReturnStudentSuspend"></p></td>
        </tr>
        
           <tr>
          <th>Loan Books</th>
          <td><p id="myCOuntReturn"></p></td>
        </tr>
      
      </table>
      </div>
     <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>
</div>
  <?php include './include/footer.php'; ?>


  <script>
    $(document).ready(function(){
          $(document).on('click', '.view-out-book', function(){
                var viewId = $(this).attr('data-id');

            $.ajax({
            url: 'view-out-book.php',
            method: 'POST',
            data: {viewId:viewId},
            dataType: 'json',
            success:function(getData){
              
                if(getData.student_status != 0) {
                $('#myStudentSuspend').html('Suspended');
                }else{
                  $('#myStudentSuspend').html('Not-Suspended');
                }
                $('#myCOunt').html(getData.count);
                
                $('#myModal').show();
            }
          });
       });

          $(document).on('click', '.close-view-out-book', function(){
             $('#myModal').hide();
       });





          $(document).on('click', '.view-in-book', function(){
          var viewId = $(this).attr('data-id');

            $.ajax({
            url: 'view-in-book.php',
            method: 'POST',
            data: {viewId:viewId},
            dataType: 'json',
            success:function(getData){
             
                if(getData.student_status != 0) {
                $('#myReturnStudentSuspend').html('Suspended');
                }else{
                  $('#myReturnStudentSuspend').html('Not-Suspended');
                }
               $('#myCOuntReturn').html(getData.count);
                
                $('#myModal2').show();

            }
          });
        });


            $(document).on('click', '.close-view-in-book', function(){
             $('#myModal2').hide();
       });


    });


  </script>




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
setTimeout(function(){ window.location.href="in-out-books.php";}, 1500);
</script>
    <?php } ?>
  


  <?php

    if (isset($_GET['improve'])) {
        
        $id = $_GET['improve'];
        $isbn = $_GET['isbn'];

        $myLoanBook = new Common();

        $table = "out-books";
        $fields = ['isLoaned' => 1];
        $where = "WHERE id = ".$_GET['improve']." ";

        $check =  $myLoanBook->myUpdate($table, $fields, $where);
        $checkQuantity = $myLoanBook->myBookQuantity(-1, $isbn);

        if ($check && $checkQuantity) {
          ?>
            <script>
                    iziToast.info({
                    title: 'Book Loan Section!!',
                    message: 'Book Loaned Successfully!!',
                    position: 'topRight'
                  });
          </script>


      <?php } ?>
<script>
setTimeout(function(){ window.location.href="in-out-books.php";}, 1500);
</script>
    <?php } ?>
    





  <?php

    if (isset($_GET['in_return'])) {
        
        $id = $_GET['in_return'];
        $isbn = $_GET['isbn'];


        $table = "in-books";
        
        $fields = ['isReturn' => 1];
        $where = "WHERE id = ".$_GET['in_return']." ";

        $myBookIn = new Common();

       $check =  $myBookIn->myUpdate($table, $fields, $where);

        $quantity = 1;
        $checkQuantity = $myBookIn->myBookQuantity($quantity, $isbn);

        if ($check == 1) {
          ?>
            <script>
                    iziToast.success({
                    title: 'Book Returned Section!!',
                    message: 'Book Returned Successfully!!',
                    position: 'topRight'
                  });
          </script>


      <?php } ?>
<script>
setTimeout(function(){ window.location.href="in-out-books.php";}, 1500);
</script>
    <?php } ?>
    




  <?php

    if (isset($_GET['is_suspend'])) {
        
        $id = $_GET['is_suspend'];
 $student_id = $_GET['student_id'];
              


        $table = "in-books";
        
        $fields = ['isSuspend' => 1];
        $where = "WHERE id = ".$_GET['is_suspend']." ";
        $myBookIn = new Common();
        $check =  $myBookIn->myUpdate($table, $fields, $where);
        $myBookIn->myStudentDisable($student_id);

        if ($check == 1) {
          ?>
            <script>
                    iziToast.success({
                    title: 'Book Returned Section!!',
                    message: 'Student Suspended Successfully!!',
                    position: 'topRight'
                  });
          </script>


      <?php } ?>
<script>
setTimeout(function(){ window.location.href="in-out-books.php";}, 1500);
</script>
    <?php } ?>
    




</body>
</html>