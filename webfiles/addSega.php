<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
		<title>Game List</title>
	</head>
  <body>
  <div class="header">
  HEADER
</div>
  <div class="menu">
    <a href="index.html">Home</a><br/>
    <a href="listGenesis.php">List Games</a><br/>
    <a href="addGames.php">Add Games</a>
    <a href="addSega.php">Add Sega</a>
  </div>
  <div class="main">
<?php
if(isset($_POST['add']))
{
  $servername = "localhost";
  $username = "gamesdb";
  $password = "f8sv*9av8";
  $dbname = "gamesDB";

  $CONN = mysql_connect($servername, $username, $password, $dbname);

  if (!$CONN) {
    die("Durp!  Connection Failed:  " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM segaGenesis";
  $result = mysqli_query($CONN, $sql);

  if(! get_magic_quotes_gpc() )
  {
    $gameTitle = addslashes ($_POST['gameTitle']);
    $gameDev = addslashes ($_POST['gameDev']);
    $gameDesc = addslashes ($_POST['gameDesc']);
    $gameRelease = addslashes ($_POST['gameRelease']);
    $gamePub = addslashes($_POST['gamePub']);
    $gameUPC = addslashes($_POST['gameUPC']);
    $gameISBN = addslashes($_POST['gameISBN']);
    $gameCart = addslashes($_POST['gameCart']);
  }
  else {
  $gameTitle = $_POST['gameTitle'];
  $gameDesc = $_POST['gameDesc'];
  $gameRelease = $_POST['gameRelease'];
  $gameDev = $_POST['gameDev'];
  $gamePub = $_POST['gamePub'];
  $gameUPC = $_POST['gameUPC'];
  $gameISBN = $_POST['gameISBN'];
  $gameCart = $_POST['gameCart'];
  }
  $sql = "INSERT INTO segaGenesis (title, releaseDate, developer, publisher, description, UPC, ISBN, cartID)".
    "VALUES ('$gameTitle','$gameRelease','$gameDev','$gamePub','$gameDesc','$gameUPC','$gameISBN','$gameCart')";
  mysql_select_db('gamesDB');
  $retval = mysql_query( $sql, $CONN );
  if(! $retval)
  {
    die('could not enter tha game:  ' . mysql_error());
  }
  echo "Entered game sucessfully!\n";
  mysql_close($CONN);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width=-"100">Title</td>
<td><input name="gameTitle" type="text" id="gameTitle"></td>
</tr>
<tr>
<td width="100">Release Date</td>
<td><input name="gameRelease" type="text" id="gameRelease"></td>
</tr>
<tr>
<td width="100">Developer</td>
<td><input name="gameDev" type="text" id="gameDev"></td>
</tr>
<tr>
<td width="100">Publisher</td>
<td><input name="gamePub" type="text" id="gamePub"></td>
</tr>
<tr>
<td width="100">Description</td>
<td><input name="gameDesc" type="text" id="gameDesc"></td>
</tr>
<tr>
<td width="100">UPC</td>
<td><input name="gameUPC" type="text" id="gameUPC"></td>
</tr>
<tr>
<td width="100">ISBN</td>
<td><input name="gameISBN" type="text" id="gameISBN"></td>
</tr>
<tr>
<td width="100">Cart ID</td>
<td><input name="gameCart" type="text" id="gameCart"></td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add Game">
</td>
</tr>
</table>
</form>
<?php
}
?>
  </div>
  </body>
</html>
