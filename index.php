<?php 
require_once 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	require_once 'insert.php';
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once 'delete.php';
}
require_once 'select.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP crud 01</title>
	<link rel="stylesheet" type="text/css" href="assets/css/app.css">
</head>
<body>
	<h1>PHP crud 01</h1><hr/>
	<p>This is first crud application using HTML, CSS, JavaScript, PHP with MySQLi extension(procedural).</p>
	<?php
		if (isset($success)) {
			echo '
			<div class="success">
				<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
				<h4>'.
					$success
				.'</h4>
			</div>';
		}
		if (isset($failed)) {
			echo '
			<div class="alert">
				<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
				<h4>'.
					$failed
				.'</h4>
			</div>';
		}
	?>
	<button class="btn btn-insert" id="btnInsert">Add Movie</button>
	<table>
		<caption>Movies Library</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Category</th>
				<th>Published date</th>
				<th>Director</th>
				<th>Main Actor</th>
				<th>Main Actress</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if ($result1->num_rows > 0) {
					// output data of each row
					while ($row = $result1->fetch_assoc()) {
						echo '
							<tr>
								<td>'.$row["id"].'</td>
								<td>'.$row["name"].'</td>
								<td>'.$row["category_name"].'</td>
								<td>'.$row["published_date"].'</td>
								<td>'.$row["director"].'</td>
								<td>'.$row["main_actor"].'</td>
								<td>'.$row["main_actress"].'</td>
								<td>
									<button class="btn btn-update" id="btnUpdate_'.$row["id"].'" onclick="updateRecord('.$row["id"].',\''.$row["name"].'\',\''.$row["category_name"].'\',\''.$row["published_date"].'\',\''.$row["director"].'\',\''.$row["main_actor"].'\',\''.$row["main_actress"].'\')">Update</button>
									<button class="btn btn-delete" id="btnDelete_'.$row["id"].'" onclick="deleteRecord('.$row["id"].',\''.$row["name"].'\')">Delete</button>
								</td>
						';
					}
				} else {
					echo "0 results";
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="8"><small>Created by kadm-wcnw</small></td>
			</tr>
		</tfoot>
	</table>
	<div class="modal" id="modal1">
		<div class="modal-content">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="addMovieForm">
				<div class="modal-heading">
					<span class="close">&times;</span>
					<h2 id="topic">Add Movie</h2>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="col-25">
							<label for="movie_name"><span class="required">*</span>  Movie Name: </label>						
						</div>
						<div class="col-75">
 							<input type="text" name="movie_id" style="display: none;" id="movie_id">
							<input type="text" name="movie_name" id="movie_name" placeholder="Enter movie name" required 
								oninvalid="this.setCustomValidity('Please Enter a movie name')"
 								oninput="setCustomValidity('')"/>
						</div>						
					</div>
					<div class="form-group">
						<div class="col-25">
							<label for="category"><span class="required">*</span>  Category: </label>							
						</div>
						<div class="col-75">
							<select id="category" name="category">
								<?php 
									if ($result2->num_rows > 0) {
										while ($row = $result2->fetch_assoc()) {
											echo '
												<option>'.$row["name"].'</option>
											';
										}
									} else {
										echo '0 results';
									}
								?>
							</select>
						</div>						
					</div>
					<div class="form-group">
						<div class="col-25">						
							<label for="date_pub"><span class="required">*</span>  Published Date: </label>
						</div>
						<div class="col-75">
							<input type="date" name="date_pub" id="date_pub" placeholder="Enter date published" required
								oninvalid="this.setCustomValidity('Please Enter a pulished date')"
 								oninput="setCustomValidity('')"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-25">						
							<label for="director"><span class="required">*</span>  Director: </label>
						</div>
						<div class="col-75">
							<input type="text" name="director" id="director" placeholder="Enter director name" required
								oninvalid="this.setCustomValidity('Please Enter the director name')"
 								oninput="setCustomValidity('')"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-25">						
							<label for="main_actor"><span class="required">*</span>  Main Actor: </label>
						</div>
						<div class="col-75">
							<input type="text" name="main_actor" id="main_actor" placeholder="Enter main actor name" required
								oninvalid="this.setCustomValidity('Please Enter the main actor\'s name')"
 								oninput="setCustomValidity('')"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-25">
							<label for="main_actress"><span class="required">*</span>  Main Actress: </label>
						</div>
						<div class="col-75">
							<input type="text" name="main_actress" id="main_actress" placeholder="Enter main actress name" required
								oninvalid="this.setCustomValidity('Please Enter the main acctress name')"
 								oninput="setCustomValidity('')"/>
						</div>																		
					</div>
				</div>
				<div class="modal-footer">
					<span class="required"><small>* fields are required</small></span>
					<button class="btn btn-reset" type="reset">Reset</button>
					<button class="btn btn-submit" type="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2">
		<div class="modal-content">
			<form action="" method="get">		
				<div class="modal-heading">
					<span class="close">&times;</span>
					<h4>Are you sure you want to delete this record?</h4>
				</div>
				<div class="modal-body">
					<p style="text-align: center;color: orange;" id="record"></p>
					<input type="text" name="record_id" style="display: none;" id="record_id">
				</div>
				<div class="modal-footer">
					<button class="btn btn-submit" type="submit">Yes</button>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/app.js"></script>
	<?php
		require_once "close_conn.php" 
	?>
</body>
</html>