// ambil elemen2 yang dibutuhkan

var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// tambahkan event ketika keyword di tulis

keyword.addEventListener('keyup', function() {

	//buat objek ajax
	var xhr = new XMLHttpRequest();

	// mengecek kesiapan ajax
	xhr.onreadystatechange = function() {

		if (xhr.readyState == 4 && xhr.status == 200) {
			container.innerHTML = xhr.responseText;
		}
	}

//exsekusi ajax

	xhr.open('GET', 'ajax/history.php?keyword=' + keyword.value, true);
	xhr.send();







});