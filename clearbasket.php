<?php
session_start();
include("db.php");
$pagename="Clear Smart Basket"; //Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headFile.html");
echo "<h4>".$pagename."</h4>";
unset($_SESSION['basket']);
//display name of the page as window title
//include header layout file
//display name of the page on the web page
//display random text
echo "Your basket has been cleared";
include("footfile.html"); //include head layout
echo "</body>";
?>