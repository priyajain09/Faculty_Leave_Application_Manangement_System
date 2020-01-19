<?php
session_start();
$id=$_SESSION["user_id"];
$db = pg_connect("host=localhost port=5432 dbname=faculty_records user=priya password=jain_priya");

if(!$db) {
      echo "Error : Unable to open database\n";
   }

//echo $id;

$query ="SELECT curr_leaves , next_leaves from faculty where user_id = '$_SESSION[user_id]'";
$res = pg_query($query);
if(!$res) {
      echo pg_last_error($db);
      exit;
}
$row = pg_fetch_row($res);
echo "<h2>Remaining Leaves Of This Year</h2>".$row[0];
echo "<h2>Remaining Leaves Of Upcoming Year</h2>".$row[1];




$query = "SELECT * from application where user_id = '$id' and curr_status='pending'";
$ret = pg_query($db, $query);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   }

$row = pg_fetch_row($ret);
$bool = $row;
$application_id = $row[0];
$redirect_id = $row[12];
$_SESSION["application_id"]=$application_id;
//echo $application_id;

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
<h1>Pending Leave Application</h1>
<table style="width:100%">
<tr>
    <th>Name</th>
    <th>Designation</th> 
    <th>Reason</th>
    <th>Leaves Remaining</th>
    <th>Days</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Time</th>
  </tr>
  <tr>
    <td><?php echo $row[1]?></td>
    <td><?php echo $row[13]?></td>
    <td><?php echo $row[3]?></td>
    <td><?php echo $row[14]?></td>
    <td><?php echo $row[5]?></td>
    <td><?php echo $row[6]?></td>
    <td><?php echo $row[7]?></td>
    <td><?php echo $row[8]?></td>
</table>


<?php 
if($bool!=0)
{

echo "<h2>Comments on pending request</h2>";

$query = "SELECT user_id , time_stamp ,action_typ from action where application_id='$application_id'";
$ret = pg_query($db, $query);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   }



while($row = pg_fetch_row($ret))
{
	//echo "row: ".$row[1];
	$q= "SELECT name , designation from faculty where user_id ='".$row[0]."'";
	$res= pg_query($q);
	$r = pg_fetch_row($res);
	echo "Faculty: ".$r[0]."<br>";
	echo "Designation: ".$r[1]."<br>";
	echo "Action: ".$row[2]."<br>";
	echo "Time: ".$row[1]."<br><br>";

	$q="SELECT comment_txt from comments , action where action.user_id= comments.user_id_by and comments.user_id_by= '$row[0]' and action.time_stamp = comments.time_stamp and action.time_stamp = '$row[1]' and action.application_id = comments.application_id and comments.application_id = '$application_id'";
	$r = pg_query($q);
	while($p = pg_fetch_row($r))
	{
		echo "Comment: ".$p[0]."<br><br>";
	}
}   


}


if(strcmp($redirect_id,$id)!=0 and $bool!=0)
{
	echo '<h2>Respond:</h2>

<form action="add_comment.php" method="POST">
	<label for="content">Add comment</label><br>
	<textarea id ="content" name ="add_comment" style ="height:150px" rows="40" cols="80"></textarea>
  <input type="submit" value="Submit">
</form> ';

}




?>

<h1> History Of Leave Applications</h1>
<table style="width:100%">
<tr>
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


<?php 

$query = "SELECT * from application where user_id ='$id' and curr_status<> 'pending'";
$ret = pg_query($db, $query);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   }



while($row = pg_fetch_row($ret))
{

	echo '<tr>
    <td>'. $row[1].'</td>
    <td>'. $row[13].'</td>
    <td>'. $row[3].'</td>
    <td>'.$row[14].'</td>
    <td>'. $row[5].'</td>
    <td>'.$row[6].'</td>
    <td>'.$row[7].'</td>
    <td>'.$row[8].'</td>
    <td>'.$row[9].'</td>';

}

?>
</table>




</body>
</html>





