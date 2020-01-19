<?php
  
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = faculty_records";    //changed from faculty records to faculty record
   $credentials = "user = priya password=jain_priya";

   $pg_db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$pg_db) {
      echo "Error : Unable to open database\n";
   } else {
     // echo "Opened database successfully\n";
   }
?>