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
  

  $name = $_POST["NAME"];
  $usr_name = $_POST["USR_NAME"];
  $email = $_POST["AGE"];
  
  $sql = "SELECT NAME, USER_NAME, AGE, order_id, items_ordered FROM `data` join orders on data.order_id = orders.ID";

 $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // Output data of each row
   printf("\n\t<table><tr><th>%s</th><th>%s</th><th>%s</th>",
       "Name", "User Name", "Age");
    while ($row = $result->fetch_assoc()) {
    printf("<tr> <td>%s</td> <td>%s</td><td>%s</td></tr>",
         $row["NAME"], $row["USR_NAME"], $row["AGE"]); 

  }//seeing if this works
          // printf("%s, %s<br>", $row["LNAME"], $row["FNAME"]);
echo "</table>\n";
   
  } else {
   echo "0 results <br>";
  }
$conn->close();
?>
</body>
</html>