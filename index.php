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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="style/randomimg.js"></script>
<script src="style/scroll.js"></script>

</head>
<body>

<?php
session_start ();

if (isset ( $_SESSION ['connection'] )) {?>
<script type="text/javascript">onload = function() {scrollToElement($(this).attr('connection'), 1500)};</script>
<?php } ?>

	<div class="imgheader">
		<div class="formbackground">
			<div class="form">
				<form action="controller.php" method="post">
					<input type="text" name="from" placeholder="Von" /> <input
						type="text" name="to" placeholder="Bis" /> <input type="date"
						name="date" value="<?php print(date("Y-m-d")); ?>"> <input
						type="time" name="time" value="<?php print(date("H:i")); ?>"> <input
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

	<div id="connection">
		<?php
		
if (isset ( $_SESSION ['connection'] )) {
			var_dump($_SESSION ['connection']);
			session_unset ();
		}
?>
	</div>
	<div id="aboutus">
		<div class="about">
			<div class="aboutperson">
				<img class="img-about" src="img/luca.png" alt="Luca Marti">
				<h3>
					Luca Marti <small>Apprentice</small><br> <small>Z&uuml;rich Airport</small>
				</h3>
				<p>What does this team member to? Keep it short! This is also a
					great spot for social links!</p>
			</div>
			<div class="aboutperson">
				<img class="img-about" src="img/phong.png"
					alt="Chiramed Phong Penglerd">
				<h3>
					Chiramed Phong Penglerd <small> Raiffeisen Schweiz</small>
				</h3>
				<p>What does this team member to? Keep it short! This is also a
					great spot for social links!</p>
			</div>
			<div class="aboutperson">
				<img class="img-about" src="img/elia.png" alt="Elia Perenzin">
				<h3>
					Elia Perenzin <small>Apperntice</small><br> <small>Hewlett-Packard
						Enterprise</small>
				</h3>
				<p>What does this team member to? Keep it short! This is also a
					great spot for social links!</p>
			</div>
		</div>
	</div>
	<script src="style/scroll.js"></script>
</body>
</html>
