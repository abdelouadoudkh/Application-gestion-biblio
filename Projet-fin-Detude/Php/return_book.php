<?php include './config/init.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

  <?php include './include/navbar.php' ?>
      
<div class="content" style="margin-top: 140px;">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

        <h1 class="h2">Return Book</h1>
       
        <div>
          <div>
            <a href="in-out-books.php" class="link" style="float: right;">Back</a>
          </div>
        </div>
      </div>



  <?php

      if(isset($_POST['return_book'])){

        $loan_id       = getClean($_POST['load_id']);
        $isbn          = getClean($_POST['isbn']);
        $title         = getClean($_POST['title']);
        $sId           = getClean($_POST['student_id']);
        $sName         = getClean($_POST['student_name']);
        $sEmail       = getClean($_POST['student_email']);
        $return_date   = getClean($_POST['return_date']);



  
              $table="in-books";
        
              $field_values=array("loan_id", "isbn", "title", "student_id", "student_name", "student_email", "return_date");
  
              $data_values=array("$loan_id", "$isbn", "$title", "$sId", "$sName", "$sEmail", "$return_date");

              $myProduct = new Common();

              $check =  $myProduct->myInsert($field_values, $data_values, $table);

 

                if ($check == 1) {
            ?>

           <script>
           iziToast.success({
              title: 'Book Return Section!!',
              message: 'Book Return Successfully!!',
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

    <?php } } ?>




         <form method="POST">
                <div class="row">
                  <div class="form-group col-md-6">
                      <label>Loan Id</label>
                      <input type="text" name="load_id" placeholder="Loan Id" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>ISBN</label>
                      <input type="text" name="isbn" placeholder="ISBN" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Title</label>
                      <input type="text" name="title" placeholder="Title" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Student Id</label>
                      <input type="text" name="student_id" placeholder="Student Id" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Student Name</label>
                      <input type="text" name="student_name" placeholder="Student Name" required>                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Student Email</label>
                      <input type="text" name="student_email" placeholder="Student Email" required>                    
                  </div>
                  <div class="form-group col-md-12">
                      <label>Return Date</label>
                      <input type="datetime-local" name="return_date" required>                    
                  </div>
                  
                </div>
                  <div class="text-center">
                     <input type="submit" name="return_book" value="Return Book">
                  </div>
            </form>



      </div>
   

    </main>
  </div>

  <?php include './include/footer.php'; ?>

</body>
</html>
