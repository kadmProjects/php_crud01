<?php

if (!empty($_GET['record_id'])) {
	$record = $_GET['record_id'];
}

if (isset($record)) {
	$sql = "DELETE FROM movie WHERE movie.id = '$record'";

	if (mysqli_query($conn, $sql)) {
		$success = 'Record deleted successfully';
	} else {
		$failed = 'Error: ' . $sql . '<br>' . mysqli_error($conn);
	}
} else {
	$failed = "Unsuccessful delete. Variable not set.";
}
