<!DOCTYPE html>
<html>
<head>
<title>TransportMasters</title>
<!-- import style sheet for the icons -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/form.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<body>
	<div class="imgheader">
		<div class="formbackground">
			<div class="form">
				<form>
					<input type="text" name="von" placeholder="Von" /> <input
						type="text" name="bis" placeholder="Bis" /> <input type="date"
						name="date" value="<?php print(date("Y-m-d")); ?>"> <input
						type="time" name="time" value="<?php print(date("G:i")); ?>"> <input
						type="submit" value="Send" />
				</form>
			</div>
		</div>
		<div class="buttonBottom">
			<a href="#test" class="click"><i
				class="fa fa-chevron-circle-down fa-3x" style="color: #1D50E8"></i></a>
		</div>
	</div>

	<div id="test"></div>

	<script src="style/scroll.js"></script>

</body>
</html>
