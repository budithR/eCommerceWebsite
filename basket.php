<?php
    session_start();
    include("db.php");
    $pagename="Smart Basket"; //Create and populate a variable called $pagename 
    echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
    echo "<title>".$pagename."</title>";
    echo "<body>";
    include ("headFile.html");
    echo "<h4>".$pagename."</h4>";
    //if the value of the product id to be deleted (which was posted through the hidden field) is set 
    if (isset($_POST['del_prodid']))
    {
    //capture the posted product id and assign it to a local variable $delprodid 
    $delprodid=$_POST['del_prodid'];
    //unset the cell of the session for this posted product id variable
    unset ($_SESSION['basket'][$delprodid]);
    //display a "1 item removed from the basket" message
          echo "<p>1 item removed";
    }
    if (isset($_POST['h_prodid'])){
        $newprodid = $_POST['h_prodid'];
        $reququantity = $_POST['p_quantity'];
        //echo "<p>ID of selected product: ".$newprodid;
        //echo "<p>Quantity of selected product: ".$reququantity;
            $_SESSION['basket'][$newprodid]=$reququantity; //create a array - indexes are prodid and data will be quantities.
            echo "<p>1 item added";
    }else{
        echo "<p>Basket unchanged";
    }
    
    $total= 0; //Create a variable $total and initialize it to zero
//Create HTML table with header to display the content of the basket: prod name, price, selected quantity and subtotal 
echo "<p><table id='baskettable'>";
echo "<tr>";
echo "<th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th>Remove Product</th>";
echo "</tr>";
//if the session array $_SESSION['basket'] is set
if (isset($_SESSION['basket']))
{
    //loop through the basket session array for each data item inside the session using a foreach loop
    //to split the session array between the index and the content of the cell
    //for each iteration of the loop
    //store the id in a local variable $index & store the required quantity into a local variable $value
    foreach($_SESSION['basket'] as $index => $value)

        {
        //SQL query to retrieve from Product table details of selected product for which id matches $index
        //execute query and create array of records $arrayp
        $SQL="select prodId, prodName, prodPrice from Product where prodId=".$index;
        $exeSQL=mysqli_query($conn, $SQL) or die (mysql_error());
        $arrayp=mysqli_fetch_array($exeSQL);
        echo "<tr>";
        //display product name & product price using array of records $arrayp
        echo "<td>".$arrayp['prodName']."</td>";
        echo "<td>&pound".number_format($arrayp['prodPrice'],2)."</td>";
        // display selected quantity of product retrieved from the cell of session array and now in $value
        echo "<td style='text-align:center;'>".$value."</td>";
        //calculate subtotal, store it in a local variable $subtotal and display it
        $subtotal=$arrayp['prodPrice'] * $value;
        echo "<td>&pound".number_format($subtotal,2)."</td>";
        echo "<form action=basket.php method=post>";
        echo "<td>";
        echo "<input type=submit value='Remove' id='submitbtn'>";
        echo "</td>";
        echo "<input type=hidden name=del_prodid value=".$arrayp['prodId'].">"; 
        echo "</form>";
        echo "</tr>";
        //increase total by adding the subtotal to the current total
        $total=$total+$subtotal;
        }
}
//else display empty basket message
else
{
       echo "<p>Empty basket";
}

// Display total
echo "<tr>";
echo "<td colspan=4>TOTAL</td>";
echo "<td>&pound".number_format($total,2)."</td>";
echo "</tr>";

echo "</table>";
    echo "<br><p><a href='clearbasket.php'>CLEAR BASKET</a></p>";
    echo "<br><p>New homteq customers: <a href='signup.php'>Sign up</a></p><br>"; 
    echo "<p>Returning homteq customers: <a href='login.php'>Login</a></p>";
    //display name of the page as window title
    //include header layout file
    //display name of the page on the web page
    //display random text
    include("footfile.html"); //include head layout
    echo "</body>";
?>