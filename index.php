<?php
include 'class.php';
$obj = new bookmarkly();

// Sets the database conection variables.
$obj->host = 'localhost'; //change this
$obj->username = 'root'; //and this
$obj->password = ''; // this, as well
$obj->db = 'baka'; // aaaand this

// let's try to make a connection
$obj->connect();
error_reporting(0); // reporting errors is turned off. minima may produce errors, but we don't want to create huge error log files. if you're not fine with this, you can disable the option and try to fix the bugs causing minima to misbehave.
?>
 <?php
	if($_POST['add']):
		$obj->add_content($_POST);
	endif;
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Pocetna stranica</title>
	<style>
		#overlay {
			visibility: hidden;
			position: absolute;
			left: 0px;
			top: 0px;
			width:100%;
			height:100%;
			text-align:center;
			z-index: 1000;
		}
		#overlay div{
			width:300px;
			margin: 100px auto;
			background-color: #fff;
			border:1px solid #000;
			padding:15px;
			text-align:center;
		}
		.lts{
			margin:5px;
			padding:5px;
		}
	</style>
	</head>
	<body>
	<a href="#" onclick='overlay()'>dodaj stranicu</a><br>
	<div id="overlay">
     <div>
		<form method="post" action="index.php">
			<input type="hidden" name="add" value="true" />
			<input type="text" name="url" id="url" placeholder="Link" />
			<input type="text" name="sitename" id="sitename" placeholder="Ime stranice" />
			<input type="submit" name="submit" id="submit" value="Dodaj" />
		</form>
     </div>
</div>
		<?php $obj->get_sites(); ?>
		<script>
			function overlay() {
				el = document.getElementById("overlay");
				el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
			}
		</script>
	</body>
</html>
