<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqlserver="localhost";
$mysqlusername="root";
$mysqlpassword="";
$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
$dbname = 'kazi_app';
mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
// Escape user inputs for security

$date = mysql_real_escape_string( $_POST['date']);
$task = mysql_real_escape_string( $_POST['task']);
$comments = mysql_real_escape_string( $_POST['comment']);
//attemp to get project id
$projects=mysql_real_escape_string($_POST["project"]);
 if ( isset( $_POST["project"] ) ) {

 $query2="SELECT pid FROM project WHERE project_name='$projects'";
        $result2=mysql_query($query2, $link) or die ("Query to get data from project failed: ".mysql_error());
            
        while ($row=mysql_fetch_array($result2)) {
        $pid=$row["pid"];
	}
}
 //attempt to get employee id
 $email=$_SESSION["email"];
 if (isset($_SESSION["email"])){
 
 $query="SELECT eid FROM employee WHERE email='$email'";
            $result=mysql_query($query) or die ("Query to get data from employee failed: ".mysql_error());
            
            while ($row=mysql_fetch_array($result)) {
            $eid=$row["eid"];
             
            
            }
 }
// attempt insert query execution
$sql = "INSERT INTO task2 (eid, pid, date_done,task,comments) VALUES ('$eid', '$pid', '$date','$task','$comments')";
if(mysql_query($sql)){
    echo "Records added successfully.";
	header("Location:form.html.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysql_error();
}
 
// close connection
mysql_close();
?>
