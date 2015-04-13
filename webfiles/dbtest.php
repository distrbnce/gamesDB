<?php
$servername = "localhost";
$username = "gamesdb";
$password = "f8sv*9av8";
$dbname = "gamesDB";

$CONN = mysqli_connect($servername, $username, $password, $dbname);

if (!$CONN) {
	die("Durp!  Connection Failed:  " . mysqli_connect_error());
}

$sql = "SELECT * from myGames";
$result = mysqli_query($CONN, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table border=1><tr><th>Title</th><th>Platform</th><th>Description</th><th>Release</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["title"]."</td><td>".$row["platform"]."</td><td> ".$row["description"]."</td><td>".$row["release"]."</td></tr>";
	}
	echo "</table>";
} else { echo "0 results";
}
$conn->close();
?>
