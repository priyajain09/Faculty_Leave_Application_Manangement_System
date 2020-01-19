<?php 
 require_once('./connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CSE List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>List of Faculties of Computer Science and Engineering</h2>
  <div class="list-group">
  	<?php
  		$cursor = $collection->find(['department'=>'Computer Science and Engineering']);
  		

    foreach ($cursor as $document) {
    
      echo '<a href='.$document["web_add"].' class="list-group-item list-group-item-success">'.$document["name"]."\n".'<br><b> Email ID: </b>'.$document["email_id"]."\n".'<br><b>PhD: </b>'.$document["phd"].'<br><b>Research Interest: </b>'.$document["research_interests"].'</a>';
   }
   ?>
  </div>
</div>

</body>
</html>
