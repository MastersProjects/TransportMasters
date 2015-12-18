<!DOCTYPE html>
<html>
<head>
<title>TransportMasters</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- import style sheet for the icons -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/form.css">
<link rel="stylesheet" href="style/connections.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="style/randomimg.js"></script>
<script src="style/scroll.js"></script>

<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

</head>
<body>
<?php
require_once ('model/Connection.php');
require_once ('model/Journey.php');
require_once ('model/JourneyDetails.php');
require_once ('Controller.php');

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	// We can do validation here
	if (isset ( $_POST ['from'] )) {
		$from = $_POST ['from'];
	}
	
	if (isset ( $_POST ['to'] )) {
		$to = $_POST ['to'];
	}
	
	if (isset ( $_POST ['date'] )) {
		$date = $_POST ['date'];
	}
	
	if (isset ( $_POST ['time'] )) {
		$time = $_POST ['time'];
	}
	
	$params = array (
			"from" => $from,
			"to" => $to,
			"date" => $date,
			"time" => $time,
			"limit" => 6 
	);
	
	$controller = new Controller ();
	$connections = $controller->getConnections ( $params );
	?>
		
<script type="text/javascript">onload = function() {scrollToElement($(this).attr('connections'), 1500)};</script>

<?php } ?>

	<div class="imgheader">
		<div class="formbackground">
			<div class="form">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
					method="post">
					<input type="text" name="from" placeholder="Von" autocomplete="off" />
					<input type="text" name="to" placeholder="Bis" autocomplete="off" />
					<input type="date" name="date"
						value="<?php print(date("Y-m-d")); ?>"> <input type="time"
						name="time" value="<?php print(date("H:i")); ?>"> <input
						type="submit" value="Send" />
				</form>
			</div>
		</div>
		<div class="buttonBottom">
			<a href="#aboutus" class="click"> <i
				class="fa fa-chevron-circle-down fa-3x" style="color: #1D50E8"></i>
			</a>
		</div>
	</div>
		<?php
		// if (isset ( $connections )) {
		// var_dump($connections);
		// echo "<br>";
		echo "<div id='connections'>";
		echo "<div id='inside'>";
		echo "<h2 class='title'>", ucfirst ( $from ), " - ", ucfirst ( $to ), "</h2>";
		$i = 0;
		// foreach ( $connections as $connection ) { $i=$i+1 		
		
		if ($i >= 1){
			echo"<div class='connection connectioBorderTop' id='$i'>"; 
		} else {
			echo"<div class='connection' id='$i'>"; 
		}
		?>
		
		<div class='item'>
			<div class='departure'><p>09:13 - 09:30</p></div>
		</div>
		<div class='item'>
			<div class='duration'><p>17min</p></div>
		</div>
		<div class='item'>
			<div class='changes'><p>0 Umstiege</p></div>
		</div>
		<div class='item'>
			<div class='type'><p>S9</p></div>
		</div>
		<div class='item right'>
			<div class='details'><p>Details anzeigen<i class="fa fa-plus-circle fa-2x plusbutton"></i></p></div>
		</div>
		<br>
			<?php
			// var_dump($connection);
			// foreach ($connection->getJourney() as $journey){
			echo "<div class='journey'>";
			echo $journey->getName (), "<br>";
			var_dump ( $journey->getDeparture () );
			echo "<br>";
			var_dump ( $journey->getArrival () );
			echo "<br>";
			var_dump ( $journey->getCategory () );
			echo "<br>";
			echo $journey->getDuration (), "<br>";
			echo "</div>";
			// }
			echo"</div>";
					// }
					echo "</div>";
					echo "</div>";
					// } 					?>
	
	<div id="aboutus">
		<div class="about">
			<div class="aboutperson">
				<img class="img-about" src="img/luca.png" alt="Luca Marti">
				<h3>
					Luca Marti <small>Apprentice</small><br> <small>Z&uuml;rich Airport</small>
				</h3>
				<p>
					<a href="#" target="_blank"><i class="fa fa-instagram fa-3x"></i></a>&emsp;
					<a href="#" target="_blank"><i class="fa fa-github fa-3x"></i></a>&emsp;
					<a href="#" target="_blank"><i class="fa fa-facebook fa-3x"></i></a>&emsp;
					<a href="#" target="_blank"><i class="fa fa-twitter fa-3x"></i></a>
				</p>
			</div>
			<div class="aboutperson">
				<img class="img-about" src="img/phong.png"
					alt="Chiramed Phong Penglerd">
				<h3>
					Chiramed Phong Penglerd <small> Raiffeisen Schweiz</small>
				</h3>
				<p>
					<a href="#" target="_blank"><i class="fa fa-instagram fa-3x"></i></a>&emsp;
					<a href="#" target="_blank"><i class="fa fa-flickr fa-3x"></i></a>&emsp;
					<a href="#" target="_blank"><i class="fa fa-github fa-3x"></i></a>&emsp;
					<a href="#" target="_blank"><i class="fa fa-youtube fa-3x"></i></a>
				</p>
			</div>
			<div class="aboutperson">
				<img class="img-about" src="img/elia.png" alt="Elia Perenzin">
				<h3>
					Elia Perenzin <small>Apperntice</small><br> <small>Hewlett-Packard
						Enterprise</small>
				</h3>
				<p>
					<a href="#" target="_blank"><i class="fa fa-instagram fa-3x"></i></a>&emsp;
					<a href="https://www.flickr.com/photos/eliaperenzin/"
						target="_blank"><i class="fa fa-flickr fa-3x"></i></a>&emsp; <a
						href="#" target="_blank"><i class="fa fa-github fa-3x"></i></a>
				</p>
			</div>
		</div>
	</div>
	<div id="footer">
		<h1>&copy; - Wer will cha en sch&ouml;ne Footer mache :D</h1>

	</div>
	<script src="style/scroll.js"></script>
</body>
</html>