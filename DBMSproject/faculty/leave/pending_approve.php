<?php 
session_start();
//echo $_SESSION["user_id"];
$id=$_SESSION["user_id"];
$db = pg_connect("host=localhost port=5432 dbname=faculty_records user=priya password=jain_priya");


$query = "SELECT * from application where curr_state_id= '$id' and curr_status='pending'";
$ret = pg_query($query);
if(!$ret) 
{
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


<h1> Pending Applications</h1>


<?php 


while($row = pg_fetch_row($ret))
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

	$q = "SELECT user_id_by , user_id_to , comment_txt, time_stamp from comments where (user_id_by='$id' or user_id_to='$id') and application_id = '$row[0]'";
	$r= pg_query($q);
	 while($rw= pg_fetch_row($r))
	 {
	 	echo "From: ".$rw[0]."<br>
	 	To: ".$rw[1]."<br>
	 	comment: ".$rw[2]."<br>
	 	time: ".$rw[3]."<br><br>";
	 }
}
?>


<h2>Respond:</h2>

<form action="respond_comment.php" method="POST">
	Application ID:<br>
  <input type="Number" name="application_id" placeholder="5">
  <br>
	<label for="content">Add comment</label><br>
	<textarea id ="content" name ="add_comment" style ="height:150px" rows="40" cols="80"></textarea>
  <input type="submit" name="approve" value="Approve">
  <input type="submit" name="reject" value="Reject">
  <input type="submit" name="redirect" value ="Redirect">
</form> 

</body>
</html>



