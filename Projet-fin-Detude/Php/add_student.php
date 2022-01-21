<?php include './config/init.php'; ?>
<!doctype html>
<html lang="en">
  <?php include './include/header.php' ?>
  <body>

  <?php include './include/navbar.php' ?>
      
<div class="content" style="margin-top: 10px;"> 
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

        <?php 
        if(isset($_GET['id']))
        {
          ?>
          <h1 class="h2">Edit Book</h1>
          <?php 
        }
        else 
        {
        ?>
        <h1 class="h2">New Book</h1>
        <?php } ?>
        
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="students.php" class="link" style="float: right">Back</a>
          </div>
        </div>
      </div>



  <?php

      if(isset($_POST['add_student'])){

        $id         = getClean($_POST['id']);
        $name       = getClean($_POST['name']);
        $email      = getClean($_POST['email']);
        $status     = getClean($_POST['status']);



              $table="students";
        
              $field_values=array("student_id", "student_name", "student_email", "status");
  
              $data_values=array("$id", "$name", "$email", "$status");

              $myStudent = new Common();

              $check =  $myStudent->myInsert($field_values, $data_values, $table);

                if ($check == 1) {
            ?>

           <script>
           iziToast.success({
              title: 'Students Management Section!!',
              message: 'Student Added Successfully!!',
              position: 'topRight'
            });
           setTimeout(function(){ window.location.href="students.php";}, 1500);
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




  <?php

      if(isset($_POST['up_student'])){

        $id       = getClean($_POST['id']);
        $name     = getClean($_POST['name']);
        $email    = getClean($_POST['email']);
        $status   = getClean($_POST['status']);                      

        $table="students";
        $fields = array('student_id'=>$id, 
                        'student_name'=>$name,
                        'student_email'=>$email,
                        'status'=>$status);

        $where = "WHERE id = ".$_GET['id']." ";

              $myStudent = new Common();

              $check =  $myStudent->myUpdate($table, $fields, $where);

                if ($check == 1) {
            ?>

           <script>
           iziToast.success({
              title: 'Students Management Section!!',
              message: 'Students Updated Successfully!!',
              position: 'topRight'
            });
           setTimeout(function(){ window.location.href="students.php";}, 1500);
            </script>

        <?php  } else {?>
                 <script>
               iziToast.error({
                  title: 'Error Detected!!',
                  message: 'Error Found in System !!',
                  position: 'topRight'
                });
                 </script>

      <?php } } ?>




     

      <div class="col-md-10 mx-auto">

        <?php 
        if(isset($_GET['id']))
        {
          $myData = $mysqli->query("SELECT * FROM students WHERE id =".$_GET['id']."")->fetch_assoc();
          ?>
          

           <form method="POST">
                <div class="row">
                  <div class="form-group col-md-6">
                      <label>ID</label>
                      <input type="text" name="id" class="form-control" placeholder="ID" value="<?php echo $myData['student_id']; ?>">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $myData['student_name']; ?>">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Emial" value="<?php echo $myData['student_email']; ?>">                    
                  </div>
                  <div class="form-group col-md-6 mx-auto">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="0" <?php if($myData['status'] == 0){echo 'selected';}?>>In-Active</option>
                        <option value="1" <?php if($myData['status'] == 1){echo 'selected';}?>>Active</option>
                      </select>                    
                  </div>
                </div>
                  <div class="text-center">
                     <input type="submit" name="up_student" value="Update" class="btn btn-success btn-sm">
                  </div>
            </form>


          <?php 
        }
        else 
        {
        ?>
       
         <form method="POST">
                <div class="row">
                  <div class="form-group col-md-6">
                      <label>ID</label>
                      <input type="text" name="id" class="form-control" placeholder="ISBN">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name">                    
                  </div>
                  <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" placeholder="Email">                    
                  </div>
                 
                  <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="0">Disable</option>
                        <option value="1">Enable</option>
                      </select>                    
                  </div>
                </div>
                  <div class="text-center">
                     <input type="submit" name="add_student" value="Add New" class="btn btn-success btn-sm">
                  </div>
            </form>

        <?php } ?>



      </div>
   

    </main>
  </div>

  <?php include './include/footer.php'; ?>

</body>
</html>
