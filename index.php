<?php
include 'class.php';
$obj = new bookmarkly();


$obj->host = 'localhost';
$obj->username = 'root';
$obj->password = ''; 
$obj->db = 'baka';

$obj->connect();
error_reporting(0); /
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
