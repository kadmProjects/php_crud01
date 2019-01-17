<?php 
require_once 'connection.php';
require_once 'select.php';
require_once 'insert.php';
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
									<button class="btn btn-update" id="btnUpdate_'.$row["id"].'">Update</button>
									<button class="btn btn-delete" id="btnDelete_'.$row["id"].'">Delete</button>
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
				<td colspan="8"><small>Created by kadm0128</small></td>
			</tr>
		</tfoot>
	</table>
	<div class="modal" id="modal">
		<div class="modal-content">
			<form action="index.php" method="get">
				<div class="modal-heading">
					<span class="close">&times;</span>
					<h2>Add Movie</h2>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="col-25">
							<label for="movie_name">Movie Name: </label>							
						</div>
						<div class="col-75">
							<input type="text" name="movie_name" id="movie_name" placeholder="Enter movie name">
						</div>						
					</div>
					<div class="form-group">
						<div class="col-25">
							<label for="category">Category: </label>							
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
							<label for="date_pub">Published Date: </label>
						</div>
						<div class="col-75">
							<input type="date" name="date_pub" id="date_pub" placeholder="Enter date published">
						</div>
					</div>
					<div class="form-group">
						<div class="col-25">						
							<label for="director">Director: </label>
						</div>
						<div class="col-75">
							<input type="text" name="director" id="director" placeholder="Enter director name">
						</div>
					</div>
					<div class="form-group">
						<div class="col-25">						
							<label for="main_actor">Main Actor: </label>
						</div>
						<div class="col-75">
							<input type="text" name="main_actor" id="main_actor" placeholder="Enter main actor name">
						</div>
					</div>
					<div class="form-group">
						<div class="col-25">
							<label for="main_actress">Main Actress: </label>
						</div>
						<div class="col-75">
							<input type="text" name="main_actress" id="main_actress" placeholder="Enter main actress name">
						</div>																		
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-reset" type="reset">Reset</button>
					<button class="btn btn-submit" type="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/app.js"></script>
	<?php require_once "close_conn.php" ?>
</body>
</html>