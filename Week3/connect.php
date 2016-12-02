<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Connection</title>
  <Style> 
table,th,td {border:1px solid black;
border-collapse: collapse;}
th, td {padding: 5px}
</Style>
</head>
<body>
 <?php
$servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
$username = "bf45715e931f52";
$password = "39a05bfa";
$dbname = "lgtest";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  

  $name = $_GET["NAME"];
  $USR_NAME = $_GET["USR_NAME"];
  $age = $_GET["AGE"];
  $age = $_POST["ORDER_ID"];
  $age = $_POST["ITEMS_ORDERED"];
  
$sql = "SELECT NAME, USER_NAME, AGE, ORDER_ID, ITEMS_ORDERED FROM DATA join ORDERS on DATA.ORDER_ID = ORDERS.ID";


 $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // Output data of each row
   printf("\n\t<table><tr><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th>%s</th>",
       "Name", "User Name", "Age", "Order ID", "Items Ordered");
    while ($row = $result->fetch_assoc()) {
    printf("<tr> <td>%s</td> <td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
         $row["NAME"], $row["USR_NAME"], $row["AGE"], $row["ORDER_ID"], $row["ITEMS_ORDERED"]); 

  }
          
echo "</table>\n";
   
  } else {
   echo "0 results <br>";
  }
$conn->close();
?>
</body>
</html>