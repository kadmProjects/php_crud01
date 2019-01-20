var modal1 = document.getElementById('modal1');
var btnInsert = document.getElementById('btnInsert');
var btnClose = document.getElementsByClassName('close');
var modal2 = document.getElementById('modal2');
var addMovieForm = document.getElementById('addMovieForm');

btnInsert.onclick = function() {
	document.getElementById('topic').innerHTML = "ADD Movie";
	modal1.style.display = "block";
}

btnClose[0].onclick = function() {
	modal1.style.display = "none";
}

btnClose[1].onclick = function() {
	modal2.style.display = "none";
}

window.onclick = function() {
	if (event.target == modal1) {
		modal1.style.display = "none";
	}
	if (event.target == modal2) {
		modal2.style.display = "none";
	}
}

function updateRecord(id,name,category,date,director,actor,actress) {
	addMovieForm.reset();
	document.getElementById('topic').innerHTML = "Update Movie";
	document.getElementById('movie_id').value = id;
	document.getElementById('movie_name').value = name;
	document.getElementById('category').value = category;
	document.getElementById('date_pub').value = date;
	document.getElementById('director').value = director;
	document.getElementById('main_actor').value = actor;
	document.getElementById('main_actress').value = actress;
	modal1.style.display = "block";
}

function deleteRecord(id,name) {
	var para = document.getElementById('record');
	para.innerHTML = "";
	para.innerHTML = "Movie : " + name;
	var inpt = document.getElementById('record_id');
	inpt.value = "";
	inpt.value = id;
	modal2.style.display = "block";
}