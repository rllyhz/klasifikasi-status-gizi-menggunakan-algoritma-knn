<?php

require_once __DIR__ . '/../init.php';

if (dataFormLengkap($_POST, 'formEditDataset')) {

	$hasil = editDataBerdasarkanId($_POST);

	if ( $hasil ) {

		echo "<script>
			alert('Berhasil mengedit data!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/dataset.php';
		</script>";

	} else {

		echo "<script>
			alert('Gagal mengedit data!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/dataset.php';
		</script>";
	}

} else {
	
	echo "<script>
			alert('Maaf, aktivitas ini tidak diizinkan!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/dataset.php';
		</script>";
	return;
}