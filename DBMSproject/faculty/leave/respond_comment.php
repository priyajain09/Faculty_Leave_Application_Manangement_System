<?php
session_start();
//echo $_SESSION["user_id"];
$id=$_SESSION["user_id"];
$db = pg_connect("host=localhost port=5432 dbname=faculty_records user=priya password=jain_priya");

$query = "SELECT user_id ,process_typ,num_leaves, leaves_remaining  from application where application_id ='$_POST[application_id]'";
$result = pg_query($db , $query);
 if(!$result) {
      echo pg_last_error($db);
      exit;
}

$row= pg_fetch_row($result);
$faculty_id = $row[0];
$process_typ= $row[1];
$leaves_want = $row[2];
$leaves_remaining=$row[3];

$query = "SELECT designation from faculty where user_id ='$_SESSION[user_id]'";
$result = pg_query($db , $query);
 if(!$result) {
      echo pg_last_error($db);
      exit;
}
$row= pg_fetch_row($result);
$curr_state= $row[0];
$flag=1;




/////?????????????????????????
if(isset($_REQUEST['approve']))
{
	$action_typ="approve";
	$flag=0;
	$query = "SELECT  next_state from transition where process_typ ='$process_typ' and curr_state = '$curr_state' ";
	$result = pg_query($query);
 	if(!$result) {
      echo pg_last_error($db);
      exit;
	}    

	$row = pg_fetch_row($result);
	$next_state = $row[0];


	if(strcmp($next_state,'end')==0)
	{
		$flag=1;
		$query = "UPDATE application  set curr_status='Approved' , curr_state_id= '$faculty_id' where application_id= '$_POST[application_id]'";
		$result = pg_query($query);
 		if(!$result) {
      	echo pg_last_error($db);
      	exit;
		}  

		$query = "SELECT curr_leaves, next_leaves from faculty where user_id='$faculty_id'";
		$w= pg_query($query);
		 if(!$w) {
      	echo pg_last_error($db);
      	exit;
		} 

		$q = pg_fetch_row($w); 
		$current_leaves= $q[0];
		$next_year_leaves= $q[1];

		if($current_leaves>=$leaves_want)   
		{
			$borrow = $curr_leaves - $leaves_want;
			$query = "UPDATE faculty set curr_leaves = '$borrow' where user_id = '$faculty_id'";
			$result = pg_query($query);
 			if(!$result) {
      		echo pg_last_error($db);
      		exit;
			}  
		}
		else //leaves borrowed from next year
		{
			$borrow= $leaves_want-$current_leaves;
			$borw= $next_year_leaves- $borrow;
			$query = "UPDATE faculty set curr_leaves = 0 , next_leaves = '$borw' where user_id = '$faculty_id'";
			$result = pg_query($query);
 			if(!$result) {
      		echo pg_last_error($db);
      		exit;
			} 

		}
	}
	else
	{
		$query = "SELECT  user_id from faculty where designation= '$next_state' ";
		$result = pg_query($query);
 		if(!$result) {
      	echo pg_last_error($db);
      	exit;
		}

		$row = pg_fetch_row($result);
		$next_state_id = $row[0];
		$query = "UPDATE application  set curr_state_id= '$next_state_id' where application_id= '$_POST[application_id]'";
		$result = pg_query($query);
 		if(!$result) {
      	echo pg_last_error($db);
      	exit;
		}  
	}	

}



if(isset($_REQUEST['reject']))
{

	$action_typ="reject";
	$query = "UPDATE application  set curr_status='Rejected' , curr_state_id= '$faculty_id' where application_id= '$_POST[application_id]'";
		$result = pg_query($query);
 		if(!$result) {
      	echo pg_last_error($db);
      	exit;
		}  



}

if(isset($_REQUEST['redirect']))
{
	$action_typ="redirect";
	$query = "UPDATE application  set curr_state_id= '$faculty_id', redirect_id='$_SESSION[user_id]' where application_id= '$_POST[application_id]'";
		$result = pg_query($query);
 		if(!$result) {
      	echo pg_last_error($db);
      	exit;
		} 
}

$time = date('Y-m-d H:i:s');


if($flag==1)
{
	$query = "INSERT into comments values ('$_POST[application_id]','$_POST[add_comment]', '$time','$_SESSION[user_id]','$faculty_id' )";
	$result = pg_query($query);
 	if(!$result) {
    echo pg_last_error($db);
    exit;
	}

}
else
{
	$query = "INSERT into comments values ('$_POST[application_id]','$_POST[add_comment]', '$time','$_SESSION[user_id]','$next_state_id' )";
	$result = pg_query($query);
 	if(!$result) {
    echo pg_last_error($db);
    exit;
	}


}

$query = "INSERT into action values ('$_POST[application_id]' ,'$_SESSION[user_id]' , '$action_typ' , '$time')";


$result = pg_query($query);
 	if(!$result) {
    echo pg_last_error($db);
    exit;
	}


echo "Responded!!"."<br>";
echo '<a href="show_approve_page.php" >Back </a>';

?>