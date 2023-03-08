<?php
//session_start();




//session_start();
include("connection.php");


//include("checklogin.php");
//$_SESSION;
//$user_data = check_login($con);
//$ssn = $user_data['ssn'];

$db= $con;
$tableName = "reservations";
$columns = ['reservation_number','plateid', 'customerssn','officeid', 'daterental', 'datereturn', 'price'];
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns){
$_SESSION;
$user_data = check_login($db);
$ssn = $user_data['ssn'];
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);

$query = "SELECT "
.$columnName.
" FROM ".$tableName.
" where customerssn='$ssn'
 ORDER BY reservation_number DESC";
$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>