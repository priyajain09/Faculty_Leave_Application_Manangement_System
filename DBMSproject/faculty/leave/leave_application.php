


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Leave Application Form</h3>

<div class="container">
  <form action="leave.php" method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name..">


    <label for="start_date">Start Date</label>
    <input type="text" id="start_date" name="start_date" placeholder="DD/MM/YYYY">


    <label for="end_date">End Date</label>
    <input type="text" id="end_date" name="end_date" placeholder="DD/MM/YYYY">
    
    <label for="num_leaves">Number of Days Required</label>
    <input type="Number" id="num_leaves" name="num_leaves" placeholder="number of leaves needed..."><br>

    <label for="title">Title</label>
    <select id="title" name="title">
      <option value="sick">Sick</option>
      <option value="vacation">Vacation</option>
      <option value="quitting">Quitting</option>
      <option value="Other">Other</option>
    </select>


    <label for="other_title">If other, specify</label>
    <input type="text" id="other_title" name="other_title" placeholder="other title...">

    <label for="comment">Comment</label>
    <textarea id="comment" name="comment" placeholder="add some comments.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
