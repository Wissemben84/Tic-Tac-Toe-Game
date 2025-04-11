<?php
require "db.php";
require "functions.php";

$cities = getCityList($conn);

if(!empty($cities)) {
	echo "<table border=1>";
		echo "<tr>";
			echo "<th>City Name</th>";
			echo "<th>Students</th>";
		echo "</tr>";
		foreach($cities as $city) {
			echo "<tr>";
				echo "<td>$city[cityName]</td>";
				echo "<td>$city[counter]</td>";
			echo "</tr>";
		}
	echo "</table>";
}