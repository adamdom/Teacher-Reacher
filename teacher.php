<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>

<body>
<form method="get" action="default.php">
	<button class="homebutton">Home</button>
</form>
<br>
<div>
<center>
<p>Class ID:</p>
<?php 
if($_SESSION["teacherid"] == "")
{
	$id = rand(1000000,9999999);
	while(file_exists($id . "Visual" . Q . ".xml"))
	{
		$id = rand(1000000,9999999);
	}
	$_SESSION["teacherid"] = $id;
}
else
{
	$id = $_SESSION["teacherid"];
}
echo $id."<br><br>";
$file = fopen($id . "Visual" . Q . ".xml","a+");
fclose($file);
$file = fopen($id . "Auditory" . Q . ".xml","a+");
fclose($file);
$file = fopen($id . "Kinesthetic" . Q . ".xml","a+");
fclose($file);
?>
	<table style="width:100%;">
	<tr>
	<td>
	<p>Visual Learner Understanding:</p>
	<center><div class="chart" id="graph" data-rotate="90" data-percent= "0"></div></center>
	</td>
	<td>
	<p>Auditory Learner Understanding:</p>
	<center><div class="chart" id="graph2" data-rotate="90" data-percent= "0"></div></center>
	</td>
	</tr>
	<tr>
	<td>
	<br>
	<p>Kinesthetic Learner Understanding:</p>
	<center><div class="chart" id="graph3" data-rotate="90" data-percent= "0"></div></center>
	</td>
	<td>
	<br>
	<p>Overall Understaning:</p>
	<center><div class="chart" id="graph4" data-rotate="90" data-percent= "0"></div></center>
	</td>
	</tr>
	</table>
<script>

setInterval(function () {
	location.reload()}, 15000);

</script>
</center>
<br>
</div>

<script>

var el = document.getElementById('graph'); // get canvas

var options = {
    percent:  el.getAttribute('data-percent') || 25,
    size: window.innerWidth/4,
    lineWidth: window.innerWidth/50,
    rotate: el.getAttribute('data-rotate') || 0
}

var canvas = document.createElement('canvas');
var span = document.createElement('span');
    
if (typeof(G_vmlCanvasManager) !== 'undefined') {
    G_vmlCanvasManager.initElement(canvas);
}

var ctx = canvas.getContext('2d');
canvas.width = canvas.height = options.size;

el.appendChild(span);
el.appendChild(canvas);

ctx.translate(options.size / 2, options.size / 2); // change center
ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

var radius = (options.size - options.lineWidth) / 2;

var drawCircle = function(color, lineWidth, percent) {
		percent = Math.min(Math.max(0, percent || 1), 1);
		ctx.beginPath();
		ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
		ctx.strokeStyle = color;
        ctx.lineCap = 'butt'; // butt, round or square
		ctx.lineWidth = lineWidth;
		ctx.font = "27px Century Gothic";
		ctx.fillStyle = "white";
		ctx.fillText(el.getAttribute('data-percent').toString()+"%",-30,15);
		ctx.stroke();

};

drawCircle('#006600', options.lineWidth, 100 / 100);
drawCircle('#FFFFFF', options.lineWidth, options.percent / 100);

</script>
<script>

var el = document.getElementById('graph2'); // get canvas

var options = {
    percent:  el.getAttribute('data-percent') || 25,
    size: window.innerWidth/4,
    lineWidth: window.innerWidth/50,
    rotate: el.getAttribute('data-rotate') || 0
}

var canvas = document.createElement('canvas');
var span = document.createElement('span');
    
if (typeof(G_vmlCanvasManager) !== 'undefined') {
    G_vmlCanvasManager.initElement(canvas);
}

var ctx = canvas.getContext('2d');
canvas.width = canvas.height = options.size;

el.appendChild(span);
el.appendChild(canvas);

ctx.translate(options.size / 2, options.size / 2); // change center
ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

var radius = (options.size - options.lineWidth) / 2;

var drawCircle = function(color, lineWidth, percent) {
		percent = Math.min(Math.max(0, percent || 1), 1);
		ctx.beginPath();
		ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
		ctx.strokeStyle = color;
        ctx.lineCap = 'butt'; // butt, round or square
		ctx.lineWidth = lineWidth;
		ctx.font = "27px Century Gothic";
		ctx.fillStyle = "white";
		ctx.fillText(el.getAttribute('data-percent').toString()+"%",-30,15);
		ctx.stroke();

};

drawCircle('#006600', options.lineWidth, 100 / 100);
drawCircle('#FFFFFF', options.lineWidth, options.percent / 100);

</script>
<script>

var el = document.getElementById('graph3'); // get canvas

var options = {
    percent:  el.getAttribute('data-percent') || 25,
    size: window.innerWidth/4,
    lineWidth: window.innerWidth/50,
    rotate: el.getAttribute('data-rotate') || 0
}

var canvas = document.createElement('canvas');
var span = document.createElement('span');
    
if (typeof(G_vmlCanvasManager) !== 'undefined') {
    G_vmlCanvasManager.initElement(canvas);
}

var ctx = canvas.getContext('2d');
canvas.width = canvas.height = options.size;

el.appendChild(span);
el.appendChild(canvas);

ctx.translate(options.size / 2, options.size / 2); // change center
ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

var radius = (options.size - options.lineWidth) / 2;

var drawCircle = function(color, lineWidth, percent) {
		percent = Math.min(Math.max(0, percent || 1), 1);
		ctx.beginPath();
		ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
		ctx.strokeStyle = color;
        ctx.lineCap = 'butt'; // butt, round or square
		ctx.lineWidth = lineWidth;
		ctx.font = "27px Century Gothic";
		ctx.fillStyle = "white";
		ctx.fillText(el.getAttribute('data-percent').toString()+"%",-30,15);
		ctx.stroke();

};

drawCircle('#006600', options.lineWidth, 100 / 100);
drawCircle('#FFFFFF', options.lineWidth, options.percent / 100);

</script>
<script>

var el = document.getElementById('graph4'); // get canvas

var options = {
    percent:  el.getAttribute('data-percent') || 25,
    size: window.innerWidth/4,
    lineWidth: window.innerWidth/50,
    rotate: el.getAttribute('data-rotate') || 0
}

var canvas = document.createElement('canvas');
var span = document.createElement('span');
    
if (typeof(G_vmlCanvasManager) !== 'undefined') {
    G_vmlCanvasManager.initElement(canvas);
}

var ctx = canvas.getContext('2d');
canvas.width = canvas.height = options.size;

el.appendChild(span);
el.appendChild(canvas);

ctx.translate(options.size / 2, options.size / 2); // change center
ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

var radius = (options.size - options.lineWidth) / 2;

var drawCircle = function(color, lineWidth, percent) {
		percent = Math.min(Math.max(0, percent || 1), 1);
		ctx.beginPath();
		ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
		ctx.strokeStyle = color;
        ctx.lineCap = 'butt'; // butt, round or square
		ctx.lineWidth = lineWidth;
		ctx.font = "27px Century Gothic";
		ctx.fillStyle = "white";
		ctx.fillText(el.getAttribute('data-percent').toString()+"%",-30,15);
		ctx.stroke();

};

drawCircle('#006600', options.lineWidth, 100 / 100);
drawCircle('#FFFFFF', options.lineWidth, options.percent / 100);

</script>
</body>


</html>
