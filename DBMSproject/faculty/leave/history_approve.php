<?php 
session_start();
//echo $_SESSION["user_id"];
$id=$_SESSION["user_id"];
$db = pg_connect("host=localhost port=5432 dbname=faculty_records user=priya password=jain_priya");


 $query = "SELECT application_id , user_id from action where user_id='$id' group by application_id , user_id";
 $res = pg_query($query);
 if(!$res) {
      echo pg_last_error($db);
      exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
<h1>History Of Leave Applications</h1>
<?php 

while($roww= pg_fetch_row($res))
{
	$query = "SELECT * from application where application_id='$roww[0]' and user_id<> '$id'";
	$result = pg_query($query);
 	if(!$result) {
      echo pg_last_error($db);
      exit;
	}

	while($row = pg_fetch_row($result))
	{

	echo '
	<table style="width:100%">
	<tr>
	<th>Application ID</th>
    <th>Name</th>
    <th>Designation</th> 
    <th>Reason</th>
    <th>Leaves Remaining</th>
    <th>Days</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Time</th>
    <th>Status</th>
  </tr>
  <tr>
	<td>'.$row[0].'</td>
    <td>'. $row[1].'</td>
    <td>'. $row[13].'</td>
    <td>'. $row[3].'</td>
    <td>'.$row[14].'</td>
    <td>'. $row[5].'</td>
    <td>'.$row[6].'</td>
    <td>'.$row[7].'</td>
    <td>'.$row[8].'</td>
    <td>'.$row[9].'</td>
   </tr>
</table>';
	echo '<h2>Comment Section</h2>';

	$q = "SELECT user_id_by , user_id_to , comment_txt, time_stamp from comments where (user_id_by='$roww[1]' or user_id_to='$roww[1]') and application_id = '$roww[0]'";
	$r= pg_query($q);
	 while($rw= pg_fetch_row($r))
	 {
	 	echo "From: ".$rw[0]."<br>
	 	To: ".$rw[1]."<br>
	 	comment: ".$rw[2]."<br>
	 	time: ".$rw[3]."<br><br>";
	 }
	 echo '<h2>Actions</h2>';

	 $query = "SELECT action_typ , time_stamp from action where application_id='$roww[0]' and user_id = '$roww[1]'";

	 $r = pg_query($query);
	 while($rw = pg_fetch_row($r))
	 {
	 	echo "Action Taken: ".$rw[0]."<br>";
	 	echo "Time: ".$rw[1]."<br><br>";
	 }
}

}

?>
</body>
</html>