<?php
session_start();
$message="";
if(count($_POST)>0) {
$conn = mysql_connect("localhost","root","");
mysql_select_db("kazi_app",$conn);
$result = mysql_query("SELECT * FROM employee WHERE email='" . $_POST["user"] . "' and password = '". $_POST["pass"]."'",$conn);
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["email"] = $row[email];
$_SESSION["first_name"] = $row[first_name];
} else {
$message = "Invalid Email or Password!";
echo $message;
}
}
if(isset($_SESSION["email"])) {
header("Location:form.html.php");
}
?>
