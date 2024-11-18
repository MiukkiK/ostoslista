<!DOCTYPE html>
<html>
<head>
<title>Ostoslista</title>
</head>
<body align="center">
<?php
	echo "<h1>Hello World!</h1>";
	if (array_key_exists("tuotteet", $_POST)) {
		echo $_POST["tuotteet"];
		$selectfile = fopen("data/selected.txt", "a") or die("Write error");
		fwrite($selectfile, $_POST["tuotteet"]);
		fclose($selectfile);
	}

	$datafile = fopen("data/data.txt","r") or die("Read error");
	$data = [];
	while(!feof($datafile)) {
  		$data[] = fgets($datafile);
	}
	fclose($datafile);
?>
	<form action="ostoslista" method="post">
		<select name="tuotteet" id="tuotelista">
		<option value="blank">--Valitse tuote--</option>
		<?php
			$i = 0;
			foreach ($data as $x) {
				echo '<option "value=data' . $i . '">' . $x . '</option>';
				$i++;
			}
		?>
		</select>
		<input type=submit value="Add">
	</form>

	<p id="valitut">
		Tuote 1
		<button id="remove1">Remove</button>
	</p>
</body>
</html>