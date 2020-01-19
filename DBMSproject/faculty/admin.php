<?php 
 require_once('./postgres_connection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Admin Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      input {
  width: 50%;
}

      input[type=submit] {
  background-color: #DFF2F1;
  color: black;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 10%;
}

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      p.big{
        line-height: 1.5;
      }
      p.small{
        line-height: 1.5;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
 
     
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      
      </div>
      <div class="col-4 text-center">
      
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#">
          
        </a>
        
      </div>
    </div>
  </header>

  
      <!-- <a class="p-2 text-muted" href="#">Technology</a>
      <a class="p-2 text-muted" href="#">Design</a> -->
      <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" href="../start.php">LOGOUT</a>
      
    </nav>
  </div>

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h3> Admin </h3>
    </div>
  </div>

  
<div class = "list-group-item list-group-item-default">
  <p><b>Change HOD</b></p>

  <form action="" method="POST">
    <label for="n_hodcse">Select new HOD CSE</label>
    <select id="n_hodcse" name="n_hodcse">
      <option placeholder="select"></option>
      <option value="Anthony Achille">Anthony Achille</option>
      <option value="Harry Acosta">Harry Acosta</option>
      <option value="Mark Smith">Mark Smith</option>
    </select>
    <input type="submit" value="Submit" name="new_hod_cse">
  </form>

  <form action="" method="POST">
    <label for="n_hodme">Select new HOD ME</label>
    <select id="n_hodme" name="n_hodme">
      <option placeholder="select"></option>
      <option value="Anurag Agarwal">Anurag Agrawal</option>
      <option value="Annita Alting">Annita Alting</option>
      <option value="Punit Arora">Punit Arora</option>
    </select>
    <input type="submit" value="Submit" name="new_hod_me">
  </form>

  <form action="" method="POST">
    <label for="n_hodee">Select new HOD EE</label>
    <select id="n_hodee" name="n_hodee">
      <option placeholder="select"></option>
      <option value="Amir A.">Amir A.</option>
      <option value="Ethan Akin">Ethan Akin</option>
      <option value="Marvia Alston">Marvia Alston</option>
    </select>
    <input type="submit" value="Submit" name="new_hod_ee">
  </form>
  
              <?php
                 if(isset($_REQUEST['new_hod_cse']))
                  {
                    $n_hodcse = $_POST["n_hodcse"];
                    echo $n_hodcse;

                    $query1 = "UPDATE faculty SET designation = 'Faculty_CSE' WHERE designation = 'HOD_CSE' ";
                    $result = pg_query($pg_db, $query1);
                    if (!$result)
                    {
                        echo "Update failed!!";
                    }
                    else
                    {
                        echo "Update successfull;";
                    }  
                    $query2 = "UPDATE faculty SET designation = 'HOD_CSE' WHERE name = '$n_hodcse' " ;
                    $result2 = pg_query($pg_db, $query2);
                    if (!$result2)
                    {
                        echo "Update failed!!";
                    }
                    else
                    {
                        echo "Update successfull;";
                    }  
                  
                  }
              ?>

              <?php
                 if(isset($_REQUEST['new_hod_ee']))
                  {
                    $n_hodee = $_POST["n_hodee"];
                    echo $n_hodee;

                    $query1 = "UPDATE faculty SET designation = 'Faculty_EE' WHERE designation = 'HOD_EE' ";
                    $result = pg_query($pg_db, $query1);
                    if (!$result)
                    {
                        echo "Update failed!!";
                    }
                    else
                    {
                        echo "Update successfull;";
                    }  
                    $query2 = "UPDATE faculty SET designation = 'HOD_EE' WHERE name = '$n_hodee' " ;
                    $result2 = pg_query($pg_db, $query2);
                    if (!$result2)
                    {
                        echo "Update failed!!";
                    }
                    else
                    {
                        echo "Update successfull;";
                    }
                   
                  }
              ?>

              <?php
                 if(isset($_REQUEST['new_hod_me']))
                  {
                    $n_hodme = $_POST["n_hodme"];
                    echo $n_hodme;

                    $query1 = "UPDATE faculty SET designation = 'Faculty_ME' WHERE designation = 'HOD_ME' ";
                    $result = pg_query($pg_db, $query1);
                    if (!$result)
                    {
                        echo "Update failed!!";
                    }
                    else
                    {
                        echo "Update successfull;";
                    }  
                    $query2 = "UPDATE faculty SET designation = 'HOD_ME' WHERE name = '$n_hodme' " ;
                    $result2 = pg_query($pg_db, $query2);
                    if (!$result2)
                    {
                        echo "Update failed!!";
                    }
                    else
                    {
                        echo "Update successfull;";
                    }  
                  
                  }
              ?>

</div>
<div class = "list-group-item list-group-item-default">
  <p><b>Change route of application: </b></p>
  <form action="change_route.php" method = "post">
    <label for="new_route">Process 1 (For Faculty)</label>
    <input type="text" id="new_route" name="new_route" placeholder ="Eg. Faculty-HOD-Director">
    <input type="submit" value="Submit" name="process1">
  </form>
  <form action="change_route.php" method = "post">
    <label for="new_route">Process 2 (For HOD)   </label>
    <input type="text" id="new_route" name="new_route" placeholder ="Eg. HOD-Dean-Director">
    <input type="submit" value="Submit"  name="process2">
  </form>
  <form action="change_route.php" method = "post">
    <label for="new_route">Process 3 (For Associate Dean)</label>
    <input type="text" id="new_route" name="new_route" placeholder ="Eg. Associate Dean-Director">
    <input type="submit" value="Submit"  name="process3">
  </form>
  
  
</div>


  
  


  <footer class="blog-footer">
  
    <a href="#">Back to top</a>
  </p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
