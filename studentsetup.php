<?php
session_start();
$_SESSION["style"]="";
$_SESSION["id"]="";

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>

<body>
<br>
<br>
<center>
<form action="student.php" method="post">
Enter Class ID:
<input class="classidentry" type="text" name="id"></input>
<br>
<br>
<p>Choose Learning Style:</p>
<table>
<tr>
<td>
<input type="radio" name="style" value="Visual" checked>Visual</input>
</td>
</tr>
<tr>
<td>
<input type="radio" name="style" value="Auditory">Auditory</input>
</td>
</tr>
<tr>
<td>
<input type="radio" name="style" value="Kinesthetic">Kinesthetic</input>
</td>
</tr>
</table>
<br>
<br>
<input class="mainbutton" type="submit" value="Done!">
</form>
</center>
</html>
