<!DOCTYPE html>
<html>
	<head>
<!--		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>-->
		<title>Game List</title>
	</head>
  <body>
  <div class="header">
  Sega Genesis Games 
</div>
  <div class="menu">
    <a href="index.html">Home</a><br/>
    <a href="listGenesis.php">List Games</a><br/>
    <a href="addGames.php">Add Games</a>
    <a href="addSega.php">Add Sega</a>
  </div>
  <div class="main">
<?php
  $servername = "localhost";
  $username = "gamesdb";
  $password = "f8sv*9av8";
  $dbname = "gamesDB";

  $CONN = mysqli_connect($servername, $username, $password, $dbname);

  if (!$CONN) {
    die("Durp!  Connection Failed:  " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM segaGenesis ORDER BY title";
  $result = mysqli_query($CONN, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table border=1><tr><th>Title</th><th>Release</th><th>Developer</th><th>Publisher</th><th>Description</th><th>UPC</th><th>Cart ID</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>".$row["title"]."</td><td>".$row["release"]."</td><td> ".$row["developer"]."</td><td>".$row["publisher"]."</td><td>".$row["description"]."</td><td>".$row["UPC"]."</td><td>".$row["cartID"]."</td></tr>";
    }
    echo "</table>";
  } else { echo "0 results";}
$CONN->close();
?>
  </div>
  </body>
</html>
