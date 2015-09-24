<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>

<body>
<form method="get" action="default.php">
<button class="homebutton">Home</button>
</form>
<br>
<center>
<div>
Class ID:
<?php
if($_POST["id"] == "")
	$_SESSION["id"] = filter_var($_SESSION["id"], FILTER_SANITIZE_NUMBER_INT);
else
	$_SESSION["id"] = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
if(!(file_exists($_SESSION["id"] . "VisualQ.xml")))
{
	die("Invalid Class ID!");
}

if($_POST["id"] != "")
{
	echo $_POST["id"] . '<br>';
	echo "Learning Type:" . $_POST["style"];
	$_SESSION["style"] = $_POST["style"];
}
else
{
	echo $_SESSION["id"] . '<br>';
	echo "Learning Type:" . $_SESSION["style"];
}
	
	if($_SESSION["input"] == "")
	{
		$_SESSION["input"] = 0;
	}
	
	$file = fopen($_SESSION["id"]. $_SESSION["style"] .".xml","a+");
	if($_POST["input"] != "" && filesize($_SESSION["id"]. $_SESSION["style"] .".xml") > 0)
	{	
		$nums = intval(fread($file,filesize($_SESSION["id"]. $_SESSION["style"] .".xml")));
		$nums+=($_POST["input"]-$_SESSION["input"]);
		fclose($file);
		$file = fopen($_SESSION["id"]. $_SESSION["style"] .".xml","w");
		fwrite($file,$nums);
		$_SESSION["input"] = $_POST["input"];
		fclose($file);
	}
	else if($_POST["input"] != "")
	{
		fclose($file);
		$file = fopen($_SESSION["id"]. $_SESSION["style"] .".xml","w");
		fwrite($file,$_POST["input"]);
		fclose($file);
		$_SESSION["input"] = $_POST["input"];
	}
	if(filesize($_SESSION["id"] . "Visual" . "Q" . ".xml") > 0)
{
	$file = fopen($_SESSION["id"] . "Visual" . "Q" . ".xml","a+");
	$v = filesize($_SESSION["id"] . "Visual" . "Q" . ".xml");
	fclose($file);
	$file = fopen($_SESSION["id"] . "Visual" . ".xml","a+");
	$va = 0;
	if(filesize($_SESSION["id"] . "Visual" . ".xml") > 0)
	{
		$va = fread($file, filesize($_SESSION["id"] . "Visual" . ".xml"));
	}
	fclose($file);
	$_SESSION["one"] = 100.0*((intval($va)+0.0)/(10.0*($v)));
}
else{
	$_SESSION["one"] = 0;
}
if(filesize($_SESSION["id"] . "Auditory" . "Q" . ".xml") > 0)
{
	$file = fopen($_SESSION["id"] . "Auditory" . "Q" . ".xml","a+");
	$a = filesize($_SESSION["id"] . "Auditory" . "Q" . ".xml");
	fclose($file);
	$file = fopen($_SESSION["id"] . "Auditory" . ".xml","a+");
	$aa = 0;
	if(filesize($_SESSION["id"] . "Auditory" . ".xml") > 0)
	{
		$aa = fread($file, filesize($_SESSION["id"] . "Auditory" . ".xml"));
	}
	fclose($file);
	$_SESSION["two"] = 100.0*((intval($aa)+0.0)/(10.0*($a)));
}
else{
	$_SESSION["two"] = 0;
}
if(filesize($_SESSION["id"] . "Kinesthetic" . "Q" . ".xml") > 0)
{
	$file = fopen($_SESSION["id"] . "Kinesthetic" . "Q" . ".xml","a+");
	$k = filesize($_SESSION["id"] . "Kinesthetic" . "Q" . ".xml");
	fclose($file);
	$file = fopen($_SESSION["id"] . "Kinesthetic" . ".xml","a+");
	$ka = 0;
	if(filesize($_SESSION["id"] . "Kinesthetic" . ".xml") > 0)
	{
		$ka = fread($file, filesize($_SESSION["id"] . "Kinesthetic" . ".xml"));
	}
	fclose($file);
	$_SESSION["three"] = 100.0*((intval($ka)+0.0)/(10.0*($k)));
}
else{
	$_SESSION["three"] = 0;
}
if($k != 0 || $a != 0 || $v != 0)
	$_SESSION["four"] = ((intval($ka) + intval($aa) + intval($va) + 0.0)/(($k + $a + $v)*10))*100.0;
else
	$_SESSION["four"] = 0;

$file = fopen($_SESSION["id"] . "percent.xml","w");
fwrite($file, $_SESSION["one"] . " " . $_SESSION["two"] . " " . $_SESSION["three"] . " " . $_SESSION["four"]);
fclose($file);
if($_SESSION["logged"] != "yes")
	{
		$file = fopen($_SESSION["id"]. $_SESSION["style"] ."Q.xml","a+");
		fwrite($file,"1");
		fclose($file);
		$_SESSION["logged"] = "yes";
	}

?>
<br>
Current Satisfaction with Teaching:
</br>
<form method="post">
<?php
	echo '<input id="input" name="input" type="range" min=1 max=10 value="' . $_POST["input"]. '"></input>';
?>
<h2 id="inner"></h2>
<script>

setInterval(function () {
	if($('input[name=input]').val() >= 0)
		document.getElementById('inner').innerHTML = $('input[name=input]').val() + "/10";
}, 300);

</script>
	</br>
	<input class="mainbutton" type="submit" value="Update"></input>
</form>

<br>
</div>
</center>
</body>


</html>
