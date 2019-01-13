var modal = document.getElementById('modal');
var btnInsert = document.getElementById('btnInsert');
var btnClose = document.getElementsByClassName('close')[0];

btnInsert.onclick = function() {
	modal.style.display = "block";
}

btnClose.onclick = function() {
	modal.style.display = "none";
}

window.onclick = function() {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}