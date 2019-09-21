<?php

	$filename ="FinalMissingData.csv";
	$contactArray = [];

	if(file_exists($filename)){
		$contactArray = array_filter(readCSV($filename));
	}

	function readCSV($csvFile){

	$file_handle = fopen($csvFile, 'r');
	while (!feof($file_handle)) {
	$line_of_text[] = fgetcsv($file_handle, 1024);
	}
	fclose($file_handle);
	return $line_of_text;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>All contact information</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<script
	  src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
  <div class="row">
	<h3 class="col s12 center">Contact Information</h3>
	<div class="col s12 card-panel">
	  	<table class="responsive-table highlight">
	  		<thead>
      		<tr>
      			<th>First Name</th>
        		<th>Last Name</th>
        		<th>Email</th>
						<th>Phone</th>
						<th>Message</th>
	       	</tr>
	      </thead>

	     	<tbody>
					<?php
						foreach ($contactArray as $eachContactInfo) {
							echo '<tr>';
							foreach ($eachContactInfo as $key => $value) {
								echo '<td>' . $value . '</td>';
							}
							echo '</tr>';
						}
					?>
	      </tbody>
	    </table>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
