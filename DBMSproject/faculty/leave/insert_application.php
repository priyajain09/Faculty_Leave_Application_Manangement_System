<?php
session_start();
$id =$_SESSION["user_id"];
$db = pg_connect("host=localhost port=5432 dbname=faculty_records user=priya password=jain_priya");


$query = "SELECT  user_id , curr_status from application ";

$ret = pg_query($db ,$query);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } 
while ($row = pg_fetch_row($ret)) {
	if(strcmp($row[0] , $id )==0 && strcmp($row[1], "pending")==0 )
	{
		header('Location:error_leave.php',false);
		exit;
	}
	# code...
}

$query = "SELECT  designation ,curr_leaves from faculty where user_id= '$id' ";
$result = pg_query($db , $query);
 if(!$result) {
      echo pg_last_error($db);
      exit;
}

$row = pg_fetch_row($result);

$curr_state = $row[0];
$process_typ = $curr_state;
$leaves_remaining= $row[1];

//echo "process_id: ".$process_typ."curr_state: ".$curr_state;

$query = "SELECT  next_state from transition where process_typ ='$process_typ' and curr_state = '$curr_state' ";
$result = pg_query($query);
 if(!$result) {
      echo pg_last_error($db);
      exit;
}    

$row = pg_fetch_row($result);
$next_state = $row[0];

$query = "SELECT  user_id from faculty where designation= '$next_state' ";
$result = pg_query($query);
 if(!$result) {
      echo pg_last_error($db);
      exit;
}

$row = pg_fetch_row($result);
$curr_state_id = $row[0];
$process_id=1;

//echo "leaves: ".$_SESSION["num_leaves"];

$query = "INSERT INTO application VALUES (default,'$_SESSION[name]','$id','$_SESSION[title]','$_SESSION[comment]','$_SESSION[num_leaves]',to_date('$_SESSION[start_date]','DD/MM/YYYY'),to_date('$_SESSION[end_date]','DD/MM/YYYY'),current_timestamp,'pending','$curr_state_id','$process_id','$id','$process_typ','$leaves_remaining')";
 $result = pg_query($query); 
 echo "Successfully posted the application!!";
 pg_close($db);
 echo '<a href="../../home.php" >Back to home page</a>';
?>

