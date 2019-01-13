<!DOCTYPE html>
<html>
<head>
	<title>PHP crud 01</title>
	<link rel="stylesheet" type="text/css" href="assets/css/app.css">
</head>
<body>
	<h1>PHP crud 01</h1><hr/>
	<p>This is first crud application using HTML, CSS, JavaScript, PHP with MySQL.</p>
	<button class="btn btn-insert" id="btnInsert">Add Movie</button>
	<table>
		<caption>Movies Library</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Category</th>
				<th>Published date</th>
				<th>Producer</th>
				<th>Main Actor</th>
				<th>Main Actress</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody></tbody>
		<tfoot>
			<tr>
				<td colspan="8"><small>Created by kadm0128</small></td>
			</tr>
		</tfoot>
	</table>
	<div class="modal" id="modal">
		<div class="modal-content">
			<div class="modal-heading">
				<span class="close">&times;</span>
				<h2>Add Movie</h2>
			</div>
			<div class="modal-body">
				<form action="#">
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
							<select id="category" name="category"></select>
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
				</form>
			</div>
			<div class="modal-footer">
				<input type="reset" name="" value="Reset" class="btn btn-reset">
				<input type="submit" name="" value="Submit" class="btn btn-submit">
			</div>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>