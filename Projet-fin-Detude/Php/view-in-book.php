<?php include './config/init.php'; ?>

 <?php

      if(isset($_POST['viewId'])){
        $id = $_POST['viewId'];
        $myQuery = $mysqli->query("SELECT * FROM `in-books` WHERE id='{$id}'");
        $row = $myQuery->fetch_assoc();




              $myStudentId = $row['student_id'];

              $myQueryOut = $mysqli->query("SELECT * FROM `out-books` WHERE student_id='{$myStudentId}'");
              $count = $myQueryOut->num_rows;



              $myQueryStudent = $mysqli->query("SELECT * FROM `students` WHERE student_id='{$myStudentId}'");
              $rowStudent = $myQueryStudent->fetch_assoc();



              echo json_encode([
              	'student_status'=>$rowStudent['status'],
              	'count'=>$count,
              	
               ]);


      }


 ?>