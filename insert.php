<?php
/*
 * trim() - removes whitespace and other predefined characters from both sides of a string.
 * stripslashes() - Returns a string with backslashes stripped off. (\' becomes ' and so on.) Double backslashes (\\) are made into a single backslash (\).
 * htmlspecialchars() - converts some predefined characters{& - &amp;," - &quot;,' - &#039;,< - &lt;,> - &gt;} to HTML entities.
 * 
 * @param $data - user inputs
 */
function purify($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

/*
 * Validating user inputs. If validation failed then set an error message.
 */
if (empty($_POST['movie_name'])) {
	$err_movie_name = "Movie name is required!";
} else {
	$movie_name = purify($_POST['movie_name']);
}

if (empty($_POST['date_pub'])) {
	$err_date_pub = "Published date must be set!";
} else {
	$date_pub = purify($_POST['date_pub']);
}

if (empty($_POST['director'])) {
	$err_director = "Director name is required!";
} else {
	$director = purify($_POST['director']);
}

if (empty($_POST['main_actor'])) {
	$err_main_actor = "Main actor is required!";
} else {
	$main_actor = purify($_POST['main_actor']);
}

if (empty($_POST['main_actress'])) {
	$err_main_actress = "Main actress is required!";
} else {
	$main_actress = purify($_POST['main_actress']);
}

if (empty($_POST['category'])) {
	$err_category = "Category is required!";
} else {
	$category = purify($_POST['category']);
}


/*
 * Insert data into database.
 */
if (isset($movie_name) && isset($date_pub) && isset($director) && isset($main_actor) && isset($main_actress) && isset($category)) {
	if (empty($_POST['movie_id'])) {
		$sql = "INSERT INTO movie (name, published_date, director, main_actor, main_actress, category_name) VALUES ('$movie_name', '$date_pub', '$director', '$main_actor', '$main_actress', '$category')";
		if (mysqli_query($conn, $sql)) {
			$success = 'New record created successfully';
		} else {
			$failed = 'Error: ' . $sql . '<br>' . mysqli_error($conn);
		}
	} else {
		$id = (int)$_POST['movie_id'];
		$sql = "UPDATE movie SET name='$movie_name', published_date='$date_pub', director='$director', main_actor='$main_actor', main_actress='$main_actress', category_name='$category' WHERE movie.id = '$id'";
		if (mysqli_query($conn, $sql)) {
			$success = 'Record updated successfully';
		} else {
			$failed = 'Error: ' . $sql . '<br>' . mysqli_error($conn);
		}
	}		
} else {
	$failed = 'Unsuccessful. Variables not set. </br>'.
			$err_movie_name = (!isset($err_movie_name) ? "" : $err_movie_name).'</br>'.
			$err_date_pub = (!isset($err_date_pub) ? "" : $err_date_pub).'</br>'.
			$err_director = (!isset($err_director) ? "" : $err_director).'</br>'.
			$err_main_actor = (!isset($err_main_actor) ? "" : $err_main_actor).'</br>'.
			$err_main_actress = (!isset($err_main_actress) ? "" : $err_main_actress).'</br>'.
			$err_category = (!isset($err_category) ? "" : $err_category);
}




