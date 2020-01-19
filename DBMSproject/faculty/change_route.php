<?php
	require_once('./postgres_connection.php');

	if(isset($_REQUEST['process1']))
	{
		$route = $_POST["new_route"];
   		$array = explode("-", $route);
		$count = count($array);

		$query1 = "DELETE FROM transition WHERE process_typ = 'Faculty_CSE' OR process_typ = 'Faculty_ME'  OR process_typ = 'Faculty_EE' ";
        $result = pg_query($pg_db, $query1);
                   
        $csearr = $array;
        $eearr  = $array;
        $mearr  = $array;

        for($x = 0; $x < $count; $x++)
        {
        	if(strcmp($csearr[$x], "Faculty") == 0)
        	{
        		$csearr[$x] = "Faculty_CSE";
        	}
        	if(strcmp($eearr[$x], "Faculty") == 0)
        	{
        		$eearr[$x] = "Faculty_EE";
        	}
        	if(strcmp($mearr[$x], "Faculty") == 0)
        	{
        		$mearr[$x] = "Faculty_ME";
        	}
        	if(strcmp($csearr[$x], "HOD") == 0)
        	{
        		$csearr[$x] = "HOD_CSE";
        	}
        	if(strcmp($eearr[$x], "HOD") == 0)
        	{
        		$eearr[$x] = "HOD_EE";
        	}
        	if(strcmp($mearr[$x], "HOD") == 0)
        	{
        		$mearr[$x] = "HOD_ME";
        	}
        	if(strcmp($csearr[$x], "Dean") == 0)
        	{
        		$csearr[$x] = "Dean Faculty Affairs";
        	}
        	if(strcmp($eearr[$x], "Dean") == 0)
        	{
        		$eearr[$x] = "Dean Faculty Affairs";
        	}
        	if(strcmp($mearr[$x], "Dean") == 0)
        	{
        		$mearr[$x] = "Dean Faculty Affairs";
        	}
        	if(strcmp($csearr[$x], "Associate Dean") == 0)
        	{
        		$csearr[$x] = "Associate Dean Faculty Affairs";
        	}
        	if(strcmp($eearr[$x], "Associate Dean") == 0)
        	{
        		$eearr[$x] = "Associate Dean Faculty Affairs";
        	}
        	if(strcmp($mearr[$x], "Associate Dean") == 0)
        	{
        		$mearr[$x] = "Associate Dean Faculty Affairs";
        	}
        }


        for ($x = 0; $x < $count-1; $x++) 
        {
        	$y = $x +1;
    		$query = "INSERT INTO transition values ('Faculty_CSE', '$csearr[$x]' , '$csearr[$y]') " ;
    		$result = pg_query($pg_db, $query);
    		
    		$query = "INSERT INTO transition values ('Faculty_ME', '$mearr[$x]' , '$mearr[$y]') " ;
    		$result = pg_query($pg_db, $query);
    		
    		$query = "INSERT INTO transition values ('Faculty_EE', '$eearr[$x]' , '$eearr[$y]') " ;
    		$result = pg_query($pg_db, $query);
    		
		}
		$y = $count -1; 
		$query = "INSERT INTO transition values ('Faculty_CSE', '$csearr[$y]' , 'end') " ;
    	$result = pg_query($pg_db, $query);

    	$query = "INSERT INTO transition values ('Faculty_ME', '$mearr[$y]' , 'end') " ;
    	$result = pg_query($pg_db, $query);

    	$query = "INSERT INTO transition values ('Faculty_EE', '$eearr[$y]' , 'end') " ;
    	$result = pg_query($pg_db, $query);

        echo '<p>root changed</p><a href = "admin.php">Go Back</a>' ;
                    
	}

	if(isset($_REQUEST['process2']))
	{
		$route = $_POST["new_route"];
   		$array = explode("-", $route);
		$count = count($array);

		$query1 = "DELETE FROM transition WHERE process_typ = 'HOD_CSE' OR process_typ = 'HOD_ME'  OR process_typ = 'HOD_EE' ";
        $result = pg_query($pg_db, $query1);
                   
        $csearr = $array;
        $eearr  = $array;
        $mearr  = $array;

        for($x = 0; $x < $count; $x++)
        {
        	if(strcmp($csearr[$x], "HOD") == 0)
        	{
        		$csearr[$x] = "HOD_CSE";
        	}
        	if(strcmp($eearr[$x], "HOD") == 0)
        	{
        		$eearr[$x] = "HOD_EE";
        	}
        	if(strcmp($mearr[$x], "HOD") == 0)
        	{
        		$mearr[$x] = "HOD_ME";
        	}
        	if(strcmp($csearr[$x], "Dean") == 0)
        	{
        		$csearr[$x] = "Dean Faculty Affairs";
        	}
        	if(strcmp($eearr[$x], "Dean") == 0)
        	{
        		$eearr[$x] = "Dean Faculty Affairs";
        	}
        	if(strcmp($mearr[$x], "Dean") == 0)
        	{
        		$mearr[$x] = "Dean Faculty Affairs";
        	}
        	if(strcmp($csearr[$x], "Associate Dean") == 0)
        	{
        		$csearr[$x] = "Associate Dean Faculty Affairs";
        	}
        	if(strcmp($eearr[$x], "Associate Dean") == 0)
        	{
        		$eearr[$x] = "Associate Dean Faculty Affairs";
        	}
        	if(strcmp($mearr[$x], "Associate Dean") == 0)
        	{
        		$mearr[$x] = "Associate Dean Faculty Affairs";
        	}
        }


        for ($x = 0; $x < $count-1; $x++) 
        {
        	$y = $x +1;
    		$query = "INSERT INTO transition values ('HOD_CSE', '$csearr[$x]' , '$csearr[$y]') " ;
    		$result = pg_query($pg_db, $query);
    		
    		$query = "INSERT INTO transition values ('HOD_ME', '$mearr[$x]' , '$mearr[$y]') " ;
    		$result = pg_query($pg_db, $query);
    		
    		$query = "INSERT INTO transition values ('HOD_EE', '$eearr[$x]' , '$eearr[$y]') " ;
    		$result = pg_query($pg_db, $query);
    		
		}
		$y = $count -1; 
		$query = "INSERT INTO transition values ('HOD_CSE', '$csearr[$y]' , 'end') " ;
    	$result = pg_query($pg_db, $query);

    	$query = "INSERT INTO transition values ('HOD_ME', '$mearr[$y]' , 'end') " ;
    	$result = pg_query($pg_db, $query);

    	$query = "INSERT INTO transition values ('HOD_EE', '$eearr[$y]' , 'end') " ;
    	$result = pg_query($pg_db, $query);

        echo '<p>root changed</p><a href = "admin.php">Go Back</a>' ;
                    
	}

	if(isset($_REQUEST['process3']))
	{
		$route = $_POST["new_route"];
   		$array = explode("-", $route);
		$count = count($array);

		$query1 = "DELETE FROM transition WHERE process_typ = 'Associate Dean Faculty Affairs' ";
        $result = pg_query($pg_db, $query1);

        for($x = 0; $x < $count; $x++)
        {
        	
        	if(strcmp($array[$x], "Associate Dean") == 0)
        	{
        		$array[$x] = "Associate Dean Faculty Affairs";
        	}
        	if(strcmp($array[$x], "Dean") == 0)
        	{
        		$array[$x] = "Dean Faculty Affairs";
        	}
        }


        for ($x = 0; $x < $count-1; $x++) 
        {
        	$y = $x +1;
    		$query = "INSERT INTO transition values ('Associate Dean Faculty Affairs', '$array[$x]' , '$array[$y]') " ;
    		$result = pg_query($pg_db, $query);
		}
		$y = $count -1; 
		$query = "INSERT INTO transition values ('Associate Dean Faculty Affairs', '$array[$y]' , 'end') " ;
    	$result = pg_query($pg_db, $query);

        echo '<p>root changed</p><a href = "admin.php">Go Back</a>' ;

	}

?>