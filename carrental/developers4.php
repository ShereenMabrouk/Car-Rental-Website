<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

   $datereturn = $_POST['daterental'];
   $datereturn = $_POST['datereturn'];
}

$db = $con;
$tableName = "car";
$columns = ['plateid', 'model', 'status', 'officeid', 'dailypayment', 'milage', 'color'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns)
{
   if (empty($db)) {
      $msg = "Database connection error";
   } elseif (empty($columns) || !is_array($columns)) {
      $msg = "columns Name must be defined in an indexed array";
   } elseif (empty($tableName)) {
      $msg = "Table Name is empty";
   } else {
      $columnName = implode(", ", $columns);
      $query = "SELECT " . $columnName . " FROM $tableName" . " where status='active' ORDER BY plateid DESC";
      $result = $db->query($query);
      if ($result == true) {
         if ($result->num_rows > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $msg = $row;
         } else {
            $msg = "No Data Found";
         }
      } else {
         $msg = mysqli_error($db);
      }
   }
   return $msg;
}

function check_status($arr)
{
   include("connection.php");
   $db = $con;
   $plate = array_column($arr, 'plateid');
   $stat = array_column($arr, 'status');
   if (empty($db)) {
      echo "empty database";
   } else {
      $i = 0;
      foreach ($plate as $plate) {
         $query = "SELECT * FROM `reservations` WHERE `plateid` LIKE '" . $plate . "' AND (`daterental` BETWEEN '" . date("Y-m-d", strtotime($_POST["daterental"])) . "' AND '" . date("Y-m-d", strtotime($_POST["datereturn"])) . "' OR `datereturn` BETWEEN '" . date("Y-m-d", strtotime($_POST["daterental"])) . "' AND '" . date("Y-m-d", strtotime($_POST["datereturn"])) . "');";
         $result = $db->query($query);
         if ($result == true) {
            if ($result->num_rows > 0) {
               $stat[$i] = 'rented';
            }
         }
         $i++;
      }
   }
   return $stat;
}