<?php include './config/init.php'; ?>

 <?php

      if(isset($_POST['viewId'])){

              $id = $_POST['viewId'];
              $myQuery = $mysqli->query("SELECT * FROM `out-books` WHERE id='{$id}'");
              $rowLoaned = $myQuery->fetch_assoc();



              $myQueryIn = $mysqli->query("SELECT * FROM `in-books` WHERE loan_id='{$id}' AND isReturn = 1");
              $count = $myQueryIn->num_rows;

              $myStudentId = $rowLoaned['student_id'];
              $myQueryStudent = $mysqli->query("SELECT * FROM `students` WHERE student_id='{$myStudentId}'");
              $rowStudent = $myQueryStudent->fetch_assoc();

              echo json_encode([
              	'student_status'=>$rowStudent['status'],
              	'count'=>$count,

              	
               ]);
      }


 ?>