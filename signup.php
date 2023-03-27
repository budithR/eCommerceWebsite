<?php
$pagename="Sign Up"; //Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headFile.html");
echo "<h4>".$pagename."</h4>";
//display name of the page as window title
//include header layout file
//display name of the page on the web page
//display random text
//create a HTML form to capture the user's details
echo "<form method=post action=signup_process.php>" ;
echo "<table style='border: 0px'>";
echo "<tr><td style='border: 0px'>First Name </td>";
echo "<td style='border: 0px'><input type=text name=r_firstname size=35></td></tr>";
$fname=trim($_POST['r_firstname']);
echo "<tr><td style='border: 0px'>Last Name </td>";
echo "<td style='border: 0px'><input type=text name=r_lastname size=35></td></tr>";
echo "<tr><td style='border: 0px'>Address </td>";
echo "<td style='border: 0px'><input type=text name=r_address size=35></td></tr>";
echo "<tr><td style='border: 0px'>Postcode </td>";
echo "<td style='border: 0px'><input type=text name=r_postcode size=35></td></tr>";
echo "<tr><td style='border: 0px'>Tel No </td>";
echo "<td style='border: 0px'><input type=text name=r_telno size=35></td></tr>";
echo "<tr><td style='border: 0px'>Email Address </td>";
echo "<td style='border: 0px'><input type=text name=r_email size=35></td></tr>";
echo "<tr><td style='border: 0px'>Password </td>";
echo "<td style='border: 0px'><input type=password name=r_password1 maxlength=10 size=35></td></tr>";
echo "<tr><td style='border: 0px'>Confirm Password </td>";
echo "<td style='border: 0px'><input type=password name=r_password2 maxlength=10 size=35></td></tr>";
echo "<tr>";
echo "<td style='border: 0px'><input type=submit value='Sign Up' name='submitbtn' id='submitbtn'></td>"; 
echo "<td style='border: 0px'><input type=reset value='Clear Form' name='submitbtn' id='submitbtn'> </td>"; 
echo "</tr>";
echo "</table>";
echo "</form>" ;

//Capture and trim the 7 inputs entered in the the 7 fields of the form using the $_POST superglobal variable //Store these details into a set of 7 new local variables
$fname=trim($_POST['r_firstname']);
$lname=trim($_POST['r_lastname']);
$address=trim($_POST['r_address']); 
$postcode=trim($_POST['r_postcode']); 
$telno=trim($_POST['r_telno']); 
$email=trim($_POST['r_email']); 
$password1=trim($_POST['r_password1']); 
$password2=trim($_POST['r_password2']);
//Write a SQL query to insert a new user into Users table
$SQL="insert into Users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword)
values ('C','".$fname."','".$lname."','".$address."','".$postcode."', '".$telno."', '".$email."', '".$password1."')"; //Execute the INSERT INTO SQL query
mysqli_query($conn, $SQL);
include("footfile.html"); //include head layout
echo "</body>";
?>