<?php
 $servername = "localhost";
 $username   = "cliksip";
 $password   = "cliksip2018";
 $DBname     = "voxcrm";

 // Créer une connexion
 $conn = mysqli_connect($servername, $username, $password, $DBname);

 // Vérifier la connexion
 if (!$conn) {
     die("La connexion a echoue: " . mysqli_connect_error());
 }

// $mysqli = new mysqli("192.168.1.4", "cliksip", "cliksip2018", "voxcrm");

$sql = "SELECT ca.name As no, count( c.id ) as total FROM `campaigns_2` ca, contacts c WHERE c.cid = ca.id GROUP BY no";
$result = $conn->query($sql);

 


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>



<table>
<tr>
 <td>Campages</td>
<td>Totale Ficher</td>

</tr>
         <?php

            while($row = $result->fetch_assoc()) {?>
<tr>

<td><?php echo $row["no"];?></td>
<td><?php echo $row["total"];?></td>
</tr>

  <?php }
            
          ?>
</table>



<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
     <tr>
        <?php

            echo "<td>hello</td>";
        
        ?>
     </tr>
    </tbody>
  </table>
</div>

    
</body>
</html>

