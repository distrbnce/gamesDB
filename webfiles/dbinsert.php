<html>
<head>
<title>Adding a new game record to database</title>
</head>
<body>
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

if(! get_magic_quotes_gpc() )
{
	$gameTitle = addslashes ($_POST['gameTitle']);
	$gamePlatform = addslashes ($_POST['gamePlatform']);
	$gameDesc = addslashes ($_POST['gameDesc']);
	$gameRelease = addslashes  ($_POST['gameRelease']);
}
else
{
	$gameTitle = $_POST['gameTitle'];
	$gamePlatform = $_POST['gamePlatform'];
	$gameDesc = $_POST['gameDesc'];
	$gameRelease = $_POST['gameRelease'];
}
$sql = "INSERT INTO myGames ".
	"VALUES ('$gameTitle','$gamePlatform','$gameDesc','$gameRelease')";
mysql_select_db('gamesDB');
$retval = mysql_query( $sql, $CONN );
if(! $retval)
{
	die('could not enter tha data:  '  . mysql_error());
}
echo "Entered data sucessfullly\n";
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
<td width="100">Platform</td>
<td><input name="gamePlatform" type="text" id="gamePlatform"></td>
</tr>
<tr>
<td width="100">Description</td>
<td><input name="gameDesc" type="text" id="gameDesc"></td>
</tr>
<tr>
<td width="100">Release Date</td>
<td><input name="gameRelease" typd="text" id="gameRelease"</td>
</tr>
<tr>
<td width="100"> </td>
<td> </td>
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
</body>
</html>
