<?php 
    session_start();  
	require_once('./connection.php');
	$username = $_POST["username"];
    $password = $_POST["password"];

    $cursor = $collection->find();

    foreach($cursor as $document)
    {
    	if(strcmp($document["user_id"], $username)==0 && strcmp($document["password"], $password)==0)
      	{

            $_SESSION["user_id"] = $username; 
            $_SESSION["psw"] = $password;
            $_SESSION["bool_logged_in"] = 5;

        	$webadd = $document["web_add"];
            $_SESSION["webadd"] = "faculty/".$webadd;
            header("Location: home.php");
        	echo "same username $webadd";
        	
        }


    }
?>