<?php
   // connect to mongodb
   $m = new MongoClient();
	
   // select a database
   $db = $m->FacultyPortal;
   
   $collection = $db->faculty;
   
?>