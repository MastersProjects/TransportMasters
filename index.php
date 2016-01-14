<!DOCTYPE html>
<html>
<head>
<title>TransportMasters</title>
<!-- Favicons -->
<link rel="apple-touch-icon" sizes="57x57"
	href="img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60"
	href="img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72"
	href="img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76"
	href="img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114"
	href="img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120"
	href="img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144"
	href="img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152"
	href="img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180"
	href="img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"
	href="img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32"
	href="img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96"
	href="img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16"
	href="img/favicon/favicon-16x16.png">
<link rel="manifest" href="img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage"
	content="img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- Zoom for mobilephones -->
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- import style sheet for the icons -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- our stylesheets -->
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/form.css">
<link rel="stylesheet" href="style/connections.css">
<link rel="stylesheet" href="style/style.css">

<!-- Jquery library -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- For auto suggestion jquery library and style -->
<link rel="stylesheet"
	href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script
	src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

<!-- JS for random background img -->
<script src="style/randomimg.js"></script>

</head>
<body>
<?php
include_once("analytics.php");
require_once ('model/Connection.php');
require_once ('model/Journey.php');
require_once ('model/JourneyDetails.php');
require_once ('Controller.php');

$fromstyle = "";
$tostyle = "";
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	//Function for the validation of the input
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = rawurlencode(utf8_encode($data));
		return $data;
	}
	
	$validation = array ();
	if (! (empty ( $_POST ['from'] ))) {
		$from = test_input($_POST ['from']);
		$validation [0] = true;
	} else {
		$validation [0] = false;
		$fromstyle = "error";
	}
	if (! (empty ( $_POST ['to'] ))) {
		$to = test_input($_POST ['to']);
		$validation [1] = true;
	} else {
		$validation [1] = false;
		$tostyle = "error";
	}
	
	if (isset ( $_POST ['date'] )) {
		$date = $_POST ['date'];
	}
	
	if (isset ( $_POST ['time'] )) {
		$time = $_POST ['time'];
	}

	if ($validation [0] == true && $validation [1] == true) {
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

<?php
	}
}
?>
	<div class="imgheader">
		<div class="formbackground">
			<div class="form">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
					method="post">
					<div class="ui-widget">
						<input type="text" id="<?php echo $fromstyle;?>" class="input"
							name="from" placeholder="Von" autocomplete="off" value="<?php if (isset($_POST['from'])){echo $_POST['from'];}?>"/>
					</div>
					<div class="ui-widget">
						<input type="text" id="<?php echo $tostyle;?>" class="input"
							name="to" placeholder="Bis" autocomplete="off" value="<?php if (isset($_POST['to'])){echo $_POST['to'];}?>" />
					</div>
					<input type="date" name="date"
						value="<?php if (isset($_POST['date'])){print $_POST['date'];} else {print(date("Y-m-d"));} ?>"> <input type="time"
						name="time" value="<?php if (isset($_POST['time'])){print $_POST['time'];} else {print(date("H:i"));} ?>"> <input
						type="submit" value="Send" />
				</form>
			</div>
		</div>
		<div class="buttonBottom">
			<a href="#aboutus" class="click"> <i
				class="fa fa-chevron-circle-down fa-3x"
				style="color: #1D50E8; text-align: center"></i>
			</a>
		</div>
	</div>
		<?php
		if (isset ( $connections )) {
			echo "<div id='connections'>";
			if (! empty ( $connections )) {
				echo "<div id='inside'>";
				// ToDo get Real destinations
				echo "<h2 class='title'>", $connections [0]->getFrom (), " - ", $connections [0]->getTo (), "<br><small>", date ( 'd.m.Y', strtotime ( $connections [0]->getDepartureTime () ) ), "</small></h2>";
				// echo "<h2>", date('H:i', strtotime($connections[0]->getDepartureTime())), "</h2>";
				
				$i = 0;
				foreach ( $connections as $connection ) {
					$i = $i + 1;
					
					?>
		
			<div class='connection' id="<?php echo $i;?>">
		<div class='item'>
			<div class='departure'>
				<p><?php echo date('H:i', strtotime($connection->getDepartureTime())), " - ", date('H:i', strtotime($connection->getArivallTime()))?></p>
			</div>
		</div>
		<div class='item' id = "durationItem">
			<div class='duration'>
				<p><?php echo trim(substr($connection->getDuration(),3,1),0) . substr($connection->getDuration(), 4, 4), "'";?></p>
			</div>
		</div>
		<div class='item' id='borderChanges'>
			<div class='changes'>
				<p><?php echo $connection->getTransfers(), " Umstiege"?></p>
			</div>
		</div>
		<div class='item norightborder'>
			<div class='type'>
				<p><?php
					
					foreach ( $connection->getJourney () as $journey ) {
						echo " -> ", $journey->getCategory ();
					}
					?></p>
			</div>
		</div>
		<div class='item right'>
			<div class='details'>
				<p>
					<span class="visibleFalse">Details anzeigen</span><i
						class="fa fa-plus-circle fa-2x plusbutton"></i>
				</p>
			</div>
		</div>
		<br>
		
			<?php
					// var_dump($connection);
					foreach ( $connection->getJourney () as $journey ) {
						?>
				<div class='journey'>
			<br>
			<table>
				<tr>
					<td class="journeytd"><?php echo date('H:i', strtotime($journey->getDeparture()->getTime()));?></td>
					<td class="journeytd"><?php echo $journey->getDeparture()->getLocation();?></td>
					<td class="journeytd"><?php echo $journey->getDeparture()->getPlatform();?></td>
				</tr>
				<tr>
					<td></td>
					<td><?php echo $journey->getName();?></td>
				</tr>
				<tr>
					<td class="journeytd"><?php echo date('H:i', strtotime($journey->getArrival()->getTime()));?></td>
					<td class="journeytd"><?php echo $journey->getArrival()->getLocation();?></td>
					<td class="journeytd"><?php echo $journey->getArrival()->getPlatform();?></td>
				</tr>
			</table>
		</div>
				<?php
					}
					?></div><?php
				}
			} else {
				// ToDo
				echo "Something went wrong!";
			}
			echo "</div>";
		}
		echo "</div> "?>
		 
	<div id="aboutus">
		<div class="aboutperson">
			<img class="img-about" src="img/luca.png" alt="Luca Marti">
			<h3>
				Luca Marti <small> <br> Apprentice Z&uuml;rich Airport</small>
			</h3>
			<p>
				<a href="https://github.com/zmartl-bbc" target="_blank"><i class="fa fa-github fa-3x"></i></a>&emsp;
				<a href="https://www.instagram.com/luca.marti/" target="_blank"><i class="fa fa-instagram fa-3x"></i></a>&emsp;
				<a href="https://www.facebook.com/lucaemanuelmarti" target="_blank"><i class="fa fa-facebook fa-3x"></i></a>
			</p>
		</div>
		<div class="aboutperson">
			<img class="img-about" src="img/phong.png"
				alt="Chiramed Phong Penglerd">
			<h3>
				Chiramed Phong Penglerd <small> Apperntice Raiffeisen Schweiz</small>
			</h3>
			<p>
				<a href="https://github.com/Phong6698" target="_blank"><i class="fa fa-github fa-3x"></i></a>&emsp;
				<a href="https://www.instagram.com/phong6698/" target="_blank"><i class="fa fa-instagram fa-3x"></i></a>&emsp; 
				<a href="https://www.facebook.com/phong.penglerd" target="_blank"><i class="fa fa-facebook fa-3x"></i></a>&emsp; 
				<a href="https://www.youtube.com/user/Phong6698" target="_blank"><i class="fa fa-youtube fa-3x"></i></a>
				
			</p>
		</div>
		<div class="aboutperson">
			<img class="img-about" src="img/elia.png" alt="Elia Perenzin">
			<h3>
				Elia Perenzin <small>Apperntice <br> Hewlett-Packard Enterprise</small>
			</h3>
			<p>
				<a href="https://github.com/zperee" target="_blank"><i class="fa fa-github fa-3x"></i></a>&emsp;
				<a href="https://www.instagram.com/1998_elia/" target="_blank"><i class="fa fa-instagram fa-3x"></i></a>&emsp;
				<a href="https://www.flickr.com/photos/eliaperenzin/"target="_blank"><i class="fa fa-flickr fa-3x"></i></a>
				
			</p>
		</div>
		<div class="clear"></div>
	</div>
	<div id="footer">
		<div id="footercenter">
			<p>&copy; <?php echo date('Y'); ?> by MastersProjects | Elia Perenzin, Phong Penglerd und Luca Marti</p>
		</div>
	</div>
	<!-- Our javascripts for scroll an autocomplete -->
	<script src="style/scroll.js"></script>
	<script src="style/autocomplete.js"></script>
</body>
</html>
