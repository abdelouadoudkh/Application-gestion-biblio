<?php include './config/init.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

  <?php include './include/navbar.php' ?>
      
<br>
<div class="content" style="margin-top: 120px;">
    <main role="main">
      <div>

        <?php 
        if(isset($_GET['id']))
        {
          ?>
          <h1>Edit Book</h1>
          <?php 
        }
        else 
        {
        ?>
        <h1>Loan Book</h1>
        <?php } ?>
        
        <div>
          <div>
            <a href="in-out-books.php" class="link" style="float: right;">Back</a>
          </div>
        </div>
      </div>



  <?php

      if(isset($_POST['loan_book'])){

        $isbn        = getClean($_POST['isbn']);
        $title       = getClean($_POST['title']);
        $sId         = getClean($_POST['student_id']);
        $sName       = getClean($_POST['student_name']);
        $sEmail      = getClean($_POST['student_email']);
        $start_date  = getClean($_POST['start_date']);
        $return_date = getClean($_POST['return_date']);

              $myLoanBook = new Common();


              if($myLoanBook->myStudentCheck($sId)){

              if ($myLoanBook->myReturnCheck($sId)) {

              $table="out-books";
        
              $field_values=array("isbn", "title", "student_id", "student_name", "student_email", "start_date", "return_date");
  
              $data_values=array("$isbn", "$title", "$sId", "$sName", "$sEmail", "$start_date", "$return_date");

              

              $check =  $myLoanBook->myInsert($field_values, $data_values, $table);


            if ($check == 1) {
            ?>

           <script>
           iziToast.success({
              title: 'Book Loan Section!!',
              message: 'Book loaned Successfully!!',
              position: 'topRight'
            });
           setTimeout(function(){ window.location.href="in-out-books.php";}, 1500);
            </script>

  <?php  }else {?>
                 <script>
               iziToast.error({
                  title: 'Error Detected!!',
                  message: 'Error Found in System !!',
                  position: 'topRight'
                });
                 </script>

      <?php }}else{?>

                <script>
               iziToast.warning({
                  title: 'Book Loan Section!!',
                  message: 'Return the Previous Loan Book First..!!',
                  position: 'topRight'
                });
                 </script>

     <?php }}else{?>


                <script>
               iziToast.warning({
                  title: 'Book Loan Section!!',
                  message: 'Account Disabled.!!',
                  position: 'topRight'
                });
                 </script>

     <?php }} ?>

         <form method="POST">
                <div class="row">
                  <div class="form-group col-md-6">
                      <label>ISBN</label>
                      <input type="text" name="isbn" class="form-control" placeholder="ISBN" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control" placeholder="Name" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Student Id</label>
                      <input type="text" name="student_id" class="form-control" placeholder="Student id" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Student Name</label>
                      <input type="text" name="student_name" class="form-control" placeholder="Student Name" required>                    
                  </div>
                  <div class="form-group col-md-12">
                      <label>Student Email</label>
                      <input type="email" name="student_email" class="form-control" placeholder="Student Email" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Start Date</label>
                      <input type="datetime-local" name="start_date" class="form-control" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Return Date</label>
                      <input type="datetime-local" name="return_date" class="form-control" required>                    
                  </div>

                </div>
                  <div class="text-center">
                     <input type="submit" name="loan_book" value="Loan Book" class="btn btn-success btn-sm">
                  </div>
            </form>



      </div>
   

    </main>
  </div>


  <?php include './include/footer.php'; ?>

</body>
</html>
