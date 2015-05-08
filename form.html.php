<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>form</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div>
<?php
if($_SESSION["first_name"]) {
$name=$_SESSION["first_name"];
echo "welcome ". $name. "! ";
?>
<a href="logout.php" title="Logout">Logout</a>
<?php
}
?>
</div>
 
<div>
 
<div class="container">
<h1>Time Sheet</h1>
<form role="form" action="insert.php" method="post">
<label>Project</label>
<select class="form-control" name="project" >
    <?php
            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'kazi_app';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $query="SELECT project_name FROM project";
            $result=mysql_query($query) or die ("Query to get data from project failed: ".mysql_error());
            
            while ($row=mysql_fetch_array($result)) {
            $project=$row["project_name"];
                echo "<option>
                    $project
                </option>";
            
            }
                
            ?>
</select>
<div class="form-group">
	<label>task</label>
	<input type="text" class="form-control" name="task" required>
</div>
<div class="form-group">
	<label>comment</label>
	<textarea name="comment" class="form-control" cols="10" rows="10" required></textarea>
</div>
<div class="form-group">
	<label>Date</label>
	<input type="date" class="form-control" name="date" required>
</div>
<div class="form-group">
	<button type="submit"  class="btn btn-default">Add</button>
</div> 
</form>
<h3>Tasks Done</h3>
<ul class="list-group">
	<?php
            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'kazi_app';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $query1="SELECT task FROM task2";
            $result1=mysql_query($query1) or die ("Query to get data from project failed: ".mysql_error());
            
            while ($row=mysql_fetch_array($result1)) {
            $task=$row["task"];
                echo "<li class='list-group-item list-group-item-success'>
                    $task
                </li>";
            
            }
                
            ?>
</ul>
</div>
</body>
</html>
