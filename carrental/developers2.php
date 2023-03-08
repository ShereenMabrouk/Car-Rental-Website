<?php
include("connection.php");
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
      $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY model DESC";
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

function filter($db, $tableName, $columns)
{
   if (empty($db)) {
      $msg = "Database connection error";
   } elseif (empty($columns) || !is_array($columns)) {
      $msg = "columns Name must be defined in an indexed array";
   } elseif (empty($tableName)) {
      $msg = "Table Name is empty";
   } else {
      $columnName = implode(", ", $columns);
      $query = "SELECT " . $columnName . " FROM`office` NATURAL JOIN `car` NATURAL JOIN `specs` WHERE `model` LIKE '%" . $_POST["models"] . "%' AND `milage` BETWEEN " . $_POST["miles"] . " AND " . $_POST["miles2"] . " AND `color` LIKE '%" . $_POST["colors"] . "%' AND `officeloc` LIKE '%" . $_POST["locs"] . "%' AND `year` BETWEEN " . $_POST["years"] . " AND " . $_POST["years2"] . " AND `cc` BETWEEN " . $_POST["ccs"] . " AND " . $_POST["ccs2"] ." AND `dailypayment` BETWEEN " . $_POST["pay1"] . " AND " . $_POST["pay2"] . " ORDER BY model DESC";
      // echo $query;
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
         $today = date("Y-m-d");
         //echo $today;
         $query = "SELECT * FROM `reservations` WHERE plateid = '$plate' AND (
        '$today' BETWEEN daterental  AND  datereturn );";
         $result = mysqli_query($con, $query);
        // echo mysqli_num_rows($result);
         if ($result && mysqli_num_rows($result) > 0) {
            $reservedcar = mysqli_fetch_assoc($result);
//echo 'hi';
            $reservedcarid = $reservedcar['plateid'];
            $sql = "UPDATE car SET status='rented' WHERE plateid='$reservedcarid'";
            mysqli_query($con, $sql);
         }

         $query = "SELECT * FROM `car` WHERE plateid = '$plate' AND status='rented'";
         $result = mysqli_query($con, $query);
         if ($result && mysqli_num_rows($result) > 0) {
            $rentedcar = mysqli_fetch_assoc($result);

            $rentedcarid = $rentedcar['plateid'];
            $query = "SELECT * FROM `reservations` WHERE plateid = '$rentedcarid' AND NOT (
        '$today' BETWEEN daterental  AND  datereturn );";
            $result2 = mysqli_query($con, $query);

            if ($result2 && mysqli_num_rows($result2) > 0) {
               $donereserve = mysqli_fetch_assoc($result2);

               $donereserveid = $donereserve['plateid'];
               $sql = "UPDATE car SET status='active' WHERE plateid='$donereserveid'";
               mysqli_query($con, $sql);
            }
         }

         $query = "SELECT * FROM `reservations` WHERE `plateid` LIKE '" . $plate . "' AND (`daterental` BETWEEN '" . date("Y-m-d", strtotime($_POST["firstd"])) . "' AND '" . date("Y-m-d", strtotime($_POST["secondd"])) . "' OR `datereturn` BETWEEN '" . date("Y-m-d", strtotime($_POST["firstd"])) . "' AND '" . date("Y-m-d", strtotime($_POST["secondd"])) . "');";
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
