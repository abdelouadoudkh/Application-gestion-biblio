<?php


require 'db.php';
$GLOBAL['mysqli'] = $mysqli;


/**
 * All Common Queries is Declared Here
 */
class Common
{
	
	
	function login($email,$password,$tblname) {

	$query = "SELECT * FROM ".$tblname." WHERE email='".$email."' AND password='".$password."' ";
	return $GLOBALS['mysqli']->query($query)->num_rows;

	}



	function myInsert($field, $data, $table){

    $field_values = implode(',', $field);
    $data_values  = implode("','", $data);

    $sql    = "INSERT INTO `$table`($field_values)VALUES('$data_values')";
    $result = $GLOBALS['mysqli']->query($sql);
 	 return $result;
  }


  	function myUpdate($table, $field, $where){

  		$col = array();

  		 foreach($field as $key => $val) {
  		 	if ($val != Null) {

  		 		$col[] = "$key = '$val'";

  		 	}
  		 }

  		 $sql = "UPDATE `$table` SET " .implode(',', $col) ."$where";
  		 $result = $GLOBALS['mysqli']->query($sql); 

    return $result;
  	}


function myBookQuantity($quantity, $isbn){
      if ($quantity > 0) {
        $sql = "UPDATE `books` SET quantity = quantity+'{$quantity}' WHERE isbn = '{$isbn}' ";
      }else if ($quantity < 0) {
        $sql = "UPDATE `books` SET quantity = quantity+'{$quantity}' WHERE isbn = '{$isbn}' ";
      }
      
       $result = $GLOBALS['mysqli']->query($sql); 
        return $result;
}



function myStudentDisable($student_id){
      
        $sql = "UPDATE `students` SET  status = '0' WHERE student_id = '{$student_id}' ";  
      
       $result = $GLOBALS['mysqli']->query($sql); 
        return $result;
}


function myReturnCheck($student_id){
      $sql = "SELECT * FROM `in-books` WHERE student_id = '{$student_id}' AND isReturn = 0 ";
      $result = $GLOBALS['mysqli']->query($sql); 
      if (mysqli_num_rows($result) == 0) {
        return true;
      }
      return false;
}


function myStudentCheck($student_id){
      $sql = "SELECT * FROM `students` WHERE student_id = '{$student_id}' AND status = 0 ";
      $result = $GLOBALS['mysqli']->query($sql); 
      if (mysqli_num_rows($result) == 0) {
        return true;
      }
      return false;
}


  function myDelete($table, $where){

    $sql = "DELETE FROM `$table` $where";
   
    $result = $GLOBALS['mysqli']->query($sql);
  
  	return $result;
  }



}



function myRealEscape($input){
	return mysqli_real_escape_String($GLOBALS['mysqli'], $input);
}

function getClean($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = myRealEscape($data);
	return $data;
}



/********************* Set Redirect **********************************/

function redirect($location){
  return header("location: {$location}");
}



/********************* Set Flase Message **********************************/

function set_message($message){
  
    if(!empty($message)){
    $_SESSION['message'] = $message;
  }
  
  else{
    $message = "";
  }
}


/********************* Flash Message **********************************/

function display_message(){
  if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}



/********************* Error Message **********************************/

function validate_errors($error_message){
  
$error_message = <<<DELIMITER
  
  <div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> $error_message
</div>

DELIMITER;

return $error_message;
}



/********************* Success Message **********************************/


function success($success_message){
  
$success_message = <<<DELIMITER
  
  <div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> $success_message
</div>

DELIMITER;

return $success_message;
}


